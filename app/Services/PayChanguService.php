<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayChanguService
{
    private string $secretKey;

    private string $baseUrl;

    public function __construct()
    {
        $this->secretKey = (string) config('services.paychangu.secret_key', '');
        $this->baseUrl = rtrim((string) config('services.paychangu.base_url', 'https://api.paychangu.com'), '/');
    }

    /**
     * Create a hosted payment checkout session.
     *
     * @param array{
     *     amount: float|int,
     *     currency: string,
     *     email: string,
     *     first_name?: string,
     *     last_name?: string,
     *     tx_ref: string,
     *     callback_url: string,
     *     return_url: string,
     *     title?: string,
     *     description?: string
     * } $payload
     * @return array<string, mixed>
     */
    public function createPayment(array $payload): array
    {
        try {
            $response = Http::withToken($this->secretKey)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->timeout(15)
                ->post("{$this->baseUrl}/payment", [
                    'amount' => $payload['amount'],
                    'currency' => $payload['currency'] ?? 'MWK',
                    'email' => $payload['email'],
                    'first_name' => $payload['first_name'] ?? 'Cardic',
                    'last_name' => $payload['last_name'] ?? 'Customer',
                    'tx_ref' => $payload['tx_ref'],
                    'callback_url' => $payload['callback_url'],
                    'return_url' => $payload['return_url'],
                    'customization' => [
                        'title' => $payload['title'] ?? 'Cardic Store Purchase',
                        'description' => $payload['description'] ?? 'Instant Gift Card Fulfillment',
                    ],
                ]);

            if ($response->successful()) {
                $data = $response->json();

                return [
                    'status' => 'success',
                    'checkout_url' => $data['data']['checkout_url'] ?? null,
                    'raw' => $data,
                ];
            }

            Log::error('PayChangu Payment Creation Failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return [
                'status' => 'error',
                'message' => $response->json('message') ?? 'PayChangu payment initialization failed',
            ];
        } catch (Exception $e) {
            Log::error('PayChangu Exception: '.$e->getMessage());

            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Verify payment status directly with PayChangu.
     *
     * @return array<string, mixed>
     */
    public function verifyPayment(string $txRef): array
    {
        try {
            $response = Http::withToken($this->secretKey)
                ->withHeaders([
                    'Accept' => 'application/json',
                ])
                ->timeout(12)
                ->get("{$this->baseUrl}/verify-payment/{$txRef}");

            if ($response->successful()) {
                $data = $response->json();
                $isPaid = isset($data['data']['status']) && strtolower((string) $data['data']['status']) === 'success';

                return [
                    'status' => $isPaid ? 'success' : 'pending',
                    'is_paid' => $isPaid,
                    'amount' => $data['data']['amount'] ?? null,
                    'currency' => $data['data']['currency'] ?? 'MWK',
                    'raw' => $data,
                ];
            }

            return [
                'status' => 'error',
                'is_paid' => false,
                'message' => $response->json('message') ?? 'Verification failed',
            ];
        } catch (Exception $e) {
            Log::error("PayChangu Verify Exception for {$txRef}: ".$e->getMessage());

            return [
                'status' => 'error',
                'is_paid' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
