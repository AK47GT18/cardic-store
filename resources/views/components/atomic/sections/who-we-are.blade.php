{{-- ============================================================
     SECTION 3: BUYER BENEFITS & ASSURANCE
     Left: Text, bullets, pill CTA
     Right: Wide architecture photography with floating radial metric widget
     ============================================================ --}}
<section class="bg-[#F8FAFC] py-20 sm:py-24 border-b border-slate-200/80 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            {{-- Left: Text, Bullets, Pill --}}
            <div class="lg:col-span-5 flex flex-col items-start">
                <div class="text-xs font-bold uppercase tracking-wider text-[#2563EB] mb-2">
                    Verified Authentic · Zero Hassle
                </div>

                <h2 class="font-headline font-extrabold text-3xl sm:text-4xl text-[#0F172A] tracking-tight leading-tight">
                    Gift card buying<br>made simple &amp; secure.
                </h2>

                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-4">
                    Tired of dubious sellers, inactive claim codes, and 48-hour fulfillment delays? Cardic Store connects customers directly to verified digital inventories with instantaneous cryptographic escrow warranty.
                </p>

                {{-- Bullet points with checkmarks --}}
                <div class="mt-6 space-y-3">
                    <div class="flex items-center gap-3 text-xs sm:text-sm font-semibold text-[#0F172A]">
                        <span class="w-5 h-5 rounded-full bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xs font-bold">check</span>
                        </span>
                        <span>Direct balance verification prior to every code dispatch.</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs sm:text-sm font-semibold text-[#0F172A]">
                        <span class="w-5 h-5 rounded-full bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xs font-bold">check</span>
                        </span>
                        <span>Zero counterparty risk with automated buyer escrow vaults.</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs sm:text-sm font-semibold text-[#0F172A]">
                        <span class="w-5 h-5 rounded-full bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-xs font-bold">check</span>
                        </span>
                        <span>Sub-60s instant delivery directly to your dashboard and email.</span>
                    </div>
                </div>

                {{-- Pill CTA --}}
                <div class="mt-8">
                    <a href="#products" 
                       class="inline-flex items-center gap-2 bg-[#0F172A] hover:bg-[#1E293B] text-white text-xs sm:text-sm font-bold px-6 py-3 rounded-full transition-all shadow-md">
                        <span>Browse 500+ Gift Cards</span>
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </a>
                </div>
            </div>

            {{-- Right: Photography with Floating Metric Widget --}}
            <div class="lg:col-span-7 relative">
                <div class="relative h-[380px] sm:h-[450px] rounded-3xl overflow-hidden shadow-xl border border-slate-200">
                    <img 
                        src="{{ asset('images/buying things.jpg') }}" 
                        alt="Digital gift card verified stock" 
                        class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                    {{-- Floating Glass Metric Widget --}}
                    <div class="absolute bottom-6 right-6 bg-white/90 backdrop-blur-xl border border-white/40 p-4 rounded-2xl shadow-2xl flex items-center gap-4 text-[#0F172A]">
                        <div class="relative w-14 h-14 rounded-full border-4 border-slate-200 border-t-[#2563EB] border-r-[#2563EB] flex items-center justify-center">
                            <span class="font-bold text-xs">99.8%</span>
                        </div>
                        <div>
                            <div class="text-xs font-extrabold">Instant First-Time Activation</div>
                            <div class="text-[11px] text-slate-500">Over 14,000+ codes redeemed this month</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
