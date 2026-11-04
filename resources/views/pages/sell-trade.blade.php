<x-layouts.app title="Sell / Trade Gift Cards — Cardic Store Liquidation">
    <div class="pt-[100px]">
    <main class="w-full bg-[#f8f9ff] min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-1.5 text-xs text-slate-500 mb-6">
                <a href="{{ route('marketplace') }}" class="hover:text-[#1d4ed8]">Home</a>
                <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                <span class="text-[#0b1c30] font-bold">Sell & Trade Gift Cards</span>
            </nav>

            {{-- Hero Title Banner --}}
            <div class="text-center max-w-3xl mx-auto mb-12">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3 uppercase tracking-wider">
                    <span class="material-symbols-outlined text-sm text-emerald-600">currency_exchange</span>
                    Instant Liquidity Engine
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-[#0b1c30] tracking-tight leading-tight">
                    Turn Unused Gift Cards into <span class="text-[#1d4ed8]">Instant Cash</span> or <span class="text-amber-600">Crypto</span>
                </h1>
                <p class="text-sm sm:text-base text-slate-600 mt-3 leading-relaxed">
                    Sell cards from Amazon, Apple, Steam, PlayStation, and 500+ merchants. Automatic API balance validation and sub-90 second payouts directly to USDT, Bitcoin, Bank Transfer, or PayPal.
                </p>
            </div>

            {{-- Interactive Liquidation Calculator Organism --}}
            <div 
                x-data="{
                    selectedBrand: 'amazon',
                    cardBalance: 100,
                    payoutMethod: 'crypto',
                    claimCode: '',
                    isSubmitting: false,
                    tradeSuccess: false,
                    rates: {
                        'amazon': 0.88,
                        'apple': 0.85,
                        'steam': 0.82,
                        'playstation': 0.80,
                        'xbox': 0.78,
                        'netflix': 0.82,
                        'spotify': 0.80,
                        'google-play': 0.84,
                        'uber': 0.83
                    },
                    get baseRate() {
                        return this.rates[this.selectedBrand] || 0.80;
                    },
                    get bonusRate() {
                        if (this.payoutMethod === 'crypto') return 0.02; // +2% bonus for crypto
                        if (this.payoutMethod === 'cardic_balance') return 0.05; // +5% bonus for store credit
                        return 0.0;
                    },
                    get effectiveRate() {
                        return this.baseRate + this.bonusRate;
                    },
                    get payoutAmount() {
                        return (parseFloat(this.cardBalance || 0) * this.effectiveRate).toFixed(2);
                    },
                    get feeAmount() {
                        return (parseFloat(this.cardBalance || 0) * (1 - this.effectiveRate)).toFixed(2);
                    },
                    submitTrade() {
                        if (!this.claimCode) {
                            alert('Please enter your card claim code or PIN to initiate automated verification.');
                            return;
                        }
                        this.isSubmitting = true;
                        setTimeout(() => {
                            this.isSubmitting = false;
                            this.tradeSuccess = true;
                        }, 1400);
                    }
                }"
                class="max-w-4xl mx-auto bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-100 mb-16">
                
                <div x-show="!tradeSuccess" class="grid grid-cols-1 md:grid-cols-12 gap-8">
                    {{-- Form Left Col (7 Cols) --}}
                    <div class="md:col-span-7 flex flex-col gap-5">
                        <div class="border-b border-slate-100 pb-3">
                            <h2 class="text-lg font-extrabold text-[#0b1c30]">1. Select Your Gift Card Brand</h2>
                            <p class="text-xs text-slate-500">Pick from our highest liquidity tiers for immediate settlement</p>
                        </div>

                        {{-- Brand Grid Selector --}}
                        <div class="grid grid-cols-3 gap-2.5">
                            <button 
                                type="button" 
                                @click="selectedBrand = 'amazon'"
                                :class="selectedBrand === 'amazon' ? 'border-[#1d4ed8] bg-blue-50 text-[#0037b0] font-bold shadow-xs' : 'border-slate-200 bg-white text-slate-700'"
                                class="p-3 rounded-2xl border text-xs flex flex-col items-center justify-center gap-1 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-lg">shopping_cart</span>
                                <span class="font-bold">Amazon</span>
                                <span class="text-[10px] text-emerald-600 font-bold">88% Payout</span>
                            </button>
                            <button 
                                type="button" 
                                @click="selectedBrand = 'apple'"
                                :class="selectedBrand === 'apple' ? 'border-[#1d4ed8] bg-blue-50 text-[#0037b0] font-bold shadow-xs' : 'border-slate-200 bg-white text-slate-700'"
                                class="p-3 rounded-2xl border text-xs flex flex-col items-center justify-center gap-1 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-lg">phone_iphone</span>
                                <span class="font-bold">Apple / iTunes</span>
                                <span class="text-[10px] text-emerald-600 font-bold">85% Payout</span>
                            </button>
                            <button 
                                type="button" 
                                @click="selectedBrand = 'steam'"
                                :class="selectedBrand === 'steam' ? 'border-[#1d4ed8] bg-blue-50 text-[#0037b0] font-bold shadow-xs' : 'border-slate-200 bg-white text-slate-700'"
                                class="p-3 rounded-2xl border text-xs flex flex-col items-center justify-center gap-1 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-lg">sports_esports</span>
                                <span class="font-bold">Steam Wallet</span>
                                <span class="text-[10px] text-emerald-600 font-bold">82% Payout</span>
                            </button>
                            <button 
                                type="button" 
                                @click="selectedBrand = 'playstation'"
                                :class="selectedBrand === 'playstation' ? 'border-[#1d4ed8] bg-blue-50 text-[#0037b0] font-bold shadow-xs' : 'border-slate-200 bg-white text-slate-700'"
                                class="p-3 rounded-2xl border text-xs flex flex-col items-center justify-center gap-1 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-lg">gamepad</span>
                                <span class="font-bold">PlayStation</span>
                                <span class="text-[10px] text-emerald-600 font-bold">80% Payout</span>
                            </button>
                            <button 
                                type="button" 
                                @click="selectedBrand = 'xbox'"
                                :class="selectedBrand === 'xbox' ? 'border-[#1d4ed8] bg-blue-50 text-[#0037b0] font-bold shadow-xs' : 'border-slate-200 bg-white text-slate-700'"
                                class="p-3 rounded-2xl border text-xs flex flex-col items-center justify-center gap-1 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-lg">videogame_asset</span>
                                <span class="font-bold">Xbox Pass</span>
                                <span class="text-[10px] text-emerald-600 font-bold">78% Payout</span>
                            </button>
                            <button 
                                type="button" 
                                @click="selectedBrand = 'uber'"
                                :class="selectedBrand === 'uber' ? 'border-[#1d4ed8] bg-blue-50 text-[#0037b0] font-bold shadow-xs' : 'border-slate-200 bg-white text-slate-700'"
                                class="p-3 rounded-2xl border text-xs flex flex-col items-center justify-center gap-1 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-lg">local_taxi</span>
                                <span class="font-bold">Uber / Eats</span>
                                <span class="text-[10px] text-emerald-600 font-bold">83% Payout</span>
                            </button>
                        </div>

                        {{-- Card Face Value Input --}}
                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1.5">2. Card Face Value Amount (USD):</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">$</span>
                                <input 
                                    type="number" 
                                    x-model="cardBalance"
                                    min="10" 
                                    max="2000" 
                                    class="w-full bg-[#eff4ff] border border-slate-200 rounded-xl pl-8 pr-4 py-2.5 text-sm font-bold text-slate-900 outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20">
                            </div>
                            <div class="flex items-center gap-2 mt-2">
                                <button type="button" @click="cardBalance = 25" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700">$25</button>
                                <button type="button" @click="cardBalance = 50" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700">$50</button>
                                <button type="button" @click="cardBalance = 100" class="px-2.5 py-1 rounded-lg bg-[#1d4ed8] text-white text-xs font-bold">$100</button>
                                <button type="button" @click="cardBalance = 250" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700">$250</button>
                                <button type="button" @click="cardBalance = 500" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700">$500</button>
                            </div>
                        </div>

                        {{-- Payout Destination --}}
                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1.5">3. Choose Settlement Method:</label>
                            <div class="grid grid-cols-2 gap-2">
                                <label 
                                    :class="payoutMethod === 'crypto' ? 'border-[#1d4ed8] bg-blue-50/60' : 'border-slate-200 bg-white'"
                                    class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer transition-all">
                                    <input type="radio" name="trade_payout" value="crypto" x-model="payoutMethod" class="accent-[#1d4ed8]">
                                    <div>
                                        <div class="text-xs font-bold text-slate-900 flex items-center gap-1">
                                            <span>USDT / BTC</span>
                                            <span class="text-[9px] bg-amber-100 text-amber-800 font-bold px-1.5 py-0.2 rounded">+2% Bonus</span>
                                        </div>
                                        <div class="text-[10px] text-slate-500">Under 90s instant release</div>
                                    </div>
                                </label>

                                <label 
                                    :class="payoutMethod === 'bank' ? 'border-[#1d4ed8] bg-blue-50/60' : 'border-slate-200 bg-white'"
                                    class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer transition-all">
                                    <input type="radio" name="trade_payout" value="bank" x-model="payoutMethod" class="accent-[#1d4ed8]">
                                    <div>
                                        <div class="text-xs font-bold text-slate-900">Direct Bank ACH / Wire</div>
                                        <div class="text-[10px] text-slate-500">Same-day USD / EUR</div>
                                    </div>
                                </label>

                                <label 
                                    :class="payoutMethod === 'paypal' ? 'border-[#1d4ed8] bg-blue-50/60' : 'border-slate-200 bg-white'"
                                    class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer transition-all">
                                    <input type="radio" name="trade_payout" value="paypal" x-model="payoutMethod" class="accent-[#1d4ed8]">
                                    <div>
                                        <div class="text-xs font-bold text-slate-900">PayPal</div>
                                        <div class="text-[10px] text-slate-500">Instant to email address</div>
                                    </div>
                                </label>

                                <label 
                                    :class="payoutMethod === 'cardic_balance' ? 'border-[#1d4ed8] bg-blue-50/60' : 'border-slate-200 bg-white'"
                                    class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer transition-all">
                                    <input type="radio" name="trade_payout" value="cardic_balance" x-model="payoutMethod" class="accent-[#1d4ed8]">
                                    <div>
                                        <div class="text-xs font-bold text-slate-900 flex items-center gap-1">
                                            <span>Cardic Credit</span>
                                            <span class="text-[9px] bg-emerald-100 text-emerald-800 font-bold px-1.5 py-0.2 rounded">+5% Bonus</span>
                                        </div>
                                        <div class="text-[10px] text-slate-500">Re-invest at zero fees</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Card Claim Code --}}
                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1.5">4. Digital Card Key / PIN:</label>
                            <input 
                                type="text" 
                                x-model="claimCode"
                                placeholder="e.g. ABCD-1234-EFGH-5678" 
                                class="w-full bg-[#eff4ff] border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-mono font-bold text-slate-900 outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20 uppercase">
                        </div>
                    </div>

                    {{-- Quote Summary Right Col (5 Cols) --}}
                    <div class="md:col-span-5 bg-[#eff4ff]/60 border border-blue-200/60 rounded-3xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between pb-3 border-b border-blue-200/50">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Instant Escrow Quote</span>
                                <span class="bg-emerald-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Live Guaranteed</span>
                            </div>

                            <div class="mt-6 text-center">
                                <span class="text-xs text-slate-500 font-medium">You Will Receive:</span>
                                <div class="text-3xl sm:text-4xl font-extrabold text-[#0037b0] tracking-tight mt-1" x-text="`$${payoutAmount}`">
                                    $88.00
                                </div>
                                <div class="text-xs text-emerald-600 font-bold mt-1" x-text="`${(effectiveRate * 100).toFixed(0)}% Cashout Yield`"></div>
                            </div>

                            <div class="mt-8 space-y-2.5 text-xs text-slate-600">
                                <div class="flex justify-between">
                                    <span>Face Value:</span>
                                    <span class="font-bold text-slate-900" x-text="`$${cardBalance}`"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Base Liquidity Rate:</span>
                                    <span class="font-semibold text-slate-700" x-text="`${(baseRate * 100).toFixed(0)}%`"></span>
                                </div>
                                <div class="flex justify-between text-emerald-600">
                                    <span>Payment Method Bonus:</span>
                                    <span class="font-bold" x-text="`+${(bonusRate * 100).toFixed(0)}%`"></span>
                                </div>
                                <div class="flex justify-between pt-2 border-t border-blue-200/50 font-bold text-slate-800">
                                    <span>Fulfillment Speed:</span>
                                    <span class="text-emerald-700 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-xs">bolt</span>
                                        <span x-text="payoutMethod === 'crypto' ? '< 90 seconds' : '2 – 5 minutes'"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button 
                                type="button" 
                                @click="submitTrade()"
                                :disabled="isSubmitting"
                                class="w-full bg-[#1d4ed8] hover:bg-[#0037b0] text-white font-bold py-3.5 rounded-2xl shadow-md text-xs sm:text-sm flex items-center justify-center gap-2 transition-all cursor-pointer disabled:opacity-50">
                                <span x-show="!isSubmitting">Sell Card & Claim Payout</span>
                                <span x-show="isSubmitting">Validating API Balance...</span>
                                <span class="material-symbols-outlined text-base">arrow_forward</span>
                            </button>
                            <p class="text-[10px] text-center text-slate-400 mt-2">
                                Encrypted 256-bit automated escrow transfer. Zero chargeback risk.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Trade Confirmation State --}}
                <div x-show="tradeSuccess" class="text-center py-10" style="display: none;">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-4 ring-8 ring-emerald-50">
                        <span class="material-symbols-outlined text-3xl font-bold">check</span>
                    </div>
                    <h3 class="text-2xl font-extrabold text-[#0b1c30]">Liquidation Order Accepted!</h3>
                    <p class="text-sm text-slate-600 mt-2 max-w-md mx-auto">
                        Your gift card voucher has been successfully validated against issuer balance APIs. Payout of <strong class="text-emerald-700" x-text="`$${payoutAmount}`"></strong> is currently disbursing to your selected payment channel.
                    </p>
                    <div class="mt-6 flex justify-center gap-3">
                        <button type="button" @click="tradeSuccess = false; claimCode = ''" class="bg-[#1d4ed8] text-white font-bold px-6 py-2.5 rounded-xl text-xs hover:bg-[#0037b0]">
                            Liquidate Another Card
                        </button>
                        <a href="{{ route('marketplace') }}" class="bg-slate-100 text-slate-700 font-bold px-6 py-2.5 rounded-xl text-xs hover:bg-slate-200">
                            Browse Marketplace
                        </a>
                    </div>
                </div>
            </div>

            {{-- 3-Step Process Explanation --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1d4ed8] flex items-center justify-center font-bold text-sm mb-3">1</div>
                    <h4 class="text-base font-bold text-slate-900">Enter Brand & PIN</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        Input the claim code and select your desired liquidation payout channel (Crypto, PayPal, Bank ACH).
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1d4ed8] flex items-center justify-center font-bold text-sm mb-3">2</div>
                    <h4 class="text-base font-bold text-slate-900">Sub-60s API Verification</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        Our automated node interacts with authorized merchant gift card balances to authenticate the full card face value.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-xs">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1d4ed8] flex items-center justify-center font-bold text-sm mb-3">3</div>
                    <h4 class="text-base font-bold text-slate-900">Instant Settlement</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        Funds are released automatically from the Cardic Escrow liquidity pool with zero holding periods or delays.
                    </p>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>


