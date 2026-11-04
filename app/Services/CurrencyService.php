<?php

namespace App\Services;

use App\Contracts\CurrencyConverterInterface;

class CurrencyService implements CurrencyConverterInterface
{
    protected array $rates = [
        'USD' => ['symbol' => '$', 'rate' => 1.00, 'name' => 'USD ($)'],
        'EUR' => ['symbol' => '€', 'rate' => 0.92, 'name' => 'EUR (€)'],
        'GBP' => ['symbol' => '£', 'rate' => 0.79, 'name' => 'GBP (£)'],
        'CAD' => ['symbol' => 'CA$', 'rate' => 1.36, 'name' => 'CAD ($)'],
        'AUD' => ['symbol' => 'AU$', 'rate' => 1.52, 'name' => 'AUD ($)'],
    ];

    public function convert(float $amountInUsd, string $targetCurrency = 'USD'): float
    {
        $target = strtoupper($targetCurrency);
        $rate = $this->rates[$target]['rate'] ?? 1.0;

        return round($amountInUsd * $rate, 2);
    }

    public function format(float $amount, string $currency = 'USD'): string
    {
        $cur = strtoupper($currency);
        $symbol = $this->rates[$cur]['symbol'] ?? '$';

        return $symbol.number_format($amount, 2);
    }

    public function getCurrencies(): array
    {
        return $this->rates;
    }
}
