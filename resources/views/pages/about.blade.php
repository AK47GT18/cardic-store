<x-layouts.app title="About Us — Bridging Global Purchases | Cardic Store">

    <div class="bg-[#F8FAFC] text-[#0F172A] min-h-screen">

        {{-- ============================================================
             SECTION 1: HERO (Centered Style Matching How-It-Works)
             ============================================================ --}}
        <section class="relative bg-[#06111E] text-white pt-28 sm:pt-36 pb-16 sm:pb-20 w-full overflow-hidden border-b border-slate-800/80">

            {{-- Background Image with Atmospheric Overlays --}}
            <div class="absolute inset-0 pointer-events-none">
                <img src="{{ asset('images/retail.jpg') }}" alt="Global Purchasing Rails" class="w-full h-full object-cover object-center opacity-20">
                <div class="absolute inset-0 bg-gradient-to-b from-[#06111E]/95 via-[#06111E]/80 to-[#06111E]"></div>
                <div class="absolute inset-0" style="background: radial-gradient(circle at 50% 40%, rgba(37,99,235,0.25) 0%, transparent 65%);"></div>
            </div>

            <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">

                <h1 class="font-headline font-black text-3xl sm:text-5xl lg:text-6xl text-white tracking-tight leading-[1.15]">
                    Experience the freedom <span class="text-[#38BDF8]">of borderless purchases.</span>
                </h1>

                <p class="mt-4 text-xs sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed font-normal">
                    We engineered Cardic Store to bridge the global payment divide. When local banking restrictions, monthly card limits, or currency controls lock you out of overseas stores — we deliver 100% verified digital vouchers in seconds.
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-3.5">
                    <a href="{{ route('home') }}#products"
                       class="inline-flex items-center gap-2 bg-white hover:bg-slate-100 text-[#06111E] font-black text-xs sm:text-sm px-7 py-3.5 rounded-full shadow-lg transition-transform active:scale-95 cursor-pointer">
                        <span>Get Started</span>
                        <span class="material-symbols-outlined text-sm font-black">arrow_forward</span>
                    </a>

                    <a href="{{ route('how-it-works') }}"
                       class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/15 text-white border border-white/20 font-bold text-xs sm:text-sm px-6 py-3.5 rounded-full transition-all backdrop-blur-md">
                        <span>How It Works</span>
                    </a>
                </div>

            </div>
        </section>

        {{-- ============================================================
             SECTION 2: THREE CARDS GRID (Matching Template Section 2)
             Center Title + Card 1 (Gauge Photo) + Card 2 (Light) + Card 3 (Light)
             ============================================================ --}}
        <section class="py-12 sm:py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Centered Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h2 class="font-headline font-black text-xl sm:text-3xl text-[#0F172A] tracking-tight">
                    Experience the future of overseas buying.
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5">
                    Empowering individuals and companies to access international goods, cloud tools, and subscriptions with zero payment restrictions.
                </p>
            </div>

            {{-- 3-Card Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">

                {{-- Card 1: Visual Gauge / Metric Photo Card matching template --}}
                <div class="relative rounded-3xl overflow-hidden shadow-lg aspect-[4/4.5] sm:aspect-auto flex flex-col justify-between p-6 sm:p-7 text-white group">
                    <img src="{{ asset('images/supermarket.jpg') }}" alt="Direct Global Liquidity" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#06111E] via-[#06111E]/50 to-[#06111E]/40"></div>

                    {{-- Top Label --}}
                    <div class="relative z-10">
                        <span class="text-[10px] font-bold tracking-widest uppercase text-blue-300">Direct Sourcing</span>
                        <h3 class="text-lg font-black mt-1">Direct Liquidity Pipeline</h3>
                    </div>

                    {{-- Bottom Gauge / Dial Widget matching template --}}
                    <div class="relative z-10 bg-black/40 backdrop-blur-md rounded-2xl p-4 border border-white/15 flex items-center justify-between">
                        <div>
                            <div class="text-[10px] text-slate-300 uppercase font-semibold">Delivery Rate</div>
                            <div class="text-2xl font-black text-white">99.8%</div>
                            <div class="text-[10px] text-emerald-400 font-bold mt-0.5">Sub-60s SLA Guarantee</div>
                        </div>

                        {{-- Circular Dial Graphic --}}
                        <div class="relative w-14 h-14 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                <path class="text-white/20" stroke-width="3.5" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="text-[#38BDF8]" stroke-dasharray="90, 100" stroke-width="3.5" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <span class="absolute text-[11px] font-black text-white">99%</span>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Light Clean Feature Card matching template --}}
                <div class="bg-white rounded-3xl p-7 border border-slate-200 shadow-sm flex flex-col justify-between hover:border-[#2563EB]/40 hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#2563EB] flex items-center justify-center mb-5 shadow-xs">
                            <span class="material-symbols-outlined text-2xl">credit_card_off</span>
                        </div>
                        <h3 class="font-headline font-black text-lg text-[#0F172A] tracking-tight">
                            Bypass Local Bank Caps
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-3 leading-relaxed">
                            Many local banks enforce strict monthly international spend caps of $50–$200, or block overseas billing altogether. Cardic Store offers flexible payment options so your digital purchases go through without bank delays.
                        </p>
                    </div>

                    <div class="pt-6 border-t border-slate-100 mt-6 flex items-center justify-between text-xs font-bold text-[#2563EB]">
                        <span>Zero Card Decline Errors</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>

                {{-- Card 3: Light Clean Feature Card matching template --}}
                <div class="bg-white rounded-3xl p-7 border border-slate-200 shadow-sm flex flex-col justify-between hover:border-[#2563EB]/40 hover:shadow-md transition-all">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-5 shadow-xs">
                            <span class="material-symbols-outlined text-2xl">shield_person</span>
                        </div>
                        <h3 class="font-headline font-black text-lg text-[#0F172A] tracking-tight">
                            Zero-KYC Frictionless Access
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-3 leading-relaxed">
                            Never worry about submitting sensitive passport scans or personal financial history to international sites. Simply provide your delivery email and receive unmasked digital codes securely in seconds.
                        </p>
                    </div>

                    <div class="pt-6 border-t border-slate-100 mt-6 flex items-center justify-between text-xs font-bold text-emerald-600">
                        <span>Email-Only Delivery</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </div>
                </div>

            </div>

        </section>

        {{-- ============================================================
             SECTION 3: TWO-COLUMN SPLIT (Matching Template Section 3)
             Left: Feature text + 2 bullets + Button. Right: Large Photo with Dial Widget
             ============================================================ --}}
        <section class="py-16 sm:py-24 bg-white border-y border-slate-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

                    {{-- Left Column: Typography, Bullets & Button --}}
                    <div class="lg:col-span-5">
                        <span class="text-xs font-extrabold tracking-widest text-[#2563EB] uppercase mb-2 block">
                            Global Liquidity Rails
                        </span>

                        <h2 class="font-headline font-black text-2xl sm:text-4xl text-[#0F172A] tracking-tight leading-tight">
                            Overseas Purchases Made Easy &amp; Frictionless.
                        </h2>

                        <p class="mt-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Whether you need to pay for remote work tools, cloud services, software subscriptions, or gaming balances in US, UK, or EU currencies — we eliminate the region-locking barrier and provide reliable, pre-cleared access.
                        </p>

                        {{-- 2 Feature Bullets matching template --}}
                        <div class="mt-6 space-y-3">
                            <div class="flex items-center gap-3 text-xs font-bold text-[#0F172A]">
                                <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-xs font-black">check</span>
                                </div>
                                <span>Real-time issuer balance validation prior to delivery</span>
                            </div>
                            <div class="flex items-center gap-3 text-xs font-bold text-[#0F172A]">
                                <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-xs font-black">check</span>
                                </div>
                                <span>Multi-currency checkout: Cards, Apple Pay, Bitcoin &amp; USDT</span>
                            </div>
                        </div>

                        {{-- CTA Button matching template --}}
                        <div class="mt-8">
                            <a href="{{ route('home') }}#products"
                               class="inline-flex items-center gap-2 bg-[#0F172A] hover:bg-[#1E293B] text-white font-black text-xs sm:text-sm px-7 py-3.5 rounded-full transition-transform active:scale-95 shadow-md">
                                <span>Browse Catalog</span>
                                <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                            </a>
                        </div>
                    </div>

                    {{-- Right Column: Large Photo with Floating Gauge Card matching template --}}
                    <div class="lg:col-span-7">
                        <div class="relative rounded-3xl overflow-hidden shadow-xl aspect-[16/10] bg-slate-900 group">
                            <img src="{{ asset('images/retail.jpg') }}" alt="Global Digital Buying" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#06111E]/80 via-transparent to-transparent"></div>

                            {{-- Floating Glass Widget on Bottom Right matching template --}}
                            <div class="absolute bottom-5 right-5 sm:bottom-6 sm:right-6 bg-[#06111E]/80 backdrop-blur-md rounded-2xl p-4 border border-white/20 text-white shadow-2xl flex items-center gap-4 max-w-xs">
                                <div>
                                    <div class="text-[10px] text-slate-300 font-semibold uppercase">Average Delivery</div>
                                    <div class="text-xl font-black text-white">~42 Seconds</div>
                                    <div class="text-[10px] text-emerald-400 font-bold mt-0.5">Automated Escrow Protocol</div>
                                </div>
                                <div class="w-11 h-11 rounded-xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-md">
                                    <span class="material-symbols-outlined text-xl">bolt</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        {{-- ============================================================
             SECTION 4: THREE PHOTO CARDS (Sleek Compact Height)
             Curated categories with compact aspect ratio
             ============================================================ --}}
        <section class="py-12 sm:py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Centered Header --}}
            <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10">
                <span class="text-xs font-extrabold tracking-widest text-[#2563EB] uppercase mb-1.5 block">
                    Curated Categories
                </span>
                <h2 class="font-headline font-black text-2xl sm:text-3xl text-[#0F172A] tracking-tight">
                    Powering Every Digital Vertical Overseas.
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5">
                    Pre-cleared balance vouchers tailored for global shoppers, freelancers, and remote teams.
                </p>
            </div>

            {{-- 3 Sleek Compact Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                {{-- Card 1: Enterprise & Cloud --}}
                <div class="relative rounded-3xl overflow-hidden shadow-md aspect-[16/11] group bg-slate-900">
                    <img src="{{ asset('images/buying things.jpg') }}" alt="Enterprise Tools" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#06111E] via-[#06111E]/40 to-transparent"></div>

                    {{-- Floating Content at Bottom --}}
                    <div class="absolute bottom-5 left-5 right-5 text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-white/20 backdrop-blur-md text-white flex items-center justify-center border border-white/20 shadow-xs">
                                <span class="material-symbols-outlined text-base">work</span>
                            </div>
                            <h3 class="font-headline font-black text-base text-white">Enterprise &amp; Work Tools</h3>
                        </div>
                        <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed">
                            Amazon, Apple ID and digital vouchers to fund cloud software, developer tools, and team resources overseas.
                        </p>
                    </div>
                </div>

                {{-- Card 2: Gaming & Keys --}}
                <div class="relative rounded-3xl overflow-hidden shadow-md aspect-[16/11] group bg-slate-900">
                    <img src="{{ asset('images/gaming.jpg') }}" alt="Gaming & Keys" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#06111E] via-[#06111E]/40 to-transparent"></div>

                    {{-- Floating Content at Bottom --}}
                    <div class="absolute bottom-5 left-5 right-5 text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-white/20 backdrop-blur-md text-white flex items-center justify-center border border-white/20 shadow-xs">
                                <span class="material-symbols-outlined text-base">sports_esports</span>
                            </div>
                            <h3 class="font-headline font-black text-base text-white">Gaming &amp; Steam</h3>
                        </div>
                        <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed">
                            Steam Wallet, Xbox, and PlayStation digital keys delivered instantly with zero region-locking hurdles.
                        </p>
                    </div>
                </div>

                {{-- Card 3: Global Streaming --}}
                <div class="relative rounded-3xl overflow-hidden shadow-md aspect-[16/11] group bg-slate-900">
                    <img src="{{ asset('images/stream.jpg') }}" alt="Streaming Entertainment" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#06111E] via-[#06111E]/40 to-transparent"></div>

                    {{-- Floating Content at Bottom --}}
                    <div class="absolute bottom-5 left-5 right-5 text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 rounded-lg bg-white/20 backdrop-blur-md text-white flex items-center justify-center border border-white/20 shadow-xs">
                                <span class="material-symbols-outlined text-base">movie</span>
                            </div>
                            <h3 class="font-headline font-black text-base text-white">Streaming &amp; Music</h3>
                        </div>
                        <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed">
                            Netflix, Spotify, and global streaming vouchers to keep personal and family subscriptions running seamlessly.
                        </p>
                    </div>
                </div>

            </div>

        </section>

        {{-- ============================================================
             SECTION 5: OVERSEAS PURCHASING SOLUTION (White Background Split)
             Side 1: Stack of 3 Photographic Brand Vertical Cards
             Side 2: Solution Narrative, Value Pillars & CTA
             ============================================================ --}}
        <section class="py-16 sm:py-24 bg-white border-y border-slate-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

                    {{-- Left Column: Stacked Cards Over Each Other (No Badges) --}}
                    <div class="lg:col-span-5 space-y-3.5">

                        {{-- Card 1: Gaming & Steam --}}
                        <div class="relative rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 aspect-[16/6] group bg-slate-900">
                            <img src="{{ asset('images/gaming.jpg') }}" alt="Gaming & Digital Keys" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-r from-[#06111E]/90 via-[#06111E]/55 to-transparent"></div>
                            <div class="absolute inset-0 p-4 sm:p-5 flex items-center text-white">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md p-2 border border-white/20 flex items-center justify-center shrink-0 shadow-sm">
                                        <img src="{{ asset('images/logos/steam-logo.svg') }}" alt="Steam" class="w-full h-full object-contain">
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-xs text-[#38BDF8] font-bold uppercase tracking-wider">Gaming &amp; Keys</div>
                                        <div class="text-sm sm:text-base font-black truncate">Steam, PlayStation &amp; Xbox</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Card 2: Work & Cloud Tools --}}
                        <div class="relative rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 aspect-[16/6] group bg-slate-900">
                            <img src="{{ asset('images/retail.jpg') }}" alt="Work & Cloud Software" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-r from-[#06111E]/90 via-[#06111E]/55 to-transparent"></div>
                            <div class="absolute inset-0 p-4 sm:p-5 flex items-center text-white">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md p-2 border border-white/20 flex items-center justify-center shrink-0 shadow-sm">
                                        <img src="{{ asset('images/logos/apple-logo.svg') }}" alt="Apple" class="w-full h-full object-contain" style="filter: invert(1);">
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-xs text-[#38BDF8] font-bold uppercase tracking-wider">Work, Cloud &amp; SaaS</div>
                                        <div class="text-sm sm:text-base font-black truncate">Apple ID, AWS &amp; Developer Tools</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Card 3: Global Retail & Streaming --}}
                        <div class="relative rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 aspect-[16/6] group bg-slate-900">
                            <img src="{{ asset('images/stream.jpg') }}" alt="Global Retail & Media" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-r from-[#06111E]/90 via-[#06111E]/55 to-transparent"></div>
                            <div class="absolute inset-0 p-4 sm:p-5 flex items-center text-white">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md p-2 border border-white/20 flex items-center justify-center shrink-0 shadow-sm">
                                        <img src="{{ asset('images/logos/amazon-logo.svg') }}" alt="Amazon" class="w-full h-full object-contain" style="filter: invert(1);">
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-xs text-[#38BDF8] font-bold uppercase tracking-wider">Retail &amp; Streaming</div>
                                        <div class="text-sm sm:text-base font-black truncate">Amazon, Netflix &amp; Spotify</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Right Column: Problem & Solution Narrative --}}
                    <div class="lg:col-span-7">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-[#2563EB] text-xs font-bold mb-3.5">
                            <span class="material-symbols-outlined text-sm">public</span>
                            <span>Overseas Purchasing Freedom</span>
                        </div>

                        <h2 class="font-headline font-black text-2xl sm:text-4xl text-[#0F172A] tracking-tight leading-tight">
                            Where borderless access meets instant speed.
                        </h2>

                        <p class="mt-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Around the globe, individuals and growing teams face severe monthly international card quotas ($50–$200), high forex markup fees, or outright payment declines from overseas merchants.
                        </p>

                        <p class="mt-2.5 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Cardic Store serves as your direct clearing bridge. We provide instant, pre-cleared digital balances across 500+ global brands — backed by real-time balance validation algorithms so your overseas software, hardware, and entertainment purchases complete without friction.
                        </p>

                        {{-- 3 Value Points --}}
                        <div class="mt-6 space-y-3.5">
                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 rounded-lg bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-base">credit_card_off</span>
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#0F172A]">Bypass Artificial Spend Quotas</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Fund subscriptions and software without worrying about restrictive monthly bank limits.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-base">verified_user</span>
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#0F172A]">Direct Balance Validation</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Every code is pinged against issuer APIs prior to release, guaranteeing 100% active funds.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-base">bolt</span>
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#0F172A]">Sub-60s Delivery Guarantee</h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Codes are revealed unmasked on-screen immediately after payment and mirrored to your email.</p>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="mt-8 flex flex-wrap items-center gap-3.5">
                            <a href="{{ route('home') }}#products"
                               class="inline-flex items-center gap-2 bg-[#0F172A] hover:bg-[#1E293B] text-white font-black text-xs sm:text-sm px-7 py-3 rounded-full transition-transform active:scale-95 shadow-md">
                                <span>Explore 500+ Cards</span>
                                <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                            </a>

                            <a href="{{ route('how-it-works') }}"
                               class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-[#0F172A] font-bold text-xs sm:text-sm px-6 py-3 rounded-full transition-all">
                                <span>How It Works</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        {{-- ============================================================
             SECTION 6: TESTIMONIAL SPLIT (Reduced Height, Compact & Sleek)
             Left: Quote Card with Author. Right: Compact Showcase Photo
             ============================================================ --}}
        <section class="py-10 sm:py-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

                {{-- Left: Testimonial Card (~7 cols) --}}
                <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div>
                        {{-- Quote Icon Pill --}}
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-xl">format_quote</span>
                        </div>

                        {{-- Main Quote Text --}}
                        <blockquote class="text-sm sm:text-base font-bold text-[#0F172A] leading-relaxed">
                            "Our remote development agency operates across Latin America and Africa where local cards have a $200 monthly overseas limit. Cardic Store completely unlocked our operations — we purchase Apple, AWS, Steam, and subscription balances for our team with zero bank declines."
                        </blockquote>
                    </div>

                    {{-- Author Row --}}
                    <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-blue-600 text-white font-black text-xs flex items-center justify-center">
                                CM
                            </div>
                            <div>
                                <div class="text-xs font-black text-[#0F172A]">Carlos Mendez</div>
                                <div class="text-[11px] text-slate-400">Managing Director, Studio Nova Global</div>
                            </div>
                        </div>

                        {{-- Verified Badge --}}
                        <div class="flex items-center gap-1.5 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span>Verified Agency Buyer</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Compact Showcase Photo (~5 cols) --}}
                <div class="lg:col-span-5 rounded-3xl overflow-hidden shadow-sm aspect-[16/10] sm:aspect-auto sm:max-h-64 lg:max-h-72 bg-slate-900 group">
                    <img src="{{ asset('images/buying things.jpg') }}" alt="Cardic Store Global Buyers" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>

            </div>
        </section>

    </div>

</x-layouts.app>
