<?php

namespace App\Providers;

use App\Contracts\CurrencyConverterInterface;
use App\Contracts\DiscountCalculatorInterface;
use App\Contracts\GiftCardRepositoryInterface;
use App\Contracts\LiquidationQuoteInterface;
use App\Repositories\InMemoryGiftCardRepository;
use App\Services\CurrencyService;
use App\Services\DiscountCalculatorService;
use App\Services\LiquidationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GiftCardRepositoryInterface::class, InMemoryGiftCardRepository::class);
        $this->app->singleton(CurrencyConverterInterface::class, CurrencyService::class);
        $this->app->singleton(DiscountCalculatorInterface::class, DiscountCalculatorService::class);
        $this->app->singleton(LiquidationQuoteInterface::class, LiquidationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
