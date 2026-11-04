<?php

namespace App\Contracts;

interface LiquidationQuoteInterface
{
    /**
     * Generate an instant payout quote for a gift card liquidation.
     *
     * @param  string  $payoutMethod  (crypto, bank, paypal, cardic_balance)
     */
    public function generateQuote(string $brandId, float $faceValue, string $payoutMethod): array;

    /**
     * Get payout rate percentage for a given brand.
     */
    public function getPayoutRate(string $brandId): float;
}
