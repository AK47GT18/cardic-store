<x-layouts.app title="Cardic Store — International Gift Card Marketplace">

    {{-- Main Marketplace Catalog Container --}}
    <main class="w-full bg-[#f8f9ff] min-h-screen pt-28 sm:pt-32">
        <div class="relative w-full overflow-hidden">
            {{-- Ambient Decorative Glow Elements --}}
            <div class="absolute -top-32 right-1/4 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute top-80 -left-20 w-80 h-80 bg-emerald-400/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-8 py-6 sm:py-8">
                {{-- Breadcrumbs & Meta bar --}}
                <nav class="flex items-center gap-1.5 text-xs text-slate-500 mb-5">
                    <a href="{{ route('home') }}" class="hover:text-[#2563EB] transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">home</span>
                        <span>Home</span>
                    </a>
                    <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                    <a href="{{ route('marketplace') }}" class="hover:text-[#2563EB] transition-colors font-semibold">Gift Cards</a>
                    <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                    <span class="text-[#0F172A] font-bold" x-text="selectedCategory === 'all' ? 'All Categories' : selectedCategory">All Categories</span>
                    <span class="ml-2 bg-blue-50 text-[#2563EB] border border-blue-200/60 text-[10px] px-2.5 py-0.5 rounded-full font-bold">
                        524 Available
                    </span>
                </nav>

                {{-- Clean Catalog Header Banner --}}
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-4xl font-headline font-black text-[#0F172A] tracking-tight">
                        Explore Digital Gift Cards
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-600 mt-2 max-w-2xl leading-relaxed">
                        Pre-verified codes delivered in under 60 seconds with instant escrow protection, zero foreign transaction markup, and 100% active balance guarantee.
                    </p>
                </div>

                {{-- Search, Filter Chips & Sort Controls Control Center --}}
                <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-xs border border-slate-100 mb-8 flex flex-col gap-4">
                    <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                        {{-- Live Catalog Search Field --}}
                        <div class="relative flex-1">
                            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                            <input 
                                type="text"
                                x-model="searchQuery"
                                @input.debounce.250ms="applyFilter()"
                                placeholder="Filter by brand name, console, subscription, or merchant..."
                                class="w-full bg-[#eff4ff] text-[#0b1c30] placeholder:text-slate-400 rounded-xl pl-10 pr-4 py-2.5 text-xs sm:text-sm outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20 border border-slate-200/50 transition-all font-medium">
                        </div>

                        {{-- Quick Sort & Mode Switchers --}}
                        <div class="flex items-center gap-3 shrink-0 flex-wrap">
                            <div class="flex items-center bg-[#eff4ff] rounded-xl px-3 py-1.5 gap-2 border border-slate-200/50">
                                <span class="material-symbols-outlined text-slate-500 text-base">swap_vert</span>
                                <span class="text-[11px] text-slate-500 uppercase font-bold">Sort:</span>
                                <select 
                                    x-model="sortOrder"
                                    @change="applyFilter()"
                                    class="bg-transparent text-[#0b1c30] text-xs font-bold outline-none cursor-pointer pr-1">
                                    <option value="popular">Most Popular</option>
                                    <option value="discount">Highest Discount %</option>
                                    <option value="price_asc">Price: Low to High</option>
                                    <option value="alphabetical">Alphabetical A-Z</option>
                                </select>
                            </div>

                            {{-- Grid / List Layout Switcher --}}
                            <div class="flex items-center bg-[#eff4ff] p-1 rounded-xl border border-slate-200/50">
                                <button type="button" aria-label="Grid View" class="p-1.5 rounded-lg bg-white text-[#1d4ed8] shadow-xs flex items-center justify-center">
                                    <span class="material-symbols-outlined text-base">grid_view</span>
                                </button>
                                <button type="button" aria-label="List View" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-base">view_list</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Active Filter Tokens / Tags --}}
                    <div class="flex items-center gap-2 flex-wrap pt-2 border-t border-slate-100 text-xs">
                        <span class="text-[11px] text-slate-400 uppercase font-bold mr-1">Active Filters:</span>
                        
                        <x-atomic.molecules.active-filter-token label="Delivery" value="Instant (<60s)" type="delivery" />
                        <x-atomic.molecules.active-filter-token label="Escrow" value="Verified Offers" type="escrow" />
                        
                        <template x-if="selectedCategory !== 'all'">
                            <span class="inline-flex items-center gap-1.5 bg-blue-50 text-[#0037b0] px-3 py-1 rounded-full text-xs font-semibold">
                                <span>Category: <strong x-text="selectedCategory"></strong></span>
                                <button type="button" @click="clearFilter('category')" class="hover:text-red-600">
                                    <span class="material-symbols-outlined text-xs leading-none">close</span>
                                </button>
                            </span>
                        </template>

                        <template x-if="selectedRegion !== 'all'">
                            <span class="inline-flex items-center gap-1.5 bg-blue-50 text-[#0037b0] px-3 py-1 rounded-full text-xs font-semibold">
                                <span>Region: <strong x-text="selectedRegion"></strong></span>
                                <button type="button" @click="clearFilter('region')" class="hover:text-red-600">
                                    <span class="material-symbols-outlined text-xs leading-none">close</span>
                                </button>
                            </span>
                        </template>

                        <template x-if="searchQuery">
                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-900 px-3 py-1 rounded-full text-xs font-semibold">
                                <span>Search: "<strong x-text="searchQuery"></strong>"</span>
                                <button type="button" @click="clearFilter('search')" class="hover:text-red-600">
                                    <span class="material-symbols-outlined text-xs leading-none">close</span>
                                </button>
                            </span>
                        </template>

                        <button 
                            type="button" 
                            @click="resetFilters()"
                            class="text-xs text-[#1d4ed8] hover:underline font-bold ml-2 cursor-pointer">
                            Clear All
                        </button>
                    </div>
                </div>

                {{-- Main Marketplace Body (2 Columns Layout) --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    {{-- Left Sidebar Filters (Collapsible on mobile, sticky on desktop) --}}
                    <div class="lg:col-span-3 lg:sticky lg:top-24">
                        {{-- Mobile Filter Drawer Toggle --}}
                        <div class="lg:hidden" x-data="{ mobileFiltersOpen: false }">
                            <button
                                type="button"
                                @click="mobileFiltersOpen = !mobileFiltersOpen"
                                class="w-full flex items-center justify-between bg-white px-4 py-3 rounded-2xl shadow-xs border border-slate-200 text-xs font-bold text-[#0F172A] mb-4">
                                <span class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base text-[#2563EB]">tune</span>
                                    <span>Filter &amp; Refine Cards</span>
                                </span>
                                <span class="material-symbols-outlined text-sm" x-text="mobileFiltersOpen ? 'expand_less' : 'expand_more'">expand_more</span>
                            </button>
                            <div x-show="mobileFiltersOpen" x-transition class="mb-6">
                                <x-atomic.organisms.sidebar-filters 
                                    :categories="$categories" 
                                    :regions="$regions" />
                            </div>
                        </div>

                        {{-- Desktop Filters --}}
                        <div class="hidden lg:block">
                            <x-atomic.organisms.sidebar-filters 
                                :categories="$categories" 
                                :regions="$regions" />
                        </div>
                    </div>

                    {{-- Right Main Catalog Results Area (9 Cols on 12-grid) --}}
                    <div class="lg:col-span-9 flex flex-col gap-6">
                        {{-- Catalog Quick Stats Bar --}}
                        <div class="flex items-center justify-between text-xs text-slate-500 font-medium">
                            <span class="text-slate-700">
                                Showing <span class="text-[#1d4ed8] font-bold">1 – {{ count($cards) }}</span> of 524 gift cards
                            </span>
                            <span class="hidden sm:inline text-[11px] text-slate-400">
                                Updated in real-time with verified liquidity pool
                            </span>
                        </div>

                        {{-- Cards Grid (2 Columns on mobile, 2 on md, 3 on xl) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 max-w-sm sm:max-w-none mx-auto" id="cardsGrid">
                            @foreach($cards as $card)
                                <div 
                                    data-card-item
                                    data-id="{{ $card['id'] }}"
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

                        {{-- Pagination Bar --}}
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 bg-white p-4 rounded-2xl shadow-xs border border-slate-100">
                            <div class="text-xs text-slate-500">
                                Page <span class="font-bold text-slate-800">1</span> of 58
                            </div>
                            <div class="flex items-center gap-1.5">
                                <button type="button" aria-label="Previous Page" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-500 hover:text-slate-800 hover:bg-slate-200 transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                                </button>
                                <button type="button" class="w-9 h-9 rounded-xl bg-[#1d4ed8] text-white text-xs font-bold flex items-center justify-center shadow-xs">
                                    1
                                </button>
                                <button type="button" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200 text-xs font-semibold flex items-center justify-center transition-colors">
                                    2
                                </button>
                                <button type="button" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200 text-xs font-semibold flex items-center justify-center transition-colors">
                                    3
                                </button>
                                <span class="px-1 text-slate-300 font-bold">...</span>
                                <button type="button" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200 text-xs font-semibold flex items-center justify-center transition-colors">
                                    58
                                </button>
                                <button type="button" aria-label="Next Page" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-500 hover:text-slate-800 hover:bg-slate-200 transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                                </button>
                            </div>
                        </div>

                        {{-- Inline Brand Request Helper Banner --}}
                        <div class="bg-[#eff4ff] rounded-2xl p-6 border border-blue-200/60 flex flex-col md:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-blue-100 text-[#1d4ed8] flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-2xl">contact_support</span>
                                </div>
                                <div>
                                    <div class="text-sm sm:text-base font-extrabold text-[#0b1c30]">Can't find a specific brand or denomination?</div>
                                    <div class="text-xs text-slate-500 mt-0.5">We stock custom regional codes within 2 hours upon customer request.</div>
                                </div>
                            </div>
                            <a href="{{ route('corporate') }}" class="shrink-0 bg-white text-[#0037b0] hover:bg-blue-50 text-xs px-4 py-2.5 rounded-xl font-bold transition-all shadow-xs border border-blue-200/80">
                                Request a Gift Card
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</x-layouts.app>



