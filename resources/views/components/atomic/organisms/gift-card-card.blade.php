@props(['card'])

<div 
    x-data="{ 
        selectedDenom: {{ $card['default_denomination'] }},
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
        }
    }"
    :class="typeof catalogViewMode !== 'undefined' && catalogViewMode === 'list' 
        ? 'flex-col sm:flex-row items-stretch sm:items-center gap-4 sm:gap-5 p-3.5 sm:p-4 w-full' 
        : 'flex-col justify-between p-4 sm:p-4.5 w-full max-w-sm sm:max-w-none mx-auto'"
    class="group bg-white rounded-2xl shadow-xs hover:shadow-xl transition-all duration-300 flex border border-slate-200/80 relative hover:-translate-y-0.5">
    
    {{-- Brand Visual Header --}}
    <div :class="typeof catalogViewMode !== 'undefined' && catalogViewMode === 'list' 
            ? 'w-full sm:w-44 sm:h-32 h-36 shrink-0' 
            : 'w-full h-36 sm:h-40'"
         class="relative rounded-xl overflow-hidden shadow-sm transition-all">
        @if(!empty($card['image']))
            <img
                src="{{ asset($card['image']) }}"
                alt="{{ $card['brand'] }}"
                class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/25 to-transparent"></div>
        @else
            <div class="w-full h-full bg-gradient-to-tr {{ $card['gradient'] }} flex flex-col justify-between p-4 text-white">
                {{-- Glow Orb --}}
                <div class="absolute -right-6 -bottom-6 w-28 h-28 {{ $card['glow_color'] }} rounded-full blur-xl pointer-events-none"></div>
            </div>
        @endif

        {{-- Top Row: Region Code + Wishlist Button (Clean, No Emojis, No Save Badges) --}}
        <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between z-10">
            <span class="bg-black/60 backdrop-blur-md px-2 py-0.5 rounded-full text-[10px] font-extrabold text-white shadow-xs tracking-wider uppercase">
                {{ $card['region_code'] }} Region
            </span>
            <button
                type="button"
                @click.stop="toggleWishlist({ 
                    id: '{{ $card['id'] }}', 
                    name: '{{ $card['name'] }}', 
                    brand: '{{ $card['brand'] }}',
                    price: {{ $card['default_denomination'] }},
                    denom: {{ $card['default_denomination'] }},
                    icon: '{{ $card['icon'] }}',
                    gradient: '{{ $card['gradient'] }}',
                    image: '{{ !empty($card['image']) ? asset($card['image']) : '' }}'
                })"
                class="w-7 h-7 rounded-full bg-black/40 hover:bg-black/60 backdrop-blur-sm flex items-center justify-center text-white transition-colors cursor-pointer"
                title="Wishlist">
                <span class="material-symbols-outlined text-sm" :class="wishlist.some(i => i.id === '{{ $card['id'] }}') ? 'text-rose-500 fill-1' : 'text-white'">
                    favorite
                </span>
            </button>
        </div>

        {{-- Brand name + icon over image bottom --}}
        <div class="absolute bottom-2.5 left-2.5 right-2.5 flex items-end justify-between z-10">
            <div class="min-w-0 pr-1">
                <div class="text-sm sm:text-base font-black tracking-wide text-white drop-shadow-sm truncate">{{ $card['brand'] }}</div>
                <div class="text-[11px] text-white/85 font-medium truncate">{{ $card['subtitle'] }}</div>
            </div>
            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-black/40 backdrop-blur-sm flex items-center justify-center text-white/90 shrink-0">
                <span class="material-symbols-outlined text-base sm:text-lg">{{ $card['icon'] }}</span>
            </div>
        </div>
    </div>

    {{-- Product Details --}}
    <div :class="typeof catalogViewMode !== 'undefined' && catalogViewMode === 'list' 
            ? 'flex-1 min-w-0 sm:py-0.5' 
            : 'mt-3.5'">
        <div class="flex items-center justify-between gap-1">
            <h3 class="text-sm sm:text-base font-extrabold text-[#0F172A] group-hover:text-[#2563EB] transition-colors line-clamp-1">
                {{ $card['name'] }}
            </h3>
            <div class="flex items-center gap-0.5 text-amber-500 font-bold text-xs shrink-0">
                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                <span>{{ number_format($card['rating'], 1) }}</span>
            </div>
        </div>

        {{-- Denominations Selection Pills & Custom Amount --}}
        <div class="mt-2.5">
            <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                <span>Select Value:</span>
                <span class="text-slate-400 font-semibold normal-case text-[11px] sm:text-xs">Limit: $10 – $500</span>
            </div>
            <div class="grid grid-cols-5 gap-1 sm:gap-1.5">
                @foreach($card['denominations'] as $denom)
                    <button 
                        type="button"
                        @click="setPreset({{ $denom }})"
                        :class="(!isCustom && selectedDenom === {{ $denom }}) 
                            ? 'bg-[#2563EB] text-white font-extrabold shadow-sm scale-[1.02]' 
                            : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-bold'"
                        class="py-1.5 sm:py-2 px-1 rounded-lg text-xs font-bold transition-all duration-150 cursor-pointer text-center">
                        ${{ $denom }}
                    </button>
                @endforeach
                <button 
                    type="button"
                    @click="enableCustom()"
                    :class="isCustom 
                        ? 'bg-[#2563EB] text-white font-extrabold shadow-sm scale-[1.02]' 
                        : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-bold'"
                    class="py-1.5 sm:py-2 px-1 rounded-lg text-xs font-bold transition-all duration-150 cursor-pointer text-center">
                    Custom
                </button>
            </div>

            {{-- Custom Amount Input ($10 - $500) --}}
            <div x-show="isCustom" x-cloak class="mt-2 flex items-center gap-2 bg-slate-50 border border-blue-300 rounded-lg px-3 py-1.5 shadow-inner">
                <span class="text-xs sm:text-sm font-bold text-slate-500">$</span>
                <input 
                    type="number"
                    min="10"
                    max="500"
                    step="1"
                    x-model="customInput"
                    @input="onCustomInput($event.target.value)"
                    placeholder="Enter 10 - 500"
                    class="w-full bg-transparent text-xs sm:text-sm font-bold text-slate-800 outline-none placeholder:text-slate-400 placeholder:font-normal">
                <span class="text-xs font-bold text-[#2563EB] shrink-0" x-text="formatMwk(selectedDenom)"></span>
            </div>
        </div>
    </div>

    {{-- Price & Live MWK Conversion (Instant badge removed) --}}
    <div :class="typeof catalogViewMode !== 'undefined' && catalogViewMode === 'list' 
            ? 'sm:w-60 sm:shrink-0 sm:border-l sm:border-slate-100 sm:pl-4 sm:flex sm:flex-col sm:justify-center p-3 sm:p-0 bg-slate-50/90 sm:bg-transparent rounded-xl border border-slate-100 sm:border-0 mt-2 sm:mt-0' 
            : 'mt-3.5 pt-2.5 bg-slate-50/90 p-3 sm:p-3.5 rounded-xl border border-slate-100'">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-baseline gap-1.5 flex-wrap">
                <span class="text-base sm:text-lg font-black text-[#0F172A] tracking-tight" x-text="formatCurrency(selectedDenom)">
                    ${{ number_format($card['default_denomination'], 2) }}
                </span>
                <span class="text-[11px] sm:text-xs font-bold text-[#2563EB]" x-show="currentCurrency !== 'MWK'" x-text="'(≈ ' + formatMwk(selectedDenom) + ')'"></span>
            </div>
            <span class="text-[10px] sm:text-xs text-slate-400 font-bold uppercase tracking-wider">Verified Stock</span>
        </div>

        <div class="flex items-center gap-1.5 sm:gap-2">
            {{-- Buy Now --}}
            <button 
                type="button"
                @click="buyNow({
                    id: '{{ $card['id'] }}',
                    name: '{{ $card['name'] }}',
                    brand: '{{ $card['brand'] }}',
                    denom: selectedDenom,
                    price: parseFloat(selectedDenom),
                    discount: 0,
                    icon: '{{ $card['icon'] }}',
                    gradient: '{{ $card['gradient'] }}',
                    image: '{{ !empty($card['image']) ? asset($card['image']) : '' }}'
                })"
                class="flex-1 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs sm:text-sm py-2.5 px-3 rounded-lg font-bold flex items-center justify-center gap-1 transition-all shadow-xs cursor-pointer active:scale-95">
                <span>Buy Now</span>
                <span class="material-symbols-outlined text-sm sm:text-base">arrow_forward</span>
            </button>

            {{-- Add To Cart button --}}
            <button 
                type="button"
                aria-label="Add to cart"
                @click="addToCart({
                    id: '{{ $card['id'] }}',
                    name: '{{ $card['name'] }}',
                    brand: '{{ $card['brand'] }}',
                    denom: selectedDenom,
                    price: parseFloat(selectedDenom),
                    discount: 0,
                    icon: '{{ $card['icon'] }}',
                    gradient: '{{ $card['gradient'] }}',
                    image: '{{ !empty($card['image']) ? asset($card['image']) : '' }}'
                })"
                class="p-2.5 rounded-lg bg-white hover:bg-blue-50 text-[#2563EB] border border-blue-200 flex items-center justify-center transition-all cursor-pointer shadow-xs active:scale-95 shrink-0"
                title="Add to cart">
                <span class="material-symbols-outlined text-base">add_shopping_cart</span>
            </button>
        </div>
    </div>
</div>
