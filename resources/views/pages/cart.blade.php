<x-layouts.app title="Shopping Cart — Cardic Store">

    <div class="bg-[#F8FAFC] text-[#0F172A] min-h-screen pt-24 sm:pt-28">

        {{-- ── PAGE HEADER ── --}}
        <div class="bg-white border-b border-slate-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                <h1 class="font-headline font-black text-2xl sm:text-3xl text-[#06111E]">Shopping Cart</h1>
                <nav class="flex items-center gap-1.5 mt-1.5 text-xs text-slate-400 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-[#2563EB] transition-colors">Home</a>
                    <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                    <span class="text-slate-600">Shopping Cart</span>
                </nav>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

            {{-- ── EMPTY STATE (Alpine-driven) ── --}}
            <template x-if="cart.length === 0">
                <div class="flex flex-col items-center justify-center py-24 text-center">
                    <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-5 shadow-sm">
                        <span class="material-symbols-outlined text-4xl text-[#2563EB]">shopping_bag</span>
                    </div>
                    <h2 class="font-headline font-black text-xl sm:text-2xl text-[#06111E]">Your cart is empty</h2>
                    <p class="text-sm text-slate-500 mt-2 max-w-xs leading-relaxed">Browse our verified digital gift cards and claim instant codes under 60 seconds.</p>
                    <a href="{{ route('marketplace') }}"
                       class="mt-6 inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-bold text-sm px-6 py-3 rounded-full shadow-md transition-all active:scale-95">
                        <span class="material-symbols-outlined text-sm">storefront</span>
                        Explore Gift Cards
                    </a>
                </div>
            </template>

            {{-- ── CART CONTENT ── --}}
            <template x-if="cart.length > 0">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    {{-- ── LEFT: Cart Table ── --}}
                    <div class="lg:col-span-8 space-y-4">

                        {{-- Table Header (desktop only) --}}
                        <div class="hidden sm:grid grid-cols-12 gap-4 px-4 py-2.5 text-[11px] font-bold uppercase tracking-widest text-slate-400 border-b border-slate-200 bg-white rounded-t-2xl">
                            <div class="col-span-5">Product</div>
                            <div class="col-span-2 text-center">Price</div>
                            <div class="col-span-3 text-center">Quantity</div>
                            <div class="col-span-2 text-right">Subtotal</div>
                        </div>

                        {{-- Cart Rows --}}
                        <div class="space-y-3">
                            <template x-for="(item, index) in cart" :key="item.cartId">
                                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-4 sm:p-5">
                                    <div class="grid grid-cols-12 gap-3 sm:gap-4 items-center">

                                        {{-- Remove button (mobile: top-right, desktop: col 1) --}}
                                        <div class="hidden sm:flex col-span-1 items-center justify-center">
                                            <button
                                                type="button"
                                                @click="removeFromCart(item.cartId)"
                                                class="w-7 h-7 rounded-full text-slate-300 hover:text-rose-500 hover:bg-rose-50 flex items-center justify-center transition-all cursor-pointer"
                                                title="Remove item">
                                                <span class="material-symbols-outlined text-base">close</span>
                                            </button>
                                        </div>

                                        {{-- Icon + Name --}}
                                        <div class="col-span-10 sm:col-span-4 flex items-center gap-3">
                                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl flex items-center justify-center shrink-0 shadow-sm text-white"
                                                 :class="item.gradient">
                                                <span class="material-symbols-outlined text-xl sm:text-2xl" x-text="item.icon"></span>
                                            </div>
                                            <div class="min-w-0">
                                                <h3 class="text-xs sm:text-sm font-bold text-[#06111E] leading-tight truncate" x-text="item.name"></h3>
                                                <span class="text-[10px] sm:text-xs text-slate-400 font-medium" x-text="`$${item.denom} Denomination`"></span>
                                            </div>
                                        </div>

                                        {{-- Mobile remove --}}
                                        <div class="col-span-2 sm:hidden flex justify-end">
                                            <button
                                                type="button"
                                                @click="removeFromCart(item.cartId)"
                                                class="w-7 h-7 rounded-full text-slate-300 hover:text-rose-500 hover:bg-rose-50 flex items-center justify-center transition-all cursor-pointer">
                                                <span class="material-symbols-outlined text-base">close</span>
                                            </button>
                                        </div>

                                        {{-- Unit Price --}}
                                        <div class="col-span-4 sm:col-span-2 text-center">
                                            <span class="text-xs sm:text-sm font-bold text-[#2563EB]" x-text="formatCurrency(item.price)"></span>
                                        </div>

                                        {{-- Quantity Stepper --}}
                                        <div class="col-span-4 sm:col-span-3 flex items-center justify-center">
                                            <div class="flex items-center border border-slate-200 rounded-xl overflow-hidden bg-slate-50 shadow-xs">
                                                <button
                                                    type="button"
                                                    @click="updateQuantity(item.cartId, -1)"
                                                    class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center text-slate-500 hover:bg-slate-200 hover:text-slate-800 transition-colors font-bold cursor-pointer text-sm">
                                                    −
                                                </button>
                                                <span class="w-8 sm:w-10 text-center text-xs sm:text-sm font-bold text-slate-800" x-text="item.quantity"></span>
                                                <button
                                                    type="button"
                                                    @click="updateQuantity(item.cartId, 1)"
                                                    class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center text-slate-500 hover:bg-slate-200 hover:text-slate-800 transition-colors font-bold cursor-pointer text-sm">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        {{-- Row Subtotal --}}
                                        <div class="col-span-4 sm:col-span-2 text-right">
                                            <span class="text-xs sm:text-sm font-extrabold text-[#06111E]"
                                                  x-text="formatCurrency(item.price * item.quantity)"></span>
                                        </div>

                                    </div>
                                </div>
                            </template>
                        </div>

                        {{-- ── Action Row ── --}}
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-2">
                            <a href="{{ route('marketplace') }}"
                               class="inline-flex items-center justify-center gap-2 border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-bold text-xs sm:text-sm px-5 py-2.5 rounded-full transition-all shadow-xs cursor-pointer">
                                <span class="material-symbols-outlined text-sm">arrow_back</span>
                                Continue Shopping
                            </a>
                            <button
                                type="button"
                                @click="cart = []; saveCart(); showToast('Cart cleared', 'delete')"
                                class="inline-flex items-center justify-center gap-2 border border-rose-200 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs sm:text-sm px-5 py-2.5 rounded-full transition-all shadow-xs cursor-pointer">
                                <span class="material-symbols-outlined text-sm">delete</span>
                                Clear Cart
                            </button>
                        </div>

                        {{-- ── 3 Assurance Pills ── --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-6">
                            <div class="bg-white border border-slate-100 rounded-2xl p-4 flex items-start gap-3 shadow-xs">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-base">bolt</span>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-[#06111E]">Instant Digital Delivery</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5 leading-snug">Encrypted codes sent to your email under 60 seconds.</p>
                                </div>
                            </div>
                            <div class="bg-white border border-slate-100 rounded-2xl p-4 flex items-start gap-3 shadow-xs">
                                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-base">verified_user</span>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-[#06111E]">Zero Bank Restrictions</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5 leading-snug">No foreign transaction flags or card limits apply.</p>
                                </div>
                            </div>
                            <div class="bg-white border border-slate-100 rounded-2xl p-4 flex items-start gap-3 shadow-xs">
                                <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-base">support_agent</span>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-[#06111E]">24/7 Escrow Protection</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5 leading-snug">Full warranty on every code. Auto-refund on failure.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- ── RIGHT: Order Summary ── --}}
                    <div class="lg:col-span-4">
                        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 space-y-5 sticky top-28">

                            <h2 class="font-headline font-black text-base sm:text-lg text-[#06111E]">Order Summary</h2>

                            {{-- Line items --}}
                            <div class="space-y-2.5 text-sm">
                                <div class="flex justify-between text-slate-500">
                                    <span>Items (<span x-text="cartTotalCount"></span>)</span>
                                    <span class="font-semibold text-slate-700" x-text="formatCurrency(cartSubtotal)"></span>
                                </div>
                                <div class="flex justify-between text-slate-500">
                                    <span>Escrow Warranty</span>
                                    <span class="font-semibold text-emerald-600">Free</span>
                                </div>
                                <div class="flex justify-between text-slate-500">
                                    <span>Processing Fee</span>
                                    <span class="font-semibold text-emerald-600">$0.00</span>
                                </div>
                                <div class="border-t border-slate-100 pt-3 flex justify-between font-extrabold text-[#06111E] text-base">
                                    <span>Total</span>
                                    <span x-text="formatCurrency(cartSubtotal)"></span>
                                </div>
                            </div>

                            {{-- Delivery Email --}}
                            <div>
                                <label class="text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-1.5">
                                    Delivery Email Address
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                        <span class="material-symbols-outlined text-slate-400 text-sm">mail</span>
                                    </span>
                                    <input
                                        type="email"
                                        x-model="checkoutEmail"
                                        placeholder="Enter recipient email…"
                                        class="w-full pl-9 pr-4 py-2.5 text-xs sm:text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB] transition-all">
                                </div>
                                <p class="text-[10px] text-slate-400 mt-1.5 leading-snug">Your verified gift card codes will be sent to this address within 60 seconds of payment.</p>
                            </div>

                            {{-- Payment Method --}}
                            <div>
                                <label class="text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-2">Payment Method</label>
                                <div class="grid grid-cols-3 gap-2">
                                    <button
                                        type="button"
                                        @click="paymentMethod = 'card'"
                                        :class="paymentMethod === 'card' ? 'border-[#2563EB] bg-blue-50 text-[#2563EB] font-bold shadow-sm' : 'border-slate-200 bg-white text-slate-600'"
                                        class="p-2.5 rounded-xl border text-[10px] flex flex-col items-center gap-1 transition-all cursor-pointer">
                                        <span class="material-symbols-outlined text-base">credit_card</span>
                                        Card
                                    </button>
                                    <button
                                        type="button"
                                        @click="paymentMethod = 'crypto'"
                                        :class="paymentMethod === 'crypto' ? 'border-[#2563EB] bg-blue-50 text-[#2563EB] font-bold shadow-sm' : 'border-slate-200 bg-white text-slate-600'"
                                        class="p-2.5 rounded-xl border text-[10px] flex flex-col items-center gap-1 transition-all cursor-pointer">
                                        <span class="material-symbols-outlined text-base">currency_bitcoin</span>
                                        Crypto
                                    </button>
                                    <button
                                        type="button"
                                        @click="paymentMethod = 'paypal'"
                                        :class="paymentMethod === 'paypal' ? 'border-[#2563EB] bg-blue-50 text-[#2563EB] font-bold shadow-sm' : 'border-slate-200 bg-white text-slate-600'"
                                        class="p-2.5 rounded-xl border text-[10px] flex flex-col items-center gap-1 transition-all cursor-pointer">
                                        <span class="material-symbols-outlined text-base">account_balance_wallet</span>
                                        PayPal
                                    </button>
                                </div>
                            </div>

                            {{-- Checkout CTA --}}
                            <button
                                type="button"
                                @click="triggerCheckout()"
                                :disabled="isCheckingOut"
                                class="w-full bg-[#2563EB] hover:bg-[#1D4ED8] disabled:opacity-60 text-white font-black text-sm py-3.5 rounded-xl shadow-md flex items-center justify-center gap-2 transition-all active:scale-[.98] cursor-pointer">
                                <span class="material-symbols-outlined text-base">lock</span>
                                <span x-show="!isCheckingOut">Proceed to Instant Checkout</span>
                                <span x-show="isCheckingOut">Securing Escrow Vault…</span>
                            </button>

                            {{-- Trust badge row --}}
                            <div class="flex items-center justify-center gap-2 pt-1">
                                <span class="material-symbols-outlined text-emerald-500 text-sm">verified_user</span>
                                <p class="text-[11px] text-slate-400 font-medium">100% Escrow Warranty — Zero Risk Guaranteed</p>
                            </div>

                        </div>
                    </div>

                </div>
            </template>

        </div>
    </div>

</x-layouts.app>

