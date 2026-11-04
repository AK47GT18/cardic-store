<?php

namespace App\Contracts;

interface DiscountCalculatorInterface
{
    /**
     * Calculate discounted price given face value and discount percentage.
     */
    public function calculateFinalPrice(float $faceValue, float $discountPercentage): float;

    /**
     * Calculate total savings amount.
     */
    public function calculateSavings(float $faceValue, float $discountPercentage): float;

    /**
     * Get wholesale bulk tier discount based on order quantity.
     */
    public function calculateBulkDiscount(int $quantity, float $baseDiscount): float;
}
