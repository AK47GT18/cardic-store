<x-layouts.app title="How It Works — Simple 3-Step Gift Card Purchase">

    <div class="bg-[#F8FAFC] text-[#0F172A] min-h-screen">

        {{-- ============================================================
             HERO: SHORT, SLEEK & PUNCHY (No bulky boring search form)
             Compact height, bold headline, 3-step progression pill
             ============================================================ --}}
        <section class="relative bg-[#06111E] text-white pt-32 sm:pt-40 lg:pt-44 pb-20 sm:pb-28 lg:pb-32 overflow-hidden">

            {{-- Background Image with Atmospheric Overlays --}}
            <div class="absolute inset-0">
                <img src="{{ asset('images/giftcard.jpg') }}" alt="Gift Cards" class="w-full h-full object-cover object-center opacity-20">
                <div class="absolute inset-0 bg-gradient-to-b from-[#06111E]/95 via-[#06111E]/80 to-[#06111E]"></div>
                <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at 50% 40%, rgba(37,99,235,0.25) 0%, transparent 65%);"></div>
            </div>

            <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">

                {{-- Headline --}}
                <h1 class="font-headline font-black text-3xl sm:text-5xl lg:text-6xl text-white tracking-tight leading-[1.12]">
                    Select. Checkout. <span class="text-[#38BDF8]">Redeem.</span>
                </h1>

                {{-- Subtext --}}
                <p class="mt-4 text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed font-normal">
                    No account registration required. Pick your card, enter your delivery email, and receive your verified code on-screen in under 60 seconds.
                </p>

                {{-- Quick 3-Step Pill Bar --}}
                <div class="mt-8 inline-flex flex-wrap items-center justify-center gap-2 sm:gap-3 bg-white/10 border border-white/15 p-2 rounded-2xl backdrop-blur-md shadow-lg">
                    <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 text-white text-xs font-bold">
                        <span class="w-5 h-5 rounded-full bg-[#2563EB] text-white flex items-center justify-center text-[10px]">1</span>
                        <span>Select Card</span>
                    </div>
                    <span class="text-slate-400 text-xs hidden sm:inline">→</span>
                    <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 text-white text-xs font-bold">
                        <span class="w-5 h-5 rounded-full bg-[#2563EB] text-white flex items-center justify-center text-[10px]">2</span>
                        <span>Enter Email</span>
                    </div>
                    <span class="text-slate-400 text-xs hidden sm:inline">→</span>
                    <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-white/10 text-[#38BDF8] text-xs font-bold">
                        <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px]">3</span>
                        <span>Instant Redeem</span>
                    </div>
                </div>

            </div>

        </section>

        {{-- ============================================================
             INTERACTIVE 3-STEP WALKTHROUGH WITH LIVE DEMO SIMULATOR
             Engaging, non-boring visual experience!
             ============================================================ --}}
        <section class="py-16 sm:py-24 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ── STEP 1: SELECT CARD ───────────────────────────── --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center mb-20 sm:mb-28">

                {{-- Text Left --}}
                <div class="lg:col-span-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="w-10 h-10 rounded-2xl bg-blue-600 text-white flex items-center justify-center font-headline font-black text-lg shadow-md shadow-blue-500/30">
                            01
                        </span>
                        <span class="text-xs font-extrabold text-[#2563EB] tracking-wider uppercase">Step One</span>
                    </div>

                    <h2 class="font-headline font-black text-2xl sm:text-4xl text-[#0F172A] tracking-tight">
                        Select Your Card &amp; Value
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-600 mt-3.5 leading-relaxed">
                        Browse through 500+ pre-verified global brands including Amazon, Steam, Apple, PlayStation, Xbox, and major supermarkets. Choose your preferred currency, denomination, and enjoy instant discounts up to 14% off face value.
                    </p>

                    <ul class="mt-5 space-y-2.5 text-xs text-slate-700 font-medium">
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Live stock liquidity confirmed before you click</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Multiple denominations: $10, $25, $50, $100, $200+</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Clear upfront discount pricing with zero hidden fees</span>
                        </li>
                    </ul>

                    <div class="mt-7">
                        <a href="{{ route('home') }}#products"
                           class="inline-flex items-center gap-2 bg-[#0F172A] hover:bg-[#1E293B] text-white text-xs font-bold px-6 py-3 rounded-xl transition-all shadow-md active:scale-95">
                            <span>Browse 500+ Cards</span>
                            <span class="material-symbols-outlined text-xs">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Visual Simulator Right --}}
                <div class="lg:col-span-6">
                    <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-xl border border-slate-200/80 relative overflow-hidden">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-2.5">
                                <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                                <span class="text-xs font-bold text-slate-400 ml-2">Catalog Preview</span>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold">100% In Stock</span>
                        </div>

                        {{-- Mock Card Choice --}}
                        <div class="mt-5 space-y-3" x-data="{ selectedDenom: 50, selectedBrand: 'steam' }">
                            <div class="grid grid-cols-3 gap-2.5">
                                <button type="button" @click="selectedBrand = 'steam'"
                                        :class="selectedBrand === 'steam' ? 'border-[#2563EB] bg-blue-50/50 ring-2 ring-[#2563EB]/20' : 'border-slate-200 bg-white'"
                                        class="p-3 rounded-2xl border text-center transition-all cursor-pointer">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden mx-auto mb-1.5 bg-[#1B2838] flex items-center justify-center p-2">
                                        <img src="{{ asset('images/logos/steam-logo.svg') }}" alt="Steam" class="w-full h-full object-contain">
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-900">Steam</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">-8% OFF</div>
                                </button>

                                <button type="button" @click="selectedBrand = 'apple'"
                                        :class="selectedBrand === 'apple' ? 'border-[#2563EB] bg-blue-50/50 ring-2 ring-[#2563EB]/20' : 'border-slate-200 bg-white'"
                                        class="p-3 rounded-2xl border text-center transition-all cursor-pointer">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden mx-auto mb-1.5 bg-[#1d1d1f] flex items-center justify-center p-2">
                                        <img src="{{ asset('images/logos/apple-logo.svg') }}" alt="Apple" class="w-full h-full object-contain" style="filter: invert(1);">
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-900">Apple</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">-6% OFF</div>
                                </button>

                                <button type="button" @click="selectedBrand = 'amazon'"
                                        :class="selectedBrand === 'amazon' ? 'border-[#2563EB] bg-blue-50/50 ring-2 ring-[#2563EB]/20' : 'border-slate-200 bg-white'"
                                        class="p-3 rounded-2xl border text-center transition-all cursor-pointer">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden mx-auto mb-1.5 bg-[#232F3E] flex items-center justify-center p-1.5">
                                        <img src="{{ asset('images/logos/amazon-logo.svg') }}" alt="Amazon" class="w-full h-full object-contain" style="filter: invert(1);">
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-900">Amazon</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">-10% OFF</div>
                                </button>

                                <button type="button" @click="selectedBrand = 'netflix'"
                                        :class="selectedBrand === 'netflix' ? 'border-[#2563EB] bg-blue-50/50 ring-2 ring-[#2563EB]/20' : 'border-slate-200 bg-white'"
                                        class="p-3 rounded-2xl border text-center transition-all cursor-pointer">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden mx-auto mb-1.5 bg-[#141414] flex items-center justify-center p-1.5">
                                        <img src="{{ asset('images/logos/netflix-logo.svg') }}" alt="Netflix" class="w-full h-full object-contain">
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-900">Netflix</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">-5% OFF</div>
                                </button>

                                <button type="button" @click="selectedBrand = 'spotify'"
                                        :class="selectedBrand === 'spotify' ? 'border-[#2563EB] bg-blue-50/50 ring-2 ring-[#2563EB]/20' : 'border-slate-200 bg-white'"
                                        class="p-3 rounded-2xl border text-center transition-all cursor-pointer">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden mx-auto mb-1.5 bg-black flex items-center justify-center p-1.5">
                                        <img src="{{ asset('images/logos/spotify-logo.svg') }}" alt="Spotify" class="w-full h-full object-contain">
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-900">Spotify</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">-7% OFF</div>
                                </button>

                                <button type="button" @click="selectedBrand = 'xbox'"
                                        :class="selectedBrand === 'xbox' ? 'border-[#2563EB] bg-blue-50/50 ring-2 ring-[#2563EB]/20' : 'border-slate-200 bg-white'"
                                        class="p-3 rounded-2xl border text-center transition-all cursor-pointer">
                                    <div class="w-10 h-10 rounded-xl overflow-hidden mx-auto mb-1.5 bg-[#107C10] flex items-center justify-center p-1.5">
                                        <img src="{{ asset('images/logos/xbox-logo.svg') }}" alt="Xbox" class="w-full h-full object-contain">
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-900">Xbox</div>
                                    <div class="text-[10px] text-emerald-600 font-semibold">-9% OFF</div>
                                </button>
                            </div>

                            {{-- Denomination Selector --}}
                            <div class="mt-4 pt-3 border-t border-slate-100">
                                <label class="text-[11px] font-bold text-slate-600 block mb-2">Select Denomination Value</label>
                                <div class="grid grid-cols-4 gap-2">
                                    <template x-for="val in [25, 50, 100, 200]">
                                        <button
                                            type="button"
                                            @click="selectedDenom = val"
                                            :class="selectedDenom === val ? 'bg-[#2563EB] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                                            class="py-2 rounded-xl text-xs font-bold transition-all cursor-pointer">
                                            $<span x-text="val"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>

                            {{-- Live Price Summary --}}
                            <div class="mt-4 p-3.5 rounded-2xl bg-slate-50 border border-slate-200/70 flex items-center justify-between">
                                <div>
                                    <div class="text-[11px] text-slate-500 font-medium">Face Value: $<span x-text="selectedDenom"></span>.00</div>
                                    <div class="text-sm font-black text-emerald-600">You Pay: $<span x-text="(selectedDenom * 0.92).toFixed(2)"></span></div>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-extrabold">Instant Savings: $<span x-text="(selectedDenom * 0.08).toFixed(2)"></span></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- ── STEP 2: ENTER EMAIL & CHECKOUT ──────────────── --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center mb-20 sm:mb-28">

                {{-- Visual Simulator Left (Alternating Layout) --}}
                <div class="lg:col-span-6 order-2 lg:order-1">
                    <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-xl border border-slate-200/80 relative overflow-hidden"
                         x-data="{ emailInput: 'buyer@example.com', payMethod: 'card' }">

                        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#2563EB] text-lg">lock</span>
                                <span class="text-xs font-extrabold text-[#0F172A]">256-Bit SSL Escrow Checkout</span>
                            </div>
                            <span class="text-[10px] text-slate-400 font-semibold">Zero Account Needed</span>
                        </div>

                        {{-- Email Input Mockup --}}
                        <div class="mt-5 space-y-4">
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1">
                                    Delivery Email Address <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="material-symbols-outlined text-slate-400 text-sm absolute left-3.5 top-3">mail</span>
                                    <input
                                        type="email"
                                        x-model="emailInput"
                                        class="w-full bg-[#F8FAFC] border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-xs text-slate-900 font-medium outline-none focus:ring-2 focus:ring-[#2563EB]">
                                </div>
                                <span class="text-[10px] text-slate-400 mt-1 block">Your encrypted backup voucher will also be delivered here instantly.</span>
                            </div>

                            {{-- Payment Method Selection --}}
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Select Instant Payment</label>
                                <div class="grid grid-cols-3 gap-2">
                                    <button type="button" @click="payMethod = 'card'"
                                            :class="payMethod === 'card' ? 'border-[#2563EB] bg-blue-50/50 text-[#2563EB] font-bold' : 'border-slate-200 bg-white text-slate-700'"
                                            class="p-2.5 rounded-xl border text-xs text-center transition-all cursor-pointer">
                                        Card / Apple Pay
                                    </button>
                                    <button type="button" @click="payMethod = 'btc'"
                                            :class="payMethod === 'btc' ? 'border-[#2563EB] bg-blue-50/50 text-[#2563EB] font-bold' : 'border-slate-200 bg-white text-slate-700'"
                                            class="p-2.5 rounded-xl border text-xs text-center transition-all cursor-pointer">
                                        Bitcoin (BTC)
                                    </button>
                                    <button type="button" @click="payMethod = 'usdt'"
                                            :class="payMethod === 'usdt' ? 'border-[#2563EB] bg-blue-50/50 text-[#2563EB] font-bold' : 'border-slate-200 bg-white text-slate-700'"
                                            class="p-2.5 rounded-xl border text-xs text-center transition-all cursor-pointer">
                                        USDT (TRC/ERC)
                                    </button>
                                </div>
                            </div>

                            {{-- Simulated Button --}}
                            <div class="pt-2">
                                <button type="button" class="w-full bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-extrabold py-3 rounded-xl shadow-md flex items-center justify-center gap-1.5 cursor-default">
                                    <span class="material-symbols-outlined text-sm">verified_user</span>
                                    <span>Complete Escrow Payment ($46.00)</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Text Right --}}
                <div class="lg:col-span-6 order-1 lg:order-2">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="w-10 h-10 rounded-2xl bg-blue-600 text-white flex items-center justify-center font-headline font-black text-lg shadow-md shadow-blue-500/30">
                            02
                        </span>
                        <span class="text-xs font-extrabold text-[#2563EB] tracking-wider uppercase">Step Two</span>
                    </div>

                    <h2 class="font-headline font-black text-2xl sm:text-4xl text-[#0F172A] tracking-tight">
                        Enter Email &amp; Complete Checkout
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-600 mt-3.5 leading-relaxed">
                        Say goodbye to lengthy registration forms and invasive KYC verifications. Simply provide the email where you want your purchase receipt sent, and checkout in seconds.
                    </p>

                    <ul class="mt-5 space-y-2.5 text-xs text-slate-700 font-medium">
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>No passwords or mandatory account creation required</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Visa, Mastercard, Apple Pay, Google Pay, Bitcoin &amp; USDT</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Funds are held safely in escrow until you successfully receive your key</span>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- ── STEP 3: INSTANT REDEEM ───────────────────────── --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                {{-- Text Left --}}
                <div class="lg:col-span-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="w-10 h-10 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-headline font-black text-lg shadow-md shadow-emerald-500/30">
                            03
                        </span>
                        <span class="text-xs font-extrabold text-emerald-600 tracking-wider uppercase">Step Three</span>
                    </div>

                    <h2 class="font-headline font-black text-2xl sm:text-4xl text-[#0F172A] tracking-tight">
                        Instant Reveal &amp; Redeem
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-600 mt-3.5 leading-relaxed">
                        Within 40 to 60 seconds of checkout confirmation, your unmasked digital PIN key displays directly on your screen with a one-click copy button. An identical backup is sent to your inbox.
                    </p>

                    <ul class="mt-5 space-y-2.5 text-xs text-slate-700 font-medium">
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Sub-60s on-screen voucher reveal with instant copy button</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>Direct links to official redemption portals (Amazon, Steam, Apple)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-500 text-base">check_circle</span>
                            <span>100% Cash-Back Warranty if any card has balance issues</span>
                        </li>
                    </ul>

                    <div class="mt-7">
                        <a href="{{ route('home') }}#products"
                           class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-bold px-7 py-3.5 rounded-xl transition-all shadow-md active:scale-95">
                            <span>Ready to Buy? Browse Now</span>
                            <span class="material-symbols-outlined text-xs font-bold">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Visual Simulator Right: Live Interactive Code Reveal Card --}}
                <div class="lg:col-span-6">
                    <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden"
                         x-data="{ copied: false, copyCode() { navigator.clipboard?.writeText('STM-4928-8841-KLP9'); this.copied = true; showToast('Code copied to clipboard!', 'content_copy'); setTimeout(() => this.copied = false, 3000); } }">

                        {{-- Card Top Bar (Fully White) --}}
                        <div class="bg-white px-6 py-4 flex items-center justify-between border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                                </span>
                                <span class="text-xs font-black text-emerald-600 tracking-wide">Order Fulfilled · Verified Key</span>
                            </div>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-[11px] font-mono font-bold">ID: #CD-99428</span>
                        </div>

                        {{-- Card Body --}}
                        <div class="p-6">

                            {{-- Brand & Value --}}
                            <div class="flex items-center justify-between mb-5 pb-4 border-b border-slate-100">
                                <div>
                                    <div class="text-[10px] text-slate-400 uppercase font-bold tracking-wider mb-0.5">Product Purchased</div>
                                    <div class="text-base font-black text-[#0F172A]">Steam Wallet Card — $50.00</div>
                                </div>
                                <div class="w-12 h-12 rounded-xl overflow-hidden shrink-0 bg-[#1B2838] flex items-center justify-center p-1.5 shadow-sm">
                                    <img src="{{ asset('images/logos/steam-logo.svg') }}" alt="Steam" class="w-full h-full object-contain">
                                </div>
                            </div>

                            {{-- Code Box --}}
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/90">
                                <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mb-2 flex items-center justify-between">
                                    <span>Digital Redemption Key</span>
                                    <span class="text-emerald-600 font-extrabold">✓ 100% Active Balance</span>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <div class="font-mono font-black text-sm sm:text-base tracking-widest text-[#0F172A] select-all">
                                        STM-4928-8841-KLP9
                                    </div>
                                    <button
                                        type="button"
                                        @click="copyCode()"
                                        class="bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-extrabold px-3.5 py-2 rounded-xl flex items-center gap-1.5 transition-all active:scale-95 shadow-sm cursor-pointer shrink-0">
                                        <span class="material-symbols-outlined text-xs" x-text="copied ? 'check' : 'content_copy'">content_copy</span>
                                        <span x-text="copied ? 'Copied!' : 'Copy'">Copy</span>
                                    </button>
                                </div>
                            </div>

                            {{-- Footer row --}}
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex items-center gap-1.5 text-xs text-slate-500">
                                    <span class="material-symbols-outlined text-emerald-500 text-sm">schedule</span>
                                    <span>Delivered in 42 seconds</span>
                                </div>
                                <a href="https://store.steampowered.com/account/redeemwalletcode" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1 text-xs font-bold text-[#2563EB] hover:text-[#1D4ED8] transition-colors">
                                    <span>Redeem on Steam</span>
                                    <span class="material-symbols-outlined text-[11px]">open_in_new</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>

        {{-- ============================================================
             REDEMPTION GUIDE — HOW TO ACTUALLY USE YOUR CODE
             ============================================================ --}}
        <section class="py-16 sm:py-24 bg-white border-y border-slate-200/80">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-14">
                    <h2 class="font-headline font-black text-2xl sm:text-3xl text-[#0F172A] tracking-tight">
                        How to Redeem Your Code
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-2 max-w-xl mx-auto">
                        Once your code lands on screen, follow these steps to load your balance — it takes under 2 minutes.
                    </p>
                </div>

                {{-- Redemption Steps Timeline --}}
                <div class="relative">
                    {{-- Connecting line (desktop) --}}
                    <div class="hidden lg:block absolute top-9 left-0 right-0 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                        {{-- Step R1 --}}
                        <div class="relative flex flex-col items-center text-center">
                            <div class="w-18 h-18 rounded-2xl bg-[#06111E] text-white flex items-center justify-center mb-5 shadow-lg shadow-slate-900/20 relative z-10" style="width:72px;height:72px;">
                                <span class="material-symbols-outlined text-3xl text-[#38BDF8]">copy_all</span>
                            </div>
                            <div class="absolute top-0 right-0 lg:left-auto w-6 h-6 rounded-full bg-[#2563EB] text-white flex items-center justify-center text-[10px] font-black -mt-1 mr-2 lg:mr-0 lg:ml-10 z-20">1</div>
                            <h3 class="font-black text-sm text-[#0F172A] mb-1.5">Copy Your Code</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Hit the <strong class="text-slate-700">Copy</strong> button on your receipt screen or use the backup sent to your email.</p>
                        </div>

                        {{-- Step R2 --}}
                        <div class="relative flex flex-col items-center text-center">
                            <div class="w-18 h-18 rounded-2xl bg-[#06111E] text-white flex items-center justify-center mb-5 shadow-lg shadow-slate-900/20 relative z-10" style="width:72px;height:72px;">
                                <span class="material-symbols-outlined text-3xl text-emerald-400">open_in_browser</span>
                            </div>
                            <div class="absolute top-0 right-0 lg:left-auto w-6 h-6 rounded-full bg-[#2563EB] text-white flex items-center justify-center text-[10px] font-black -mt-1 mr-2 lg:mr-0 z-20">2</div>
                            <h3 class="font-black text-sm text-[#0F172A] mb-1.5">Go to Brand's Site</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Click the direct <strong class="text-slate-700">Redeem</strong> link in your receipt, or navigate to the brand's official redemption page.</p>
                        </div>

                        {{-- Step R3 --}}
                        <div class="relative flex flex-col items-center text-center">
                            <div class="w-18 h-18 rounded-2xl bg-[#06111E] text-white flex items-center justify-center mb-5 shadow-lg shadow-slate-900/20 relative z-10" style="width:72px;height:72px;">
                                <span class="material-symbols-outlined text-3xl text-amber-400">keyboard</span>
                            </div>
                            <div class="absolute top-0 right-0 lg:left-auto w-6 h-6 rounded-full bg-[#2563EB] text-white flex items-center justify-center text-[10px] font-black -mt-1 mr-2 lg:mr-0 z-20">3</div>
                            <h3 class="font-black text-sm text-[#0F172A] mb-1.5">Paste &amp; Confirm</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Paste your code into the redemption field and confirm. Your balance loads to your account instantly.</p>
                        </div>

                        {{-- Step R4 --}}
                        <div class="relative flex flex-col items-center text-center">
                            <div class="w-18 h-18 rounded-2xl bg-emerald-600 text-white flex items-center justify-center mb-5 shadow-lg shadow-emerald-600/25 relative z-10" style="width:72px;height:72px;">
                                <span class="material-symbols-outlined text-3xl">celebration</span>
                            </div>
                            <div class="absolute top-0 right-0 lg:left-auto w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] font-black -mt-1 mr-2 lg:mr-0 z-20">✓</div>
                            <h3 class="font-black text-sm text-[#0F172A] mb-1.5">Balance Added!</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Start spending. If anything goes wrong our escrow warranty automatically issues a replacement or full refund.</p>
                        </div>

                    </div>
                </div>

                {{-- Quick Redemption Links --}}
                <div class="mt-14">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="font-black text-base text-[#0F172A]">Quick Redemption Links</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Go straight to each brand's official redeem page.</p>
                        </div>
                        <span class="hidden sm:inline-flex items-center gap-1.5 text-xs text-slate-500 font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Official direct links
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        {{-- Steam --}}
                        <a href="https://store.steampowered.com/account/redeemwalletcode" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#1B2838] flex items-center justify-center shrink-0 p-1.5">
                                <img src="{{ asset('images/logos/steam-logo.svg') }}" alt="Steam" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Steam Wallet</div>
                                <div class="text-[11px] text-slate-400 truncate">store.steampowered.com/account/redeemwalletcode</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- Apple --}}
                        <a href="https://www.apple.com/shop/gift-cards" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#1d1d1f] flex items-center justify-center shrink-0 p-1.5">
                                <img src="{{ asset('images/logos/apple-logo.svg') }}" alt="Apple" class="w-full h-full object-contain" style="filter: invert(1);">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Apple ID Balance</div>
                                <div class="text-[11px] text-slate-400 truncate">apple.com/shop/gift-cards</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- Amazon --}}
                        <a href="https://www.amazon.com/gc/redeem" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#232F3E] flex items-center justify-center shrink-0 p-1.5">
                                <img src="{{ asset('images/logos/amazon-logo.svg') }}" alt="Amazon" class="w-full h-full object-contain" style="filter: invert(1);">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Amazon Gift Card</div>
                                <div class="text-[11px] text-slate-400 truncate">amazon.com/gc/redeem</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- Netflix --}}
                        <a href="https://www.netflix.com/redeem" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#141414] flex items-center justify-center shrink-0 p-1">
                                <img src="{{ asset('images/logos/netflix-logo.svg') }}" alt="Netflix" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Netflix</div>
                                <div class="text-[11px] text-slate-400 truncate">netflix.com/redeem</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- Spotify --}}
                        <a href="https://www.spotify.com/us/redeem/" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-black flex items-center justify-center shrink-0 p-1.5">
                                <img src="{{ asset('images/logos/spotify-logo.svg') }}" alt="Spotify" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Spotify Premium</div>
                                <div class="text-[11px] text-slate-400 truncate">spotify.com/us/redeem</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- Xbox --}}
                        <a href="https://redeem.microsoft.com" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#107C10] flex items-center justify-center shrink-0 p-1.5">
                                <img src="{{ asset('images/logos/xbox-logo.svg') }}" alt="Xbox" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Xbox / Microsoft</div>
                                <div class="text-[11px] text-slate-400 truncate">redeem.microsoft.com</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- PlayStation --}}
                        <a href="https://store.playstation.com/en-us/pages/redemption" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#003087] flex items-center justify-center shrink-0 overflow-hidden">
                                <img src="{{ asset('images/playstation.jpg') }}" alt="PlayStation" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">PlayStation Network</div>
                                <div class="text-[11px] text-slate-400 truncate">store.playstation.com</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                        {{-- Airbnb --}}
                        <a href="https://www.airbnb.com/gift-cards" target="_blank" rel="noopener"
                           class="flex items-center gap-3.5 px-4 py-3 bg-white rounded-2xl border border-slate-200/80 hover:border-[#2563EB]/50 hover:shadow-sm transition-all group">
                            <div class="w-9 h-9 rounded-xl bg-[#FF5A5F] flex items-center justify-center shrink-0 overflow-hidden">
                                <img src="{{ asset('images/airbnb.jpg') }}" alt="Airbnb" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs font-black text-[#0F172A] group-hover:text-[#2563EB] transition-colors">Airbnb</div>
                                <div class="text-[11px] text-slate-400 truncate">airbnb.com/gift-cards</div>
                            </div>
                            <span class="material-symbols-outlined text-[15px] text-slate-300 group-hover:text-[#2563EB] transition-colors shrink-0">open_in_new</span>
                        </a>

                    </div>
                </div>

            </div>
        </section>

        {{-- ============================================================
             SUPPORTED BRANDS GRID
             ============================================================ --}}
        <section class="py-14 bg-[#F8FAFC]">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-10">
                    <h2 class="font-headline font-black text-2xl sm:text-3xl text-[#0F172A] tracking-tight">
                        500+ Brands. All Pre-Verified.
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-2">
                        Every card in our catalog has been authenticated and confirmed active before it reaches you.
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 sm:gap-4">
                    @php
                    $brands = [
                        ['logo' => 'logos/steam-logo.svg',    'name' => 'Steam',       'off' => '-8%',  'bg' => '#1B2838', 'filter' => '', 'pad' => 'p-2'],
                        ['logo' => 'logos/apple-logo.svg',    'name' => 'Apple',       'off' => '-6%',  'bg' => '#1d1d1f', 'filter' => 'filter: invert(1);', 'pad' => 'p-2'],
                        ['logo' => 'logos/amazon-logo.svg',   'name' => 'Amazon',      'off' => '-10%', 'bg' => '#232F3E', 'filter' => 'filter: invert(1);', 'pad' => 'p-1.5'],
                        ['logo' => 'logos/netflix-logo.svg',  'name' => 'Netflix',     'off' => '-5%',  'bg' => '#141414', 'filter' => '', 'pad' => 'p-1.5'],
                        ['logo' => 'logos/spotify-logo.svg',  'name' => 'Spotify',     'off' => '-7%',  'bg' => '#000000', 'filter' => '', 'pad' => 'p-1.5'],
                        ['logo' => 'logos/xbox-logo.svg',     'name' => 'Xbox',        'off' => '-9%',  'bg' => '#107C10', 'filter' => '', 'pad' => 'p-1.5'],
                        ['logo' => 'logos/playstation-logo.svg', 'name' => 'PlayStation', 'off' => '-8%', 'bg' => '#003087', 'filter' => '', 'pad' => 'p-0', 'cover' => true, 'img_override' => 'playstation.jpg'],
                        ['logo' => 'airbnb.jpg',              'name' => 'Airbnb',      'off' => '-6%',  'bg' => '#FF5A5F', 'filter' => '', 'pad' => 'p-0', 'cover' => true],
                        ['logo' => 'gaming.jpg',              'name' => 'Gaming',      'off' => '-12%', 'bg' => '#7C3AED', 'filter' => '', 'pad' => 'p-0', 'cover' => true],
                        ['logo' => 'retail.jpg',              'name' => 'Retail',      'off' => '-10%', 'bg' => '#0F766E', 'filter' => '', 'pad' => 'p-0', 'cover' => true],
                        ['logo' => 'stream.jpg',              'name' => 'Streaming',   'off' => '-5%',  'bg' => '#B45309', 'filter' => '', 'pad' => 'p-0', 'cover' => true],
                        ['logo' => 'giftcard.jpg',            'name' => 'Gift Cards',  'off' => '-14%', 'bg' => '#1E40AF', 'filter' => '', 'pad' => 'p-0', 'cover' => true],
                    ];
                    @endphp
                    @foreach($brands as $brand)
                    <div class="group bg-white rounded-2xl border border-slate-200/80 p-3 flex flex-col items-center text-center hover:border-[#2563EB]/40 hover:shadow-md transition-all">
                        <div class="w-14 h-14 rounded-xl overflow-hidden mb-2.5 shadow-sm flex items-center justify-center {{ $brand['pad'] }}"
                             style="background-color: {{ $brand['bg'] }};">
                            @if(!empty($brand['cover']) || !empty($brand['img_override']))
                                <img src="{{ asset('images/' . ($brand['img_override'] ?? $brand['logo'])) }}" alt="{{ $brand['name'] }}" class="w-full h-full object-cover object-center opacity-90 group-hover:opacity-100 transition-opacity">
                            @else
                                <img src="{{ asset('images/' . $brand['logo']) }}" alt="{{ $brand['name'] }}" class="w-full h-full object-contain opacity-90 group-hover:opacity-100 transition-opacity" style="{{ $brand['filter'] }}">
                            @endif
                        </div>
                        <div class="text-xs font-black text-[#0F172A] leading-tight">{{ $brand['name'] }}</div>
                        <span class="mt-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-extrabold">{{ $brand['off'] }} OFF</span>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('home') }}#products"
                       class="inline-flex items-center gap-2 bg-[#0F172A] hover:bg-[#1E293B] text-white text-xs font-bold px-7 py-3 rounded-xl transition-all shadow-md active:scale-95">
                        <span>View Full Catalog</span>
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </a>
                </div>

            </div>
        </section>

        {{-- ============================================================
             FREQUENTLY ASKED QUESTIONS ACCORDION
             ============================================================ --}}
        <section class="py-16 sm:py-24 max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h2 class="font-headline font-black text-2xl sm:text-3xl text-[#0F172A] tracking-tight">
                    Frequently Asked Questions
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Everything you need to know about buying and redeeming gift cards on Cardic Store.
                </p>
            </div>

            <div class="space-y-3" x-data="{ activeAccordion: null }">

                {{-- FAQ 1 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-4 transition-all">
                    <button
                        type="button"
                        @click="activeAccordion = activeAccordion === 1 ? null : 1"
                        class="w-full flex items-center justify-between text-left font-bold text-xs sm:text-sm text-[#0F172A] cursor-pointer">
                        <span>How quickly will I receive my gift card code?</span>
                        <span class="material-symbols-outlined text-slate-400 text-base" :class="activeAccordion === 1 ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="activeAccordion === 1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="mt-3 text-xs text-slate-600 leading-relaxed pt-2 border-t border-slate-100">
                        Orders are processed automatically through our clearing nodes. Codes are revealed directly on your screen and dispatched to your email within 40 to 60 seconds after payment confirmation.
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-4 transition-all">
                    <button
                        type="button"
                        @click="activeAccordion = activeAccordion === 2 ? null : 2"
                        class="w-full flex items-center justify-between text-left font-bold text-xs sm:text-sm text-[#0F172A] cursor-pointer">
                        <span>Do I need to create an account to buy?</span>
                        <span class="material-symbols-outlined text-slate-400 text-base" :class="activeAccordion === 2 ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="activeAccordion === 2" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="mt-3 text-xs text-slate-600 leading-relaxed pt-2 border-t border-slate-100">
                        No. Cardic Store requires zero account sign-up or password creation. All you need is an email address where your purchase receipt and encrypted backup code can be sent.
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-4 transition-all">
                    <button
                        type="button"
                        @click="activeAccordion = activeAccordion === 3 ? null : 3"
                        class="w-full flex items-center justify-between text-left font-bold text-xs sm:text-sm text-[#0F172A] cursor-pointer">
                        <span>What payment methods can I use?</span>
                        <span class="material-symbols-outlined text-slate-400 text-base" :class="activeAccordion === 3 ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="activeAccordion === 3" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="mt-3 text-xs text-slate-600 leading-relaxed pt-2 border-t border-slate-100">
                        We accept Visa, Mastercard, Apple Pay, Google Pay, and major cryptocurrencies (Bitcoin, USDT TRC20/ERC20) through our bank-grade encrypted checkout gateway.
                    </div>
                </div>

                {{-- FAQ 4 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-4 transition-all">
                    <button
                        type="button"
                        @click="activeAccordion = activeAccordion === 4 ? null : 4"
                        class="w-full flex items-center justify-between text-left font-bold text-xs sm:text-sm text-[#0F172A] cursor-pointer">
                        <span>What happens if a code does not redeem?</span>
                        <span class="material-symbols-outlined text-slate-400 text-base" :class="activeAccordion === 4 ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="activeAccordion === 4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="mt-3 text-xs text-slate-600 leading-relaxed pt-2 border-t border-slate-100">
                        Every purchase is backed by our 100% Escrow Warranty. In the rare event of an issuer activation delay, our automated dispute resolution system pings the merchant API and provides an immediate working replacement or complete cash refund.
                    </div>
                </div>

            </div>

            {{-- Final CTA --}}
            <div class="mt-14 text-center">
                <a href="{{ route('home') }}#products"
                   class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs sm:text-sm font-extrabold px-8 py-4 rounded-xl shadow-lg transition-transform active:scale-95">
                    <span>Browse 500+ Verified Cards</span>
                    <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                </a>
            </div>

        </section>

    </div>

</x-layouts.app>
