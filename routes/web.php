<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\SellTradeController;
use Illuminate\Support\Facades\Route;

// Main Landing Page (designed from Reference Image 1 & Brand Logo Image 2)
Route::get('/', [MarketplaceController::class, 'landing'])->name('home');

// Full Marketplace Catalog with Sidebar Filters
Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace');
Route::get('/cards', [MarketplaceController::class, 'index'])->name('cards.index');
Route::get('/cards/{slug}', [MarketplaceController::class, 'show'])->name('cards.show');
Route::get('/api/cards/search', [MarketplaceController::class, 'search'])->name('cards.search');

// Sell & Trade Portal (Instant Liquidation Engine)
Route::get('/sell-and-trade', [SellTradeController::class, 'index'])->name('sell-trade');
Route::post('/api/liquidation/quote', [SellTradeController::class, 'quote'])->name('liquidation.quote');

// Bulk & Corporate Wholesale Portal
Route::get('/bulk-corporate', [CorporateController::class, 'index'])->name('corporate');
Route::post('/api/corporate/inquire', [CorporateController::class, 'inquire'])->name('corporate.inquire');

// How It Works / Escrow Protocol & Redemption Guide
Route::get('/how-it-works', [HowItWorksController::class, 'index'])->name('how-it-works');

// Dedicated About Us Page (designed from Editorial Reference Template)
Route::get('/about', [MarketplaceController::class, 'about'])->name('about');

// Dedicated Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/api/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Dedicated Cart Page
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Cart & Instant Checkout API
Route::post('/api/checkout', [CartController::class, 'checkout'])->name('checkout');

// Legal & Policy Pages
Route::get('/terms', [MarketplaceController::class, 'terms'])->name('terms');
Route::get('/privacy', [MarketplaceController::class, 'privacy'])->name('privacy');
Route::get('/cookies', [MarketplaceController::class, 'privacy'])->name('cookies');
