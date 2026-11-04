<x-layouts.app title="Wishlist — Cardic Store">

    <div class="bg-[#F8FAFC] text-[#0F172A] min-h-screen pt-28 sm:pt-32">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">

            {{-- ── Blended Breadcrumbs & Heading ── --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 sm:mb-8">
                <div>
                    <nav class="flex items-center gap-1.5 text-xs text-slate-500 mb-2">
                        <a href="{{ route('home') }}" class="hover:text-[#2563EB] transition-colors flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">home</span>
                            <span>Home</span>
                        </a>
                        <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                        <span class="text-[#06111E] font-semibold">Wishlist</span>
                    </nav>
                    <h1 class="font-headline font-black text-2xl sm:text-4xl text-[#06111E] tracking-tight">Wishlist</h1>
                </div>
                <template x-if="wishlist.length > 0">
                    <div class="flex items-center gap-3">
                        <button
                            type="button"
                            @click="wishlist.forEach(i => addToCart(i)); showToast('All wishlist items added to cart!', 'shopping_bag')"
                            class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-bold text-xs sm:text-sm px-5 py-2.5 rounded-full shadow-sm transition-all active:scale-95 cursor-pointer">
                            <span class="material-symbols-outlined text-sm">shopping_bag</span>
                            <span>Add All to Cart</span>
                        </button>
                        <button
                            type="button"
                            @click="wishlist = []; localStorage.removeItem('cardic_wishlist'); showToast('Wishlist cleared', 'delete')"
                            class="inline-flex items-center gap-1.5 border border-slate-200 bg-white hover:bg-slate-50 text-slate-600 font-bold text-xs sm:text-sm px-4 py-2.5 rounded-full transition-all cursor-pointer">
                            <span class="material-symbols-outlined text-sm text-slate-400">delete</span>
                            <span>Clear</span>
                        </button>
                    </div>
                </template>
            </div>

            {{-- ── EMPTY STATE (Alpine-driven) ── --}}
            <template x-if="wishlist.length === 0">
                <div class="flex flex-col items-center justify-center py-24 text-center">
                    <div class="w-20 h-20 bg-rose-50 rounded-2xl flex items-center justify-center mb-5 shadow-xs">
                        <span class="material-symbols-outlined text-4xl text-rose-500">favorite_border</span>
                    </div>
                    <h2 class="font-headline font-black text-xl sm:text-2xl text-[#06111E]">Your wishlist is empty</h2>
                    <p class="text-sm text-slate-500 mt-2 max-w-sm leading-relaxed">Save gift cards you are interested in tracking. Move them to your cart with one click when you are ready.</p>
                    <a href="{{ route('marketplace') }}"
                       class="mt-6 inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-bold text-sm px-6 py-3 rounded-full shadow-md transition-all active:scale-95">
                        <span class="material-symbols-outlined text-sm">storefront</span>
                        Explore Marketplace
                    </a>
                </div>
            </template>

            {{-- ── WISHLIST ITEMS ── --}}
            <template x-if="wishlist.length > 0">
                <div class="space-y-4">

                    {{-- Table Header (desktop only, blends seamlessly into #F8FAFC) --}}
                    <div class="hidden sm:grid grid-cols-12 gap-4 px-5 py-2 text-[11px] font-bold uppercase tracking-widest text-slate-400">
                        <div class="col-span-6">Card / Brand</div>
                        <div class="col-span-3 text-center">Starting Price</div>
                        <div class="col-span-3 text-right">Actions</div>
                    </div>

                    {{-- Wishlist Cards --}}
                    <div class="space-y-3">
                        <template x-for="item in wishlist" :key="item.id">
                            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-4 sm:p-5">
                                <div class="grid grid-cols-12 gap-4 items-center">

                                    {{-- Product Info --}}
                                    <div class="col-span-12 sm:col-span-6 flex items-center gap-4">
                                        <template x-if="item.image">
                                            <img :src="item.image" :alt="item.name" class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl object-cover shrink-0 shadow-sm border border-slate-200">
                                        </template>
                                        <template x-if="!item.image">
                                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl flex items-center justify-center shrink-0 shadow-sm text-white"
                                                 :class="item.gradient ?? 'from-blue-500 to-blue-600 bg-gradient-to-tr'">
                                                <span class="material-symbols-outlined text-2xl sm:text-3xl" x-text="item.icon ?? 'card_giftcard'"></span>
                                            </div>
                                        </template>
                                        <div class="min-w-0">
                                            <h3 class="text-sm sm:text-base font-bold text-[#06111E] truncate" x-text="item.name"></h3>
                                            <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider block mt-0.5" x-text="item.brand"></span>
                                            <span class="inline-flex items-center gap-1 text-[11px] text-emerald-600 font-bold mt-1 bg-emerald-50 px-2 py-0.5 rounded-md">
                                                <span class="material-symbols-outlined text-xs">verified</span>
                                                Pre-verified Balance
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Price --}}
                                    <div class="col-span-6 sm:col-span-3 text-left sm:text-center">
                                        <span class="text-base sm:text-lg font-black text-[#2563EB]" x-text="formatCurrency(item.price)"></span>
                                        <span class="block text-[11px] text-slate-400">Starting Denomination</span>
                                    </div>

                                    {{-- Actions --}}
                                    <div class="col-span-6 sm:col-span-3 flex items-center justify-end gap-2.5">
                                        <button
                                            type="button"
                                            @click="addToCart(item)"
                                            class="inline-flex items-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-xs active:scale-95 cursor-pointer">
                                            <span class="material-symbols-outlined text-sm">shopping_bag</span>
                                            <span class="hidden md:inline">Add to Cart</span>
                                            <span class="md:hidden">Cart</span>
                                        </button>
                                        <button
                                            type="button"
                                            @click="toggleWishlist(item)"
                                            class="w-9 h-9 rounded-xl border border-slate-200 text-slate-400 hover:text-rose-500 hover:border-rose-200 hover:bg-rose-50 flex items-center justify-center transition-colors cursor-pointer"
                                            title="Remove from wishlist">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </template>
                    </div>

                    {{-- Bottom Action Row --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                        <a href="{{ route('marketplace') }}"
                           class="inline-flex items-center gap-2 border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-bold text-xs sm:text-sm px-6 py-3 rounded-full transition-all shadow-xs">
                            <span class="material-symbols-outlined text-sm">arrow_back</span>
                            Continue Shopping
                        </a>
                        <a href="{{ route('cart') }}"
                           class="inline-flex items-center gap-2 bg-[#06111E] hover:bg-[#0F172A] text-white font-bold text-xs sm:text-sm px-6 py-3 rounded-full transition-all shadow-md">
                            <span>Proceed to Cart</span>
                            <span class="material-symbols-outlined text-sm">shopping_bag</span>
                        </a>
                    </div>

                </div>
            </template>

        </div>

    </div>

</x-layouts.app>
