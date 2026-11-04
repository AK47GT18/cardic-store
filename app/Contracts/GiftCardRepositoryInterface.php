<?php

namespace App\Contracts;

interface GiftCardRepositoryInterface
{
    /**
     * Get all gift cards with optional filtering.
     */
    public function all(array $filters = []): array;

    /**
     * Find a gift card by its identifier or slug.
     */
    public function find(string $id): ?array;

    /**
     * Get all distinct categories with counts.
     */
    public function getCategories(): array;

    /**
     * Get available regions with counts.
     */
    public function getRegions(): array;
}
