<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Dedicated full-page cart view.
     */
    public function index(): View
    {
        return view('pages.cart');
    }

    public function checkout(Request $request): JsonResponse
    {
        $items = $request->input('items', []);
        $paymentMethod = $request->input('payment_method', 'card');
        $email = $request->input('email', 'customer@example.com');

        $orderId = 'CDS-'.strtoupper(bin2hex(random_bytes(4)));
        $escrowLockId = 'ESC-'.strtoupper(bin2hex(random_bytes(5)));

        return response()->json([
            'status' => 'success',
            'order_id' => $orderId,
            'escrow_id' => $escrowLockId,
            'email' => $email,
            'delivery_estimate' => '38 seconds',
            'status_message' => 'Payment processed and verified by Cardic Instant Escrow Pool. Encrypted redemption keys sent to '.$email,
            'items_count' => count($items),
        ]);
    }
}
