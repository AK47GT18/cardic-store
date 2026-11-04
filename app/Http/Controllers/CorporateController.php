<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            'company_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'monthly_volume' => 'nullable|string',
            'notes' => 'nullable|string|max:500',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you for your inquiry. Our institutional sales team will activate your wholesale sandbox within 2 hours.',
        ]);
    }
}
