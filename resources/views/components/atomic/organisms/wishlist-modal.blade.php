<div 
    x-show="openWishlist" 
    class="fixed inset-0 z-50 overflow-hidden" 
    style="display: none;"
    x-transition>
    
    <div 
        @click="openWishlist = false" 
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs transition-opacity">
    </div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <div class="w-screen max-w-md bg-white shadow-2xl flex flex-col justify-between">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-rose-50/40">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-rose-500 text-2xl">favorite</span>
                    <div>
                        <h2 class="text-lg font-extrabold text-[#0b1c30]">Your Saved Cards</h2>
                        <p class="text-xs text-slate-500" x-text="`${wishlist.length} saved gift cards`"></p>
                    </div>
                </div>
                <button 
                    type="button" 
                    @click="openWishlist = false" 
                    class="p-2 text-slate-400 hover:text-slate-700 rounded-xl hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-3">
                <template x-if="wishlist.length === 0">
                    <div class="py-16 text-center flex flex-col items-center">
                        <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-3xl">favorite_border</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-800">Your wishlist is empty</h3>
                        <p class="text-xs text-slate-500 max-w-xs mt-1">Click the heart icon on any gift card to track deals and price drops.</p>
                    </div>
                </template>

                <template x-for="item in wishlist" :key="item.id">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
                        <div class="flex items-center gap-3 mb-3">
                            <template x-if="item.image">
                                <img :src="item.image" :alt="item.name" class="w-10 h-10 rounded-xl object-cover shrink-0 shadow-xs border border-slate-200">
                            </template>
                            <template x-if="!item.image">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 shadow-xs text-white"
                                     :class="item.gradient ?? 'from-blue-500 to-blue-600 bg-gradient-to-tr'">
                                    <span class="material-symbols-outlined text-lg" x-text="item.icon ?? 'card_giftcard'"></span>
                                </div>
                            </template>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs font-bold text-slate-900 truncate" x-text="item.name"></h4>
                                <span class="text-[10px] text-slate-400 uppercase font-semibold" x-text="item.brand"></span>
                            </div>
                            <span class="text-xs font-extrabold text-[#2563EB]" x-text="formatCurrency(item.price)"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                @click="addToCart(item)"
                                class="flex-1 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-[11px] font-bold py-2 rounded-xl transition-colors cursor-pointer">
                                Add to Cart
                            </button>
                            <button
                                type="button"
                                @click="toggleWishlist(item)"
                                class="w-8 h-8 rounded-xl border border-rose-200 bg-rose-50 hover:bg-rose-100 text-rose-500 flex items-center justify-center transition-colors cursor-pointer"
                                title="Remove from wishlist">
                                <span class="material-symbols-outlined text-sm">favorite</span>
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <div class="p-6 bg-slate-50 border-t border-slate-200 space-y-2.5">
                <a href="{{ route('cart') }}"
                   class="block w-full bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-bold py-2.5 rounded-xl text-xs text-center transition-colors">
                    View Cart
                </a>
                <button
                    type="button"
                    @click="openWishlist = false"
                    class="w-full border border-slate-200 bg-white text-slate-600 font-bold py-2.5 rounded-xl text-xs hover:bg-slate-50 transition-colors cursor-pointer">
                    Continue Shopping
                </button>
            </div>
        </div>
    </div>
</div>

