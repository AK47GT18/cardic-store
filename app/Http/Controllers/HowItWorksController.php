<?php

namespace App\Http\Controllers;

use App\Services\GiftCardService;

class HowItWorksController extends Controller
{
    public function __construct(
        protected GiftCardService $giftCardService
    ) {}

    public function index()
    {
        $cards = $this->giftCardService->getCatalog();
        $categories = $this->giftCardService->getCategories();

        return view('pages.how-it-works', compact('cards', 'categories'));
    }
}
