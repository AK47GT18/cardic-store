{{-- ============================================================
     SECTION 2: 3-CARD ROW — Buyer Benefits
     Heading: "More Value · More Security / Experience the future of..."
     Row with 3 Cards: Left image card with gauge + 2 clean buyer value cards
     ============================================================ --}}
<section id="features" class="bg-white py-20 sm:py-24 border-b border-slate-100 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        {{-- Centered Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-16">
            <div class="text-xs font-bold uppercase tracking-wider text-[#2563EB] mb-2">
                More Savings · More Security
            </div>
            <h2 class="font-headline font-extrabold text-3xl sm:text-4xl text-[#0F172A] tracking-tight leading-tight">
                Experience the future<br>of gift card shopping.
            </h2>
        </div>

        {{-- 3 Rounded Cards Row --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">

            {{-- Card 1: Rich Photo Card with Radial Meter --}}
            <div class="relative h-96 rounded-3xl overflow-hidden p-7 flex flex-col justify-between text-white shadow-lg group">
                <img 
                    src="{{ asset('images/giftcard.jpg') }}" 
                    alt="Digital gift card fulfillment" 
                    class="absolute inset-0 w-full h-full object-cover brightness-[0.38] contrast-110 group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0F172A] via-transparent to-transparent"></div>

                <div class="relative z-10">
                    <span class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-white">
                        Instant Fulfillment
                    </span>
                    <h3 class="font-headline font-extrabold text-xl text-white mt-4">
                        Automated Balance Verification Network
                    </h3>
                </div>

                <div class="relative z-10 flex items-end justify-between">
                    <div>
                        <div class="text-xs text-slate-300">Avg. Delivery Speed</div>
                        <div class="font-headline font-extrabold text-3xl text-[#38BDF8]">43s <span class="text-xs font-normal text-slate-300">SLA</span></div>
                    </div>

                    {{-- Semi-Circle Radial Speedometer --}}
                    <div class="w-16 h-16 rounded-full border-4 border-white/20 border-t-[#38BDF8] border-r-[#38BDF8] flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg text-[#38BDF8]">bolt</span>
                    </div>
                </div>
            </div>

            {{-- Card 2: Light Clean Card (Escrow Protection) --}}
            <div class="bg-[#F8FAFC] rounded-3xl p-8 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center mb-8 border border-[#DBEAFE]">
                        <span class="material-symbols-outlined text-2xl">verified_user</span>
                    </div>

                    <h3 class="font-headline font-extrabold text-xl text-[#0F172A] mb-3">
                        100% Escrow Protected
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Every purchase is held in automated escrow until the code is verified active by the customer. Zero risk of duplicate codes, fraudulent charges, or deactivated gift vouchers.
                    </p>
                </div>

                <div class="pt-6 border-t border-slate-200/60 mt-6 flex items-center justify-between">
                    <span class="text-xs font-bold text-[#2563EB]">Buyer Escrow Guarantee</span>
                    <span class="material-symbols-outlined text-sm text-[#2563EB]">check_circle</span>
                </div>
            </div>

            {{-- Card 3: Light Clean Card (Buyer Savings & Discounts) --}}
            <div class="bg-[#F8FAFC] rounded-3xl p-8 border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center mb-8 border border-[#DBEAFE]">
                        <span class="material-symbols-outlined text-2xl">price_check</span>
                    </div>

                    <h3 class="font-headline font-extrabold text-xl text-[#0F172A] mb-3">
                        Up to 12% Instant Savings
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Enjoy deep discounts on top retail, gaming, and entertainment vouchers. Pay easily via Debit/Credit Cards, Apple Pay, Google Pay, or cryptocurrency with zero checkout fees.
                    </p>
                </div>

                <div class="pt-6 border-t border-slate-200/60 mt-6 flex items-center justify-between">
                    <span class="text-xs font-bold text-[#2563EB]">Instant Digital Delivery</span>
                    <span class="material-symbols-outlined text-sm text-[#2563EB]">bolt</span>
                </div>
            </div>

        </div>

    </div>
</section>
