<?php

namespace App\Services;

use App\Contracts\DiscountCalculatorInterface;
use App\Contracts\GiftCardRepositoryInterface;

class GiftCardService
{
    public function __construct(
        protected GiftCardRepositoryInterface $repository,
        protected DiscountCalculatorInterface $discountCalculator
    ) {}

    public function getCatalog(array $filters = []): array
    {
        $cards = $this->repository->all($filters);

        // Enrich each card with computed prices for its denominations
        foreach ($cards as &$card) {
            $computed = [];
            foreach ($card['denominations'] as $denom) {
                $computed[$denom] = [
                    'face_value' => (float) $denom,
                    'final_price' => $this->discountCalculator->calculateFinalPrice((float) $denom, (float) $card['discount_pct']),
                    'savings' => $this->discountCalculator->calculateSavings((float) $denom, (float) $card['discount_pct']),
                ];
            }
            $card['computed_pricing'] = $computed;

            $defaultVal = $card['default_denomination'];
            $card['active_price'] = $computed[$defaultVal]['final_price'] ?? ($defaultVal * (1 - $card['discount_pct'] / 100));
            $card['active_savings'] = $computed[$defaultVal]['savings'] ?? ($defaultVal * ($card['discount_pct'] / 100));
        }

        return $cards;
    }

    public function getCategories(): array
    {
        return $this->repository->getCategories();
    }

    public function getRegions(): array
    {
        return $this->repository->getRegions();
    }

    public function getCardBySlug(string $slug): ?array
    {
        $card = $this->repository->find($slug);
        if (! $card) {
            return null;
        }

        $computed = [];
        foreach ($card['denominations'] as $denom) {
            $computed[$denom] = [
                'face_value' => (float) $denom,
                'final_price' => $this->discountCalculator->calculateFinalPrice((float) $denom, (float) $card['discount_pct']),
                'savings' => $this->discountCalculator->calculateSavings((float) $denom, (float) $card['discount_pct']),
            ];
        }
        $card['computed_pricing'] = $computed;

        return $card;
    }
}
