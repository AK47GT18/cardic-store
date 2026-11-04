<?php

namespace App\Contracts;

interface CurrencyConverterInterface
{
    /**
     * Convert an amount from USD base to target currency.
     */
    public function convert(float $amountInUsd, string $targetCurrency = 'USD'): float;

    /**
     * Format an amount with currency symbol.
     */
    public function format(float $amount, string $currency = 'USD'): string;

    /**
     * Get list of supported currencies and their exchange rates relative to USD.
     */
    public function getCurrencies(): array;
}
