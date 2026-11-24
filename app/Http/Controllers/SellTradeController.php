<?php

namespace App\Http\Controllers;

use App\Contracts\LiquidationQuoteInterface;
use App\Services\GiftCardService;
use App\Services\SanitizerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SellTradeController extends Controller
{
    public function __construct(
        protected LiquidationQuoteInterface $liquidationService,
        protected GiftCardService $giftCardService
    ) {}

    public function index()
    {
        $cards = $this->giftCardService->getCatalog();
        $popularBrands = array_slice($cards, 0, 8);

        return view('pages.sell-trade', compact('popularBrands'));
    }

    public function quote(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'brand' => ['nullable', 'string', 'max:50'],
            'face_value' => ['nullable', 'numeric', 'min:5', 'max:5000'],
            'payout_method' => ['nullable', 'string', 'max:50'],
        ]);

        $brandId = SanitizerService::cleanString($validated['brand'] ?? 'amazon', 50);
        $faceValue = (float) ($validated['face_value'] ?? 100);
        $payoutMethod = SanitizerService::cleanString($validated['payout_method'] ?? 'crypto', 50);

        $quote = $this->liquidationService->generateQuote($brandId, $faceValue, $payoutMethod);

        return response()->json([
            'status' => 'success',
            'quote' => $quote,
        ]);
    }
}
