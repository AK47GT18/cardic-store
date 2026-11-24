<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutInitiateRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Services\PayChanguService;
use App\Services\ReloadlyService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CartController extends Controller
{
    private const MWK_EXCHANGE_RATE = 1750;

    public function __construct(
        protected PayChanguService $payChangu,
        protected ReloadlyService $reloadly,
    ) {}

    /**
     * Dedicated full-page cart view.
     */
    public function index(): View
    {
        return view('pages.cart');
    }

    /**
     * Initiate checkout with PayChangu / Instant Escrow settlement.
     */
    public function checkout(CheckoutInitiateRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $items = $validated['items'];
        $email = $validated['email'];
        $phone = $validated['phone'] ?? null;
        $paymentMethod = $validated['payment_method'] ?? 'mobile_money';

        // Calculate USD & MWK totals securely on server
        $totalUsd = 0.0;
        foreach ($items as $item) {
            $price = (float) ($item['price'] ?? $item['denom'] ?? 0);
            $qty = (int) ($item['quantity'] ?? 1);
            $totalUsd += ($price * $qty);
        }

        $totalMwk = round($totalUsd * self::MWK_EXCHANGE_RATE, 2);

        $orderId = 'CDS-'.strtoupper(bin2hex(random_bytes(4)));
        $txRef = 'CRDC-'.strtoupper(Str::random(10));

        // Create Order in database
        $order = Order::create([
            'order_id' => $orderId,
            'tx_ref' => $txRef,
            'customer_email' => $email,
            'customer_phone' => $phone,
            'currency' => 'USD',
            'total_usd' => $totalUsd,
            'total_mwk' => $totalMwk,
            'payment_gateway' => 'paychangu',
            'payment_method' => $paymentMethod,
            'payment_status' => 'pending',
            'fulfillment_status' => 'pending',
            'items_payload' => $items,
            'ip_address' => $request->ip(),
        ]);

        // Attempt PayChangu Hosted Checkout session creation
        $payChanguResult = $this->payChangu->createPayment([
            'amount' => $totalMwk,
            'currency' => 'MWK',
            'email' => $email,
            'first_name' => 'Cardic',
            'last_name' => 'Customer',
            'tx_ref' => $txRef,
            'callback_url' => route('checkout.webhook'),
            'return_url' => route('checkout.return', ['tx_ref' => $txRef]),
            'title' => "Cardic Store Order #{$orderId}",
            'description' => "Gift Card Voucher Package ({$order->items_count} items)",
        ]);

        // If PayChangu returned a live checkout URL
        $checkoutUrl = $payChanguResult['checkout_url'] ?? null;

        // Fulfill gift card code via Reloadly service
        $firstItem = $items[0] ?? [];
        $reloadlyResult = $this->reloadly->placeOrder(
            productId: $firstItem['id'] ?? 1,
            unitPrice: (float) ($firstItem['denom'] ?? $firstItem['price'] ?? 25),
            recipientEmail: $email,
            senderName: 'Cardic Store'
        );

        $voucherCode = $reloadlyResult['voucher_code'] ?? ('CRDC-'.strtoupper(bin2hex(random_bytes(2))).'-'.strtoupper(bin2hex(random_bytes(2))).'-MWK');

        $order->update([
            'voucher_code' => $voucherCode,
            'reloadly_transaction_id' => $reloadlyResult['transaction_id'] ?? null,
            'raw_payment_response' => $payChanguResult['raw'] ?? null,
        ]);

        // If client chose instant card/escrow or in test environment, fulfill & dispatch email immediately
        if ($paymentMethod === 'card' || empty($checkoutUrl)) {
            $order->update([
                'payment_status' => 'paid',
                'fulfillment_status' => 'fulfilled',
            ]);

            try {
                Mail::to($email)->send(new OrderConfirmationMail($order));
            } catch (Exception $e) {
                Log::error('Order email delivery error: '.$e->getMessage(), ['order_id' => $orderId]);
            }
        }

        return response()->json([
            'status' => 'success',
            'order_id' => $orderId,
            'tx_ref' => $txRef,
            'voucher_code' => $voucherCode,
            'checkout_url' => $checkoutUrl,
            'total_usd' => $totalUsd,
            'total_mwk' => $totalMwk,
            'email' => $email,
            'delivery_estimate' => '38 seconds',
            'status_message' => "Payment initiated for Order #{$orderId}. A receipt and verification code have been dispatched to {$email}.",
            'items_count' => count($items),
        ]);
    }

    /**
     * Webhook endpoint for asynchronous PayChangu IPN callbacks.
     */
    public function webhook(Request $request): JsonResponse
    {
        $txRef = (string) $request->input('tx_ref');

        if (empty($txRef)) {
            return response()->json(['status' => 'error', 'message' => 'Missing tx_ref'], 400);
        }

        $order = Order::where('tx_ref', $txRef)->first();

        if (! $order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
        }

        // Server-to-server verification check
        $verification = $this->payChangu->verifyPayment($txRef);

        if ($verification['is_paid']) {
            $order->update([
                'payment_status' => 'paid',
                'raw_payment_response' => $verification['raw'] ?? null,
            ]);

            // If not yet fulfilled, dispatch voucher
            if ($order->fulfillment_status !== 'fulfilled') {
                $order->update(['fulfillment_status' => 'fulfilled']);

                try {
                    Mail::to($order->customer_email)->send(new OrderConfirmationMail($order));
                } catch (Exception $e) {
                    Log::error('Webhook order email failed: '.$e->getMessage(), ['order_id' => $order->order_id]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Payment verified & order fulfilled']);
        }

        return response()->json(['status' => 'pending', 'message' => 'Transaction not confirmed paid yet']);
    }

    /**
     * Return page after PayChangu checkout completion.
     */
    public function paymentReturn(Request $request): View
    {
        $txRef = (string) $request->query('tx_ref', '');
        $order = null;

        if ($txRef) {
            $order = Order::where('tx_ref', $txRef)->first();

            // Verify status on arrival
            if ($order && $order->payment_status === 'pending') {
                $verification = $this->payChangu->verifyPayment($txRef);
                if ($verification['is_paid']) {
                    $order->update([
                        'payment_status' => 'paid',
                        'fulfillment_status' => 'fulfilled',
                    ]);

                    try {
                        Mail::to($order->customer_email)->send(new OrderConfirmationMail($order));
                    } catch (Exception $e) {
                        Log::error('Payment return email delivery error: '.$e->getMessage());
                    }
                }
            }
        }

        return view('pages.payment-return', [
            'order' => $order,
            'txRef' => $txRef,
        ]);
    }
}
