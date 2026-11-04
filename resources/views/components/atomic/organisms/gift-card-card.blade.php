@props(['card'])

<div 
    x-data="{ selectedDenom: {{ $card['default_denomination'] }} }"
    class="group bg-white rounded-2xl p-3 sm:p-4 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between border border-slate-100/90 relative hover:-translate-y-1">
    
    <div>
        {{-- Brand Visual Header: real image when available, gradient fallback --}}
        <div class="relative w-full h-28 sm:h-36 rounded-xl overflow-hidden shadow-sm">
            @if(!empty($card['image']))
                <img
                    src="{{ asset($card['image']) }}"
                    alt="{{ $card['brand'] }}"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            @else
                <div class="w-full h-full bg-gradient-to-tr {{ $card['gradient'] }} flex flex-col justify-between p-4 text-white">
                    {{-- Glow Orb --}}
                    <div class="absolute -right-6 -bottom-6 w-28 h-28 {{ $card['glow_color'] }} rounded-full blur-xl pointer-events-none"></div>
                </div>
            @endif

            {{-- Top Row: Region Code + Wishlist Button (Clean, No Emojis, No Save Badges) --}}
            <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between z-10">
                <span class="bg-black/50 backdrop-blur-md px-2 py-0.5 rounded-full text-[10px] font-extrabold text-white shadow-xs tracking-wider uppercase">
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
                    <div class="text-sm sm:text-base font-extrabold tracking-wide text-white drop-shadow-sm truncate">{{ $card['brand'] }}</div>
                    <div class="text-[10px] text-white/80 font-medium truncate">{{ $card['subtitle'] }}</div>
                </div>
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-black/30 backdrop-blur-sm flex items-center justify-center text-white/90 shrink-0">
                    <span class="material-symbols-outlined text-base sm:text-lg">{{ $card['icon'] }}</span>
                </div>
            </div>
        </div>

        {{-- Product Details --}}
        <div class="mt-3">
            <div class="flex items-center justify-between gap-1">
                <h3 class="text-xs sm:text-sm font-extrabold text-[#0F172A] group-hover:text-[#2563EB] transition-colors line-clamp-1">
                    {{ $card['name'] }}
                </h3>
                <div class="flex items-center gap-0.5 text-amber-500 font-bold text-[11px] shrink-0">
                    <span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span>{{ number_format($card['rating'], 1) }}</span>
                </div>
            </div>

            {{-- Denominations Selection Pills (Clean, No Save Text) --}}
            <div class="mt-2.5">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">
                    Select Value:
                </div>
                <div class="grid grid-cols-4 gap-1 sm:gap-1.5">
                    @foreach($card['denominations'] as $denom)
                        <button 
                            type="button"
                            @click="selectedDenom = {{ $denom }}"
                            :class="selectedDenom === {{ $denom }} 
                                ? 'bg-[#2563EB] text-white font-bold shadow-xs scale-[1.02]' 
                                : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                            class="py-1 rounded-lg text-[10px] sm:text-xs transition-all duration-150 cursor-pointer text-center">
                            ${{ $denom }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Price & Action Trigger (Clean, No Save Text) --}}
    <div class="mt-3 pt-2.5 bg-slate-50/80 p-2.5 sm:p-3 rounded-xl border border-slate-100">
        <div class="flex items-baseline justify-between mb-2">
            <div class="flex items-baseline gap-1">
                <span class="text-base sm:text-xl font-extrabold text-[#0F172A] tracking-tight" x-text="formatCurrency(selectedDenom)">
                    ${{ number_format($card['default_denomination'], 2) }}
                </span>
            </div>
            <span class="text-[10px] font-bold text-emerald-700 flex items-center gap-0.5 bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100">
                <span class="material-symbols-outlined text-xs">bolt</span>
                <span>Instant</span>
            </span>
        </div>

        <div class="flex items-center gap-1.5">
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
                class="flex-1 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-[11px] sm:text-xs py-2 sm:py-2.5 rounded-lg font-bold flex items-center justify-center gap-1 transition-all shadow-xs cursor-pointer active:scale-95">
                <span>Buy Now</span>
                <span class="material-symbols-outlined text-xs sm:text-sm">arrow_forward</span>
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
                class="p-2 sm:p-2.5 rounded-lg bg-white hover:bg-blue-50 text-[#2563EB] border border-blue-200/80 flex items-center justify-center transition-all cursor-pointer shadow-xs active:scale-95"
                title="Add to cart">
                <span class="material-symbols-outlined text-sm sm:text-base">add_shopping_cart</span>
            </button>
        </div>
    </div>
</div>

