<?php

namespace App\Services;

use App\Contracts\DiscountCalculatorInterface;

class DiscountCalculatorService implements DiscountCalculatorInterface
{
    public function calculateFinalPrice(float $faceValue, float $discountPercentage): float
    {
        $savings = $this->calculateSavings($faceValue, $discountPercentage);

        return round($faceValue - $savings, 2);
    }

    public function calculateSavings(float $faceValue, float $discountPercentage): float
    {
        return round(($faceValue * $discountPercentage) / 100, 2);
    }

    public function calculateBulkDiscount(int $quantity, float $baseDiscount): float
    {
        // Volume tiers
        if ($quantity >= 50) {
            return min(18.0, $baseDiscount + 6.0);
        }
        if ($quantity >= 20) {
            return min(16.0, $baseDiscount + 4.0);
        }
        if ($quantity >= 10) {
            return min(14.0, $baseDiscount + 2.0);
        }

        return $baseDiscount;
    }
}
