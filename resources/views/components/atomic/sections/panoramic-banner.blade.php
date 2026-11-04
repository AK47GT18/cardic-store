{{-- ============================================================
     SECTION 5: PANORAMIC MID-PAGE FEATURE BANNER
     Heading: "Where digital gift cards meet ironclad escrow"
     3 bottom thumbnail cards with buyer guarantees
     ============================================================ --}}
<section class="relative py-28 sm:py-36 overflow-hidden bg-[#091524]">

    {{-- Background: Majestic Panoramic Landscape --}}
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ asset('images/giftcard.jpg') }}" 
            alt="Scenic background" 
            class="w-full h-full object-cover brightness-[0.25] contrast-110">
        <div class="absolute inset-0 bg-gradient-to-t from-[#091524] via-transparent to-[#091524]/70"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-8 text-center flex flex-col items-center">
        <div class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-[#38BDF8] mb-3">
            Institutional Escrow Standard
        </div>

        <h2 class="font-headline font-extrabold text-3xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-3xl leading-tight">
            Where digital gift cards meet ironclad escrow.
        </h2>

        <div class="mt-8">
            <a href="#products" 
               class="inline-flex items-center gap-2 bg-white hover:bg-slate-100 text-[#0F172A] font-extrabold text-xs sm:text-sm px-7 py-3.5 rounded-full shadow-2xl transition-all active:scale-95">
                <span>Shop Verified Cards</span>
                <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
            </a>
        </div>

        {{-- 3 Floating Glass Thumbnail Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-16 w-full max-w-4xl text-left">

            {{-- Thumbnail Card 1 --}}
            <div class="bg-black/50 backdrop-blur-xl border border-white/20 p-4 rounded-2xl flex items-center gap-3.5 shadow-xl">
                <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-700 shrink-0">
                    <img src="{{ asset('images/amazon.jpg') }}" alt="SLA" class="w-full h-full object-cover">
                </div>
                <div>
                    <div class="text-xs font-bold text-white leading-tight">Sub-60s Delivery Guarantee</div>
                    <div class="text-[11px] text-slate-300 mt-1">Instant claim keys via dashboard and email.</div>
                </div>
            </div>

            {{-- Thumbnail Card 2 --}}
            <div class="bg-black/50 backdrop-blur-xl border border-white/20 p-4 rounded-2xl flex items-center gap-3.5 shadow-xl">
                <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-700 shrink-0">
                    <img src="{{ asset('images/netflix.jpg') }}" alt="Escrow" class="w-full h-full object-cover">
                </div>
                <div>
                    <div class="text-xs font-bold text-white leading-tight">Cryptographic Escrow Pool</div>
                    <div class="text-[11px] text-slate-300 mt-1">100% refund guarantee on inactive codes.</div>
                </div>
            </div>

            {{-- Thumbnail Card 3 --}}
            <div class="bg-black/50 backdrop-blur-xl border border-white/20 p-4 rounded-2xl flex items-center gap-3.5 shadow-xl">
                <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-700 shrink-0">
                    <img src="{{ asset('images/spotify.jpg') }}" alt="Payment options" class="w-full h-full object-cover">
                </div>
                <div>
                    <div class="text-xs font-bold text-white leading-tight">Flexible Payment Methods</div>
                    <div class="text-[11px] text-slate-300 mt-1">Cards, Apple Pay, Google Pay, BTC & USDT.</div>
                </div>
            </div>

        </div>
    </div>
</section>
