<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SellTradeController;
use Illuminate\Support\Facades\Route;

// Main Landing Page
Route::get('/', [MarketplaceController::class, 'landing'])->name('home');
Route::redirect('/home', '/');

// Full Marketplace Catalog with Sidebar Filters
Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace');
Route::get('/cards', [MarketplaceController::class, 'index'])->name('cards.index');
Route::get('/cards/{slug}', [MarketplaceController::class, 'show'])->name('cards.show');
Route::get('/api/cards/search', [MarketplaceController::class, 'search'])->name('cards.search');

// Sell & Trade Portal (Instant Liquidation Engine)
Route::get('/sell-and-trade', [SellTradeController::class, 'index'])->name('sell-trade');
Route::post('/api/liquidation/quote', [SellTradeController::class, 'quote'])
    ->name('liquidation.quote')
    ->middleware('throttle:10,1');

// Bulk & Corporate Wholesale Portal
Route::get('/bulk-corporate', [CorporateController::class, 'index'])->name('corporate');
Route::post('/api/corporate/inquire', [CorporateController::class, 'inquire'])
    ->name('corporate.inquire')
    ->middleware('throttle:10,1');

// How It Works / Escrow Protocol & Redemption Guide
Route::get('/how-it-works', [HowItWorksController::class, 'index'])->name('how-it-works');

// Dedicated About Us Page
Route::get('/about', [MarketplaceController::class, 'about'])->name('about');

// Dedicated Contact Page & API
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/api/contact', [ContactController::class, 'submit'])
    ->name('contact.submit')
    ->middleware('throttle:6,1');

// Newsletter VIP Subscription API
Route::post('/api/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe')
    ->middleware('throttle:6,1');

// Dedicated Cart & Wishlist Pages
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/wishlist', [MarketplaceController::class, 'wishlist'])->name('wishlist');

// Cart & PayChangu / Instant Escrow Checkout API
Route::post('/api/checkout', [CartController::class, 'checkout'])
    ->name('checkout')
    ->middleware('throttle:15,1');

// PayChangu Asynchronous Webhook IPN Listener
Route::post('/api/checkout/webhook', [CartController::class, 'webhook'])->name('checkout.webhook');

// PayChangu Return & Verification Landing Page
Route::get('/checkout/return', [CartController::class, 'paymentReturn'])->name('checkout.return');

// Legal & Policy Pages
Route::get('/terms', [MarketplaceController::class, 'terms'])->name('terms');
Route::get('/privacy', [MarketplaceController::class, 'privacy'])->name('privacy');
Route::get('/cookies', [MarketplaceController::class, 'privacy'])->name('cookies');
