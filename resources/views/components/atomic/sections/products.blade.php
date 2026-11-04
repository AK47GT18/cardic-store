{{-- ============================================================
     SECTION 4: 3-PHOTO CARD SHOWCASE & VERIFIED GIFT CARDS (Matching Reference Section 4)
     "Transform Your Home's A Powerful Of The Force"
     3 Vertical Photography Cards with overlay icons & titles + Products Catalog
     ============================================================ --}}
@props(['cards' => []])

<section id="products" class="bg-white py-20 sm:py-24 border-b border-slate-100 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        {{-- Centered Header (Matches Reference "Transform Your Home's A Powerful Of The Force") --}}
        <div class="text-center max-w-2xl mx-auto mb-16">
            <div class="text-xs font-bold uppercase tracking-wider text-[#2563EB] mb-2">
                Curated Liquidity Pools
            </div>
            <h2 class="font-headline font-extrabold text-3xl sm:text-4xl text-[#0F172A] tracking-tight leading-tight">
                Transform your digital spending<br>with verified cards.
            </h2>
        </div>

        {{-- 3 Vertical Photography Pillar Cards (Directly matching the 3 tall cards in the reference image) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 mb-20">

            {{-- Pillar 1: Gaming & Digital Codes --}}
            <div class="relative h-[360px] rounded-3xl overflow-hidden shadow-md group cursor-pointer">
                <img 
                    src="{{ asset('images/gaming.jpg') }}" 
                    alt="Gaming gift cards" 
                    class="w-full h-full object-cover brightness-[0.55] group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#091524] via-transparent to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-md flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-lg">sports_esports</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-lg text-white">Gaming & Entertainment</h3>
                    <p class="text-xs text-slate-300 mt-1">Steam, PlayStation, Xbox, Roblox, and Nintendo cards with instant cryptographic delivery.</p>
                </div>
            </div>

            {{-- Pillar 2: Retail & Shopping --}}
            <div class="relative h-[360px] rounded-3xl overflow-hidden shadow-md group cursor-pointer">
                <img 
                    src="{{ asset('images/retail.jpg') }}" 
                    alt="Retail shopping cards" 
                    class="w-full h-full object-cover brightness-[0.55] group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#091524] via-transparent to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-md flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-lg">shopping_cart</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-lg text-white">Retail & Daily Shopping</h3>
                    <p class="text-xs text-slate-300 mt-1">Amazon, Apple Store, Walmart, Target, and Uber vouchers with up to 10% instant savings.</p>
                </div>
            </div>

            {{-- Pillar 3: Streaming & Cloud Services --}}
            <div class="relative h-[360px] rounded-3xl overflow-hidden shadow-md group cursor-pointer">
                <img 
                    src="{{ asset('images/stream.jpg') }}" 
                    alt="Streaming and tech cards" 
                    class="w-full h-full object-cover brightness-[0.55] group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#091524] via-transparent to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-md flex items-center justify-center mb-3">
                        <span class="material-symbols-outlined text-lg">tv</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-lg text-white">Streaming & Cloud</h3>
                    <p class="text-xs text-slate-300 mt-1">Netflix, Spotify, Airbnb, and Google Play prepaid codes backed by 100% balance warranty.</p>
                </div>
            </div>

        </div>

        {{-- Catalog Section Filter Bar --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 pt-10 border-t border-slate-100">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#2563EB]">Live Inventory</span>
                <h3 class="font-headline font-extrabold text-2xl sm:text-3xl text-[#0F172A] tracking-tight mt-1">
                    Featured Gift Cards
                </h3>
            </div>

            {{-- Filter Pills --}}
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 text-xs font-bold">
                <button
                    type="button"
                    @click="selectedCategory = 'all'; applyFilter()"
                    :class="selectedCategory === 'all' ? 'bg-[#0F172A] text-white shadow-xs' : 'bg-[#F1F5F9] hover:bg-slate-200 text-slate-700'"
                    class="px-4 py-2 rounded-full transition-colors cursor-pointer whitespace-nowrap">
                    All Brands
                </button>
                <button
                    type="button"
                    @click="selectedCategory = 'gaming'; applyFilter()"
                    :class="selectedCategory === 'gaming' ? 'bg-[#0F172A] text-white shadow-xs' : 'bg-[#F1F5F9] hover:bg-slate-200 text-slate-700'"
                    class="px-4 py-2 rounded-full transition-colors cursor-pointer whitespace-nowrap">
                    Gaming
                </button>
                <button
                    type="button"
                    @click="selectedCategory = 'shopping'; applyFilter()"
                    :class="selectedCategory === 'shopping' ? 'bg-[#0F172A] text-white shadow-xs' : 'bg-[#F1F5F9] hover:bg-slate-200 text-slate-700'"
                    class="px-4 py-2 rounded-full transition-colors cursor-pointer whitespace-nowrap">
                    Retail
                </button>
                <button
                    type="button"
                    @click="selectedCategory = 'entertainment'; applyFilter()"
                    :class="selectedCategory === 'entertainment' ? 'bg-[#0F172A] text-white shadow-xs' : 'bg-[#F1F5F9] hover:bg-slate-200 text-slate-700'"
                    class="px-4 py-2 rounded-full transition-colors cursor-pointer whitespace-nowrap">
                    Streaming
                </button>
            </div>
        </div>

        {{-- Cards Grid (2 cols on mobile, 2 on md, 3 on lg) --}}
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 lg:gap-8">
            @foreach(array_slice($cards, 0, 9) as $card)
                <div
                    data-card-item
                    data-name="{{ $card['name'] }}"
                    data-brand="{{ $card['brand'] }}"
                    data-category="{{ $card['category_id'] }}"
                    data-region="{{ $card['region_scope'] }}"
                    data-discount="{{ $card['discount_pct'] }}"
                    data-rating="{{ $card['rating'] }}">
                    <x-atomic.organisms.gift-card-card :card="$card" />
                </div>
            @endforeach
        </div>

        {{-- Marketplace CTA --}}
        <div class="mt-12 text-center">
            <a href="{{ route('marketplace') }}"
               class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-extrabold text-xs sm:text-sm px-8 py-3.5 rounded-full shadow-lg shadow-blue-500/20 transition-all">
                <span>View Full Catalog of 500+ Cards</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>

    </div>
</section>
