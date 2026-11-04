<?php

namespace App\Http\Controllers;

use App\Contracts\CurrencyConverterInterface;
use App\Services\GiftCardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function __construct(
        protected GiftCardService $giftCardService,
        protected CurrencyConverterInterface $currencyConverter
    ) {}

    /**
     * Landing Page designed from Reference Image 1 & Brand Image 2.
     */
    public function landing(Request $request)
    {
        $cards = $this->giftCardService->getCatalog();
        $categories = $this->giftCardService->getCategories();
        $regions = $this->giftCardService->getRegions();
        $currencies = $this->currencyConverter->getCurrencies();

        $stats = [
            'total_available' => 524,
            'completed_trades' => '10K+',
            'avg_delivery_speed' => '43 Sec',
            'escrow_validity' => '100.0%',
            'active_trades' => '14,200+',
            'client_rating' => '4.9',
            'reviews_count' => '5K+',
        ];

        return view('pages.landing', compact(
            'cards',
            'categories',
            'regions',
            'currencies',
            'stats'
        ));
    }

    /**
     * Dedicated Full Marketplace Catalog View with Sidebar Filters.
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->query('search'),
            'category' => $request->query('category', 'all'),
            'region' => $request->query('region', 'all'),
            'sort' => $request->query('sort', 'popular'),
            'min_rating' => $request->query('min_rating'),
        ];

        $cards = $this->giftCardService->getCatalog($filters);
        $categories = $this->giftCardService->getCategories();
        $regions = $this->giftCardService->getRegions();
        $currencies = $this->currencyConverter->getCurrencies();

        $stats = [
            'total_available' => 524,
            'avg_delivery_speed' => '43 Sec',
            'escrow_validity' => '100.0%',
            'active_trades' => '14,200+',
            'trustpilot_score' => '4.9/5',
        ];

        return view('pages.marketplace', compact(
            'cards',
            'categories',
            'regions',
            'currencies',
            'filters',
            'stats'
        ));
    }

    public function show(string $slug)
    {
        $card = $this->giftCardService->getCardBySlug($slug);

        if (! $card) {
            abort(404, 'Gift card not found in verified liquidity catalog.');
        }

        return view('pages.card-detail', compact('card'));
    }

    public function search(Request $request): JsonResponse
    {
        $filters = [
            'search' => $request->query('q'),
            'category' => $request->query('category', 'all'),
            'region' => $request->query('region', 'all'),
            'sort' => $request->query('sort', 'popular'),
        ];

        $cards = $this->giftCardService->getCatalog($filters);

        return response()->json([
            'status' => 'success',
            'count' => count($cards),
            'data' => $cards,
        ]);
    }

    /**
     * Dedicated Wishlist Page.
     */
    public function wishlist()
    {
        return view('pages.wishlist');
    }

    /**
     * Dedicated About Us Page designed from Reference Template 1.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Dedicated Terms & Conditions Page.
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Dedicated Privacy & Cookies Policy Page.
     */
    public function privacy()
    {
        return view('pages.privacy');
    }
}
