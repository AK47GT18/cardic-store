<?php

namespace App\Services;

use App\Contracts\LiquidationQuoteInterface;

class LiquidationService implements LiquidationQuoteInterface
{
    protected array $payoutRates = [
        'amazon' => 0.88,       // 88% cashout
        'apple' => 0.85,        // 85% cashout
        'steam' => 0.82,        // 82% cashout
        'playstation' => 0.80,  // 80% cashout
        'xbox' => 0.78,         // 78% cashout
        'netflix' => 0.82,      // 82% cashout
        'spotify' => 0.80,      // 80% cashout
        'google-play' => 0.84,  // 84% cashout
        'uber' => 0.83,         // 83% cashout
        'nintendo' => 0.81,     // 81% cashout
        'airbnb' => 0.82,       // 82% cashout
        'roblox' => 0.79,       // 79% cashout
        'default' => 0.78,      // 78% default
    ];

    public function generateQuote(string $brandId, float $faceValue, string $payoutMethod): array
    {
        $baseRate = $this->getPayoutRate($brandId);

        // Crypto or Store balance bonus
        $bonus = 0.0;
        if ($payoutMethod === 'crypto') {
            $bonus = 0.02; // +2% bonus for crypto payouts
        } elseif ($payoutMethod === 'cardic_balance') {
            $bonus = 0.05; // +5% bonus for store credit
        }

        $effectiveRate = min(0.95, $baseRate + $bonus);
        $payoutAmount = round($faceValue * $effectiveRate, 2);
        $feeAmount = round($faceValue - $payoutAmount, 2);

        return [
            'brand_id' => $brandId,
            'face_value' => $faceValue,
            'payout_method' => $payoutMethod,
            'base_rate_pct' => $baseRate * 100,
            'bonus_pct' => $bonus * 100,
            'effective_rate_pct' => $effectiveRate * 100,
            'payout_amount' => $payoutAmount,
            'fee_amount' => $feeAmount,
            'estimated_speed' => $payoutMethod === 'crypto' ? 'Under 90 seconds' : '2 - 5 minutes',
            'escrow_status' => 'Guaranteed by Cardic Instant Escrow Pool',
        ];
    }

    public function getPayoutRate(string $brandId): float
    {
        $id = strtolower($brandId);

        return $this->payoutRates[$id] ?? $this->payoutRates['default'];
    }
}
