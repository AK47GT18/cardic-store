<div 
    x-show="cartOpen" 
    class="fixed inset-0 z-50 overflow-hidden" 
    style="display: none;"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    
    {{-- Backdrop --}}
    <div 
        @click="cartOpen = false" 
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs transition-opacity">
    </div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <div 
            x-show="cartOpen"
            x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="w-screen max-w-md bg-white shadow-2xl flex flex-col justify-between">
            
            {{-- Header --}}
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-[#eff4ff]/40">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#1d4ed8] text-2xl">shopping_bag</span>
                    <div>
                        <h2 class="text-lg font-extrabold text-[#0b1c30]">Your Cart</h2>
                        <p class="text-xs text-slate-500" x-text="`${cartTotalCount} items ready for instant escrow delivery`"></p>
                    </div>
                </div>
                <button 
                    type="button" 
                    @click="cartOpen = false" 
                    class="p-2 text-slate-400 hover:text-slate-700 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            {{-- Cart Items Area --}}
            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <template x-if="cart.length === 0">
                    <div class="py-16 text-center flex flex-col items-center">
                        <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#1d4ed8] flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-3xl">shopping_bag</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-800">Your cart is empty</h3>
                        <p class="text-xs text-slate-500 max-w-xs mt-1">Browse our verified digital cards to claim instant discounts under 60 seconds.</p>
                        <button 
                            type="button" 
                            @click="cartOpen = false" 
                            class="mt-5 bg-[#1d4ed8] text-white text-xs font-bold px-4 py-2.5 rounded-xl hover:bg-[#0037b0] transition-colors">
                            Explore Marketplace
                        </button>
                    </div>
                </template>

                <template x-for="(item, index) in cart" :key="item.cartId">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs flex items-center gap-3.5 relative">
                        {{-- Image / Icon badge --}}
                        <template x-if="item.image">
                            <img :src="item.image" :alt="item.name" class="w-12 h-12 rounded-xl object-cover shrink-0 shadow-xs border border-slate-200">
                        </template>
                        <template x-if="!item.image">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr text-white flex items-center justify-center shrink-0 shadow-xs"
                                 :class="item.gradient">
                                <span class="material-symbols-outlined text-xl" x-text="item.icon"></span>
                            </div>
                        </template>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-bold text-slate-900 truncate" x-text="item.name"></h4>
                            <div class="flex items-center gap-2 mt-0.5">
                                <span class="text-xs font-extrabold text-[#1d4ed8]" x-text="formatCurrency(item.price)"></span>
                            </div>

                            {{-- Quantity adjuster --}}
                            <div class="flex items-center gap-2 mt-2">
                                <div class="flex items-center border border-slate-200 rounded-lg overflow-hidden bg-slate-50">
                                    <button 
                                        type="button" 
                                        @click="updateQuantity(item.cartId, -1)" 
                                        class="px-2 py-0.5 text-slate-600 hover:bg-slate-200 text-xs font-bold cursor-pointer">
                                        -
                                    </button>
                                    <span class="px-2 text-xs font-bold text-slate-800" x-text="item.quantity"></span>
                                    <button 
                                        type="button" 
                                        @click="updateQuantity(item.cartId, 1)" 
                                        class="px-2 py-0.5 text-slate-600 hover:bg-slate-200 text-xs font-bold cursor-pointer">
                                        +
                                    </button>
                                </div>

                                <button 
                                    type="button" 
                                    @click="removeFromCart(item.cartId)" 
                                    class="text-[11px] text-rose-500 hover:text-rose-700 font-medium ml-auto cursor-pointer">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Checkout Footer --}}
            <template x-if="cart.length > 0">
                <div class="p-6 bg-slate-50 border-t border-slate-200/80 space-y-4">
                    {{-- Delivery guarantee banner --}}
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-emerald-50 text-emerald-800 text-xs border border-emerald-200/60">
                        <span class="material-symbols-outlined text-emerald-600 text-base">bolt</span>
                        <span class="font-medium">Sub-60s Delivery: <strong>Instant Email & Encrypted Keys</strong></span>
                    </div>

                    {{-- Customer Email --}}
                    <div>
                        <label class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block mb-1">Fulfillment Email:</label>
                        <input 
                            type="email" 
                            x-model="checkoutEmail" 
                            placeholder="your.email@example.com" 
                            class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-800 outline-none focus:ring-2 focus:ring-blue-600/30">
                    </div>

                    {{-- Summary lines --}}
                    <div class="space-y-1.5 text-xs">
                        <div class="flex justify-between text-slate-500">
                            <span>Subtotal</span>
                            <span class="font-semibold text-slate-700" x-text="formatCurrency(cartSubtotal)"></span>
                        </div>
                        <div class="flex justify-between text-emerald-600">
                            <span>Total Savings</span>
                            <span class="font-bold" x-text="`- ${formatCurrency(cartTotalSavings)}`"></span>
                        </div>
                        <div class="flex justify-between text-sm font-extrabold text-[#0b1c30] pt-2 border-t border-slate-200">
                            <span>Total Amount</span>
                            <span x-text="formatCurrency(cartSubtotal)"></span>
                        </div>
                    </div>

                    {{-- Checkout CTA --}}
                    <button 
                        type="button" 
                        @click="triggerCheckout()"
                        :disabled="isCheckingOut"
                        class="w-full bg-[#1d4ed8] hover:bg-[#0037b0] text-white font-bold py-3 rounded-xl shadow-md text-sm flex items-center justify-center gap-2 transition-all cursor-pointer disabled:opacity-50">
                        <span x-show="!isCheckingOut">Complete Escrow Checkout</span>
                        <span x-show="isCheckingOut">Securing Escrow Vault...</span>
                        <span class="material-symbols-outlined text-base">lock</span>
                    </button>
                    {{-- View full cart link --}}
                    <a href="{{ route('cart') }}"
                       class="block w-full text-center text-xs font-semibold text-slate-500 hover:text-[#2563EB] transition-colors py-1">
                        View Full Cart
                    </a>
                </div>
            </template>
        </div>
    </div>
</div>

