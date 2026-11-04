<x-layouts.app :title="$card['name'] . ' Gift Card — Cardic Store'">
    <div class="pt-[100px]">
    <main class="w-full bg-[#f8f9ff] min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-1.5 text-xs text-slate-500 mb-6">
                <a href="{{ route('marketplace') }}" class="hover:text-[#1d4ed8] flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">home</span> Home
                </a>
                <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                <a href="{{ route('marketplace') }}" class="hover:text-[#1d4ed8]">Gift Cards</a>
                <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                <a href="{{ route('marketplace') }}?category={{ $card['category_id'] }}" class="hover:text-[#1d4ed8]">{{ $card['category'] }}</a>
                <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                <span class="text-[#0b1c30] font-bold">{{ $card['name'] }}</span>
            </nav>

            <div 
                x-data="{
                    selectedDenom: {{ $card['default_denomination'] }},
                    discountPct: {{ $card['discount_pct'] }},
                    qty: 1,
                    isCustom: false,
                    customInput: {{ $card['default_denomination'] }},
                    minLimit: 10,
                    maxLimit: 500,
                    setPreset(d) {
                        this.isCustom = false;
                        this.selectedDenom = d;
                    },
                    enableCustom() {
                        this.isCustom = true;
                        if (!this.customInput) {
                            this.customInput = this.selectedDenom;
                        }
                    },
                    onCustomInput(val) {
                        let v = parseFloat(val) || 0;
                        if (v > this.maxLimit) {
                            v = this.maxLimit;
                            this.customInput = this.maxLimit;
                        }
                        this.selectedDenom = v;
                    },
                    get activePrice() {
                        return (this.selectedDenom * (1 - this.discountPct / 100)).toFixed(2);
                    },
                    get activeSavings() {
                        return (this.selectedDenom * (this.discountPct / 100)).toFixed(2);
                    },
                    get total() {
                        return (parseFloat(this.activePrice) * this.qty).toFixed(2);
                    }
                }"
                class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

                {{-- LEFT: Card Visual + Details (7 cols) --}}
                <div class="lg:col-span-7 flex flex-col gap-6">
                    {{-- Large Card Header Visual --}}
                    <div class="relative w-full h-64 sm:h-80 rounded-3xl bg-gradient-to-tr {{ $card['gradient'] }} p-8 text-white flex flex-col justify-between overflow-hidden shadow-xl">
                        <div class="flex items-start justify-between z-10">
                            <div>
                                <span class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1.5 shadow-xs w-fit">
                                    <span>{{ $card['region'] }}</span>
                                </span>
                                @if($card['instant_delivery'])
                                    <span class="mt-2 inline-flex items-center gap-1 bg-emerald-500/30 text-emerald-200 px-2.5 py-0.5 rounded-full text-[10px] font-bold">
                                        <span class="material-symbols-outlined text-xs">bolt</span>
                                        Instant Digital Delivery
                                    </span>
                                @endif
                            </div>
                            <span class="bg-white/20 backdrop-blur-md text-white text-xs px-3 py-1 rounded-full font-bold shadow-xs">
                                Verified Code
                            </span>
                        </div>

                        <div class="z-10">
                            <div class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white drop-shadow-sm">
                                {{ $card['brand'] }}
                            </div>
                            <div class="text-sm text-white/70 font-medium mt-0.5">{{ $card['subtitle'] }}</div>
                        </div>

                        {{-- Decorative orbs --}}
                        <div class="absolute -right-12 -bottom-12 w-52 h-52 {{ $card['glow_color'] }} rounded-full blur-2xl pointer-events-none"></div>
                        <div class="absolute -left-10 -top-10 w-36 h-36 bg-white/5 rounded-full blur-xl pointer-events-none"></div>
                    </div>

                    {{-- Product Description --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-xs">
                        <h2 class="text-base font-extrabold text-[#0b1c30] mb-2">About This Gift Card</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">{{ $card['description'] }}</p>

                        {{-- Key Product Attributes --}}
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-5">
                            <div class="bg-[#eff4ff] rounded-xl p-3 text-center">
                                <span class="material-symbols-outlined text-[#1d4ed8] text-lg block mb-1">bolt</span>
                                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Delivery</div>
                                <div class="text-xs font-extrabold text-[#0b1c30] mt-0.5">Sub-60 Seconds</div>
                            </div>
                            <div class="bg-[#eff4ff] rounded-xl p-3 text-center">
                                <span class="material-symbols-outlined text-[#1d4ed8] text-lg block mb-1">verified_user</span>
                                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Warranty</div>
                                <div class="text-xs font-extrabold text-[#0b1c30] mt-0.5">100% Escrow</div>
                            </div>
                            <div class="bg-[#eff4ff] rounded-xl p-3 text-center">
                                <span class="material-symbols-outlined text-amber-500 text-lg block mb-1">currency_bitcoin</span>
                                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Payment</div>
                                <div class="text-xs font-extrabold text-[#0b1c30] mt-0.5">Crypto Accepted</div>
                            </div>
                        </div>
                    </div>

                    {{-- Redemption Steps Card --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-xs">
                        <h2 class="text-base font-extrabold text-[#0b1c30] mb-4">How to Redeem This Card</h2>
                        <ol class="space-y-4">
                            @foreach($card['redemption_steps'] as $i => $step)
                                <li class="flex items-start gap-3.5">
                                    <div class="w-7 h-7 rounded-full bg-[#1d4ed8] text-white text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">
                                        {{ $i + 1 }}
                                    </div>
                                    <span class="text-sm text-slate-600 leading-relaxed">{{ $step }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                {{-- RIGHT: Purchase Panel (Sticky, 5 cols) --}}
                <div class="lg:col-span-5 lg:sticky lg:top-24 flex flex-col gap-5">
                    {{-- Purchase Card --}}
                    <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-100 shadow-md">
                        <div class="flex items-center justify-between mb-1">
                            <h1 class="text-lg font-extrabold text-[#0b1c30]">{{ $card['name'] }}</h1>
                            <div class="flex items-center gap-1 text-amber-400 font-bold text-xs">
                                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span>{{ number_format($card['rating'], 1) }}</span>
                                <span class="text-slate-400 font-normal">({{ number_format($card['reviews_count']) }})</span>
                            </div>
                        </div>
                        <div class="text-xs text-slate-400 font-medium mb-5">{{ $card['badge_type'] }} • {{ $card['region'] }}</div>

                        {{-- Denomination Selector with Custom Option & Limit --}}
                        <div class="mb-5">
                            <div class="flex items-center justify-between text-xs font-bold text-slate-600 mb-2">
                                <span>Select Face Value:</span>
                                <span class="text-slate-400 font-semibold text-[11px]">Limit: $10 – $500</span>
                            </div>
                            <div class="grid grid-cols-5 gap-2">
                                @foreach($card['denominations'] as $denom)
                                    <button 
                                        type="button"
                                        @click="setPreset({{ $denom }})"
                                        :class="(!isCustom && selectedDenom === {{ $denom }}) 
                                            ? 'bg-[#1d4ed8] text-white font-bold shadow-xs scale-[1.02]' 
                                            : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                                        class="py-2 rounded-xl text-xs transition-all duration-150 cursor-pointer text-center">
                                        ${{ $denom }}
                                    </button>
                                @endforeach
                                <button 
                                    type="button"
                                    @click="enableCustom()"
                                    :class="isCustom 
                                        ? 'bg-[#1d4ed8] text-white font-bold shadow-xs scale-[1.02]' 
                                        : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                                    class="py-2 rounded-xl text-xs transition-all duration-150 cursor-pointer text-center">
                                    Custom
                                </button>
                            </div>

                            {{-- Custom Amount Input --}}
                            <div x-show="isCustom" x-cloak class="mt-3 flex items-center gap-2 bg-[#eff4ff] border border-blue-300 rounded-xl px-3 py-2 shadow-inner">
                                <span class="text-sm font-bold text-slate-500">$</span>
                                <input 
                                    type="number"
                                    min="10"
                                    max="500"
                                    step="1"
                                    x-model="customInput"
                                    @input="onCustomInput($event.target.value)"
                                    placeholder="Enter $10 - $500"
                                    class="w-full bg-transparent text-sm font-bold text-slate-800 outline-none placeholder:text-slate-400 placeholder:font-normal">
                                <span class="text-xs font-extrabold text-[#1d4ed8] shrink-0" x-text="formatMwk(selectedDenom)"></span>
                            </div>
                        </div>

                        {{-- Quantity --}}
                        <div class="mb-5">
                            <label class="text-xs font-bold text-slate-600 block mb-2">Quantity:</label>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center border border-slate-200 rounded-xl overflow-hidden bg-[#eff4ff]">
                                    <button type="button" @click="if(qty > 1) qty--" class="px-3.5 py-2 text-slate-700 hover:bg-slate-200 font-bold text-sm cursor-pointer">−</button>
                                    <span class="px-4 py-2 text-sm font-extrabold text-[#0b1c30]" x-text="qty"></span>
                                    <button type="button" @click="qty++" class="px-3.5 py-2 text-slate-700 hover:bg-slate-200 font-bold text-sm cursor-pointer">+</button>
                                </div>
                                <span class="text-xs text-slate-400 font-medium">Per unit: <span class="font-bold text-slate-700" x-text="`$${activePrice}`"></span></span>
                            </div>
                        </div>

                        {{-- Price Summary with Live MWK Conversion --}}
                        <div class="bg-[#eff4ff]/80 border border-blue-200/50 rounded-2xl p-4 mb-5">
                            <div class="flex justify-between items-center text-xs text-slate-500 mb-1.5">
                                <span>Original Total:</span>
                                <span class="line-through font-medium" x-text="`$${(selectedDenom * qty).toFixed(2)}`"></span>
                            </div>
                            <div class="flex justify-between items-center text-xs text-emerald-600 mb-1.5">
                                <span>Your Savings ({{ number_format($card['discount_pct'], 0) }}% off):</span>
                                <span class="font-bold" x-text="`- $${(activeSavings * qty).toFixed(2)}`"></span>
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-blue-200/50">
                                <div>
                                    <span class="text-sm font-extrabold text-[#0b1c30]">Total Today:</span>
                                    <span class="block text-[11px] font-bold text-[#1d4ed8]" x-text="'≈ ' + formatMwk(total)"></span>
                                </div>
                                <span class="text-xl font-black text-[#1d4ed8]" x-text="formatCurrency(total)"></span>
                            </div>
                        </div>

                        {{-- Delivery Promise Badge --}}
                        <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200/60 rounded-xl px-3.5 py-2.5 mb-5">
                            <div class="w-7 h-7 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm">bolt</span>
                            </div>
                            <div class="text-xs">
                                <div class="font-bold text-emerald-900">Instant Sub-60s Digital Delivery</div>
                                <div class="text-emerald-700 font-medium">Encrypted voucher key sent to your inbox & dashboard immediately</div>
                            </div>
                        </div>

                        {{-- Buy Now CTA --}}
                        <button 
                            type="button"
                            @click="buyNow({
                                id: '{{ $card['id'] }}',
                                name: '{{ $card['name'] }}',
                                brand: '{{ $card['brand'] }}',
                                denom: selectedDenom,
                                price: parseFloat(activePrice),
                                discount: {{ $card['discount_pct'] }},
                                icon: '{{ $card['icon'] }}',
                                gradient: '{{ $card['gradient'] }}',
                                image: '{{ !empty($card['image']) ? asset($card['image']) : '' }}'
                            })"
                            class="w-full bg-[#1d4ed8] hover:bg-[#0037b0] text-white font-extrabold py-4 rounded-2xl shadow-md text-sm flex items-center justify-center gap-2 transition-all cursor-pointer active:scale-[0.98] mb-3">
                            <span class="material-symbols-outlined text-base">lock</span>
                            <span>Buy Now — Instant Escrow Checkout</span>
                        </button>

                        <button 
                            type="button"
                            @click="addToCart({
                                id: '{{ $card['id'] }}',
                                name: '{{ $card['name'] }}',
                                brand: '{{ $card['brand'] }}',
                                denom: selectedDenom,
                                price: parseFloat(activePrice),
                                discount: {{ $card['discount_pct'] }},
                                icon: '{{ $card['icon'] }}',
                                gradient: '{{ $card['gradient'] }}',
                                image: '{{ !empty($card['image']) ? asset($card['image']) : '' }}'
                            })"
                            class="w-full bg-white hover:bg-slate-50 border border-slate-200 text-slate-800 font-bold py-3 rounded-2xl text-sm flex items-center justify-center gap-2 transition-all cursor-pointer">
                            <span class="material-symbols-outlined text-base">add_shopping_cart</span>
                            Add to Cart
                        </button>

                        {{-- Wishlist --}}
                        <button 
                            type="button"
                            @click="toggleWishlist({ 
                                id: '{{ $card['id'] }}', 
                                name: '{{ $card['name'] }}', 
                                brand: '{{ $card['brand'] }}',
                                price: parseFloat(activePrice),
                                denom: selectedDenom,
                                icon: '{{ $card['icon'] }}',
                                gradient: '{{ $card['gradient'] }}',
                                image: '{{ !empty($card['image']) ? asset($card['image']) : '' }}'
                            })"
                            class="w-full mt-2 text-slate-500 hover:text-rose-600 text-xs font-semibold flex items-center justify-center gap-1.5 py-2 cursor-pointer transition-colors">
                            <span class="material-symbols-outlined text-sm">favorite_border</span>
                            Save to Wishlist
                        </button>
                    </div>

                    {{-- Trust Shield Mini --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-xs">
                        <h4 class="text-xs font-bold text-slate-600 mb-3 uppercase tracking-wider">Protected by Cardic Shield:</h4>
                        <div class="space-y-2.5">
                            <div class="flex items-center gap-2.5 text-xs text-slate-600">
                                <span class="material-symbols-outlined text-emerald-600 text-base">verified_user</span>
                                100% Escrow Balance Warranty
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-600">
                                <span class="material-symbols-outlined text-emerald-600 text-base">lock</span>
                                256-bit SSL End-to-End Encryption
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-600">
                                <span class="material-symbols-outlined text-emerald-600 text-base">support_agent</span>
                                24/7 Priority Resolution Desk
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-600">
                                <span class="material-symbols-outlined text-emerald-600 text-base">bolt</span>
                                Sub-60s Automated Fulfillment Pipeline
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>


