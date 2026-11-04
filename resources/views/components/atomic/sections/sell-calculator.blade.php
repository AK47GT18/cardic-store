{{-- ============================================================
     SECTION 6: CUSTOMER REVIEWS & BUYER ASSURANCE FAQ
     Buyer-focused testimonials and purchase guarantee answers
     ============================================================ --}}
<section id="faq" class="bg-[#F8FAFC] py-20 sm:py-24 border-b border-slate-200/80 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        {{-- Testimonial / Brand Trust Composite Card --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch mb-20">

            {{-- Left: Quote Card with Verified Buyer --}}
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    {{-- Star Rating Badge --}}
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        @for($i = 0; $i < 5; $i++)
                            <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                        <span class="text-xs font-bold text-slate-500 ml-2">5.0 / 5.0 Rating</span>
                    </div>

                    <p class="font-headline font-semibold text-lg sm:text-2xl text-[#0F172A] leading-relaxed tracking-tight">
                        “Cardic Store is the fastest and most reliable place I’ve found to buy discounted digital gift cards. Purchased a $100 Steam and $50 Apple card, and both redemption codes were displayed on my screen in under 30 seconds. Flawless experience.”
                    </p>
                </div>

                {{-- Author row with avatar --}}
                <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-11 h-11 rounded-full bg-[#0F172A] text-white flex items-center justify-center font-extrabold text-sm">
                            MV
                        </div>
                        <div>
                            <div class="text-sm font-extrabold text-[#0F172A]">Marcus Vance</div>
                            <div class="text-xs text-slate-500 font-medium">Verified Customer — 34 Purchases</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 text-emerald-600 font-bold text-xs">
                        <span class="material-symbols-outlined text-base">verified</span>
                        <span>Verified Buyer</span>
                    </div>
                </div>
            </div>

            {{-- Right: Photography Card with Buyer Metric --}}
            <div class="lg:col-span-5 relative h-80 lg:h-auto rounded-3xl overflow-hidden shadow-sm border border-slate-200">
                <img 
                    src="{{ asset('images/xbox.jpg') }}" 
                    alt="Instant gift card delivery" 
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#091524]/85 via-[#091524]/20 to-transparent flex items-end p-8 text-white">
                    <div>
                        <div class="text-xs text-[#38BDF8] font-bold uppercase tracking-wider">Zero Chargeback Friction</div>
                        <div class="font-headline font-extrabold text-xl sm:text-2xl mt-1">Over 25,000+ Verified Codes Delivered</div>
                        <div class="text-xs text-slate-300 mt-1">Backed by instant balance confirmation and 100% money-back warranty.</div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Frequently Asked Questions for Buyers (Replaced Sell Calculator) --}}
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-wider text-[#2563EB]">Buyer Assistance</span>
            <h3 class="font-headline font-extrabold text-3xl sm:text-4xl text-[#0F172A] tracking-tight mt-1">
                Frequently Asked Questions
            </h3>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">
                Everything you need to know about purchasing and redeeming digital gift cards on Cardic Store.
            </p>
        </div>

        <div class="max-w-4xl mx-auto space-y-4" x-data="{ openFaq: 1 }">

            <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-sm">
                <button
                    type="button"
                    @click="openFaq = openFaq === 1 ? null : 1"
                    class="w-full text-left px-6 py-4 flex items-center justify-between font-bold text-[#0F172A] text-sm sm:text-base cursor-pointer">
                    <span>How quickly will I receive my digital gift card?</span>
                    <span class="material-symbols-outlined text-slate-400 transition-transform duration-200"
                          :class="openFaq === 1 ? 'rotate-180 text-[#2563EB]' : ''">expand_more</span>
                </button>
                <div x-show="openFaq === 1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Your code is revealed instantly on screen as soon as your checkout is confirmed, typically in under 45 seconds. A confirmation email with your encrypted voucher key is also dispatched immediately.
                </div>
            </div>

            <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-sm">
                <button
                    type="button"
                    @click="openFaq = openFaq === 2 ? null : 2"
                    class="w-full text-left px-6 py-4 flex items-center justify-between font-bold text-[#0F172A] text-sm sm:text-base cursor-pointer">
                    <span>What is the Cardic Escrow Protection guarantee?</span>
                    <span class="material-symbols-outlined text-slate-400 transition-transform duration-200"
                          :class="openFaq === 2 ? 'rotate-180 text-[#2563EB]' : ''">expand_more</span>
                </button>
                <div x-show="openFaq === 2" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Every digital code on Cardic Store is pre-verified directly against the brand's balance API before delivery. In the rare event of an issue, our 100% escrow balance guarantee provides an instant replacement or full refund.
                </div>
            </div>

            <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-sm">
                <button
                    type="button"
                    @click="openFaq = openFaq === 3 ? null : 3"
                    class="w-full text-left px-6 py-4 flex items-center justify-between font-bold text-[#0F172A] text-sm sm:text-base cursor-pointer">
                    <span>What payment methods can I use to buy?</span>
                    <span class="material-symbols-outlined text-slate-400 transition-transform duration-200"
                          :class="openFaq === 3 ? 'rotate-180 text-[#2563EB]' : ''">expand_more</span>
                </button>
                <div x-show="openFaq === 3" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    We accept all major Credit and Debit Cards (Visa, Mastercard, American Express), Apple Pay, Google Pay, and major cryptocurrencies (Bitcoin, USDT, Ethereum) with zero processing fees.
                </div>
            </div>

            <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-sm">
                <button
                    type="button"
                    @click="openFaq = openFaq === 4 ? null : 4"
                    class="w-full text-left px-6 py-4 flex items-center justify-between font-bold text-[#0F172A] text-sm sm:text-base cursor-pointer">
                    <span>Do the digital gift cards expire?</span>
                    <span class="material-symbols-outlined text-slate-400 transition-transform duration-200"
                          :class="openFaq === 4 ? 'rotate-180 text-[#2563EB]' : ''">expand_more</span>
                </button>
                <div x-show="openFaq === 4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Unless specifically specified by a brand (such as promotional event passes), our retail and gaming gift cards have no expiration dates and retain their full face value until redeemed.
                </div>
            </div>

        </div>

    </div>
</section>
