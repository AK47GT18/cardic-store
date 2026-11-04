<?php

namespace App\Http\Controllers;

use App\Contracts\LiquidationQuoteInterface;
use App\Services\GiftCardService;
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
        $brandId = $request->input('brand', 'amazon');
        $faceValue = (float) $request->input('face_value', 100);
        $payoutMethod = $request->input('payout_method', 'crypto');

        $quote = $this->liquidationService->generateQuote($brandId, $faceValue, $payoutMethod);

        return response()->json([
            'status' => 'success',
            'quote' => $quote,
        ]);
    }
}
