<?php

namespace App\Http\Controllers;

use App\Services\SanitizerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CorporateController extends Controller
{
    public function index()
    {
        $tiers = [
            [
                'name' => 'Starter Liquidity',
                'volume' => '$5,000 – $25,000 / mo',
                'discount' => 'Up to 10% off',
                'api' => 'Standard REST API (60 req/min)',
                'escrow' => 'Automated Instant Escrow',
                'support' => 'Dedicated Account Manager',
                'popular' => false,
            ],
            [
                'name' => 'Institutional Growth',
                'volume' => '$25,000 – $100,000 / mo',
                'discount' => 'Up to 14% off',
                'api' => 'High-Throughput WebSocket & Webhook SLA',
                'escrow' => 'Net-7 Terms & Multi-Sig Vault',
                'support' => '24/7 Priority Discord & Phone SLA',
                'popular' => true,
            ],
            [
                'name' => 'Wholesale Enterprise',
                'volume' => '$100,000+ / mo',
                'discount' => 'Custom Bulk Rate (Up to 18%)',
                'api' => 'Unlimited API Keys & Custom Webhooks',
                'escrow' => 'Custom Liquidity Escrow Pool',
                'support' => 'Executive SLA & Dedicated Engineer',
                'popular' => false,
            ],
        ];

        return view('pages.corporate', compact('tiers'));
    }

    public function inquire(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'company_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email:rfc', 'max:150'],
            'monthly_volume' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $company = SanitizerService::cleanString($validated['company_name'] ?? null, 100);
        $email = SanitizerService::cleanEmail($validated['email'] ?? '');
        $volume = SanitizerService::cleanString($validated['monthly_volume'] ?? null, 100);
        $notes = SanitizerService::cleanString($validated['notes'] ?? null, 1000);

        // Notify Admin of high-value wholesale lead
        try {
            $adminEmail = config('services.admin.email', 'websmtp47@gmail.com');
            Mail::raw(
                "🚨 New Institutional Wholesale Lead:\n\nCompany: {$company}\nEmail: {$email}\nEstimated Volume: {$volume}\nNotes: {$notes}\nIP: ".$request->ip(),
                function ($message) use ($adminEmail, $email, $company) {
                    $message->to($adminEmail)
                        ->replyTo($email)
                        ->subject("💼 [Wholesale Lead] {$company} ({$email})");
                }
            );
        } catch (\Exception $e) {
            Log::error('Wholesale lead email failed: '.$e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you for your inquiry. Our institutional sales team will activate your wholesale sandbox within 2 hours.',
        ]);
    }
}
