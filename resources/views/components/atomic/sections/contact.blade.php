{{-- ============================================================
     SECTION F: CONTACT — 24/7 support desk + inquiry form
     ============================================================ --}}
<section id="contact" class="bg-[#f4f5f0] py-20 border-b border-stone-200/60 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            {{-- Left: Contact info --}}
            <div>
                <div class="flex items-center gap-1.5 text-xs font-bold text-[#3d7a1a] uppercase tracking-widest mb-2">
                    <span class="text-[#96f238]">★</span>
                    <span>Contact &amp; Support</span>
                </div>
                <h2 class="font-headline font-extrabold text-3xl sm:text-4xl text-[#0b1c30] tracking-tight">
                    24/7 Global Gift Card<br>Support Desk
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 max-w-md">
                    Have a question about digital code delivery, bulk corporate gift cards, or escrow redemption? Our support desk responds in under 120 seconds.
                </p>

                <div class="mt-6 space-y-3 text-xs text-slate-700 font-semibold">
                    <div class="flex items-center gap-3">
                        <span class="w-9 h-9 rounded-xl bg-[#96f238] text-[#08261e] flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-base">mail</span>
                        </span>
                        <span>support@cardicstore.com</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-9 h-9 rounded-xl bg-[#96f238] text-[#08261e] flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-base">support_agent</span>
                        </span>
                        <span>Live Priority Chat: 24/7/365</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-9 h-9 rounded-xl bg-[#96f238] text-[#08261e] flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-base">verified</span>
                        </span>
                        <span>100% Monetary Balance Warranty</span>
                    </div>
                </div>
            </div>

            {{-- Right: Contact form card --}}
            <div class="bg-white rounded-3xl p-8 border border-stone-200 shadow-sm" x-data="{ sent: false }">
                <div x-show="!sent">
                    <h3 class="text-lg font-extrabold text-[#0b1c30] mb-1">Message Customer Support</h3>
                    <p class="text-xs text-slate-500 mb-5">An on-duty customer service representative will answer your gift card inquiry immediately.</p>

                    <form @submit.prevent="sent = true; showToast('Message dispatched to support team!', 'mail')" class="space-y-3">
                        <div>
                            <label class="text-[11px] font-bold text-slate-600 block mb-1">Your Name:</label>
                            <input type="text" required placeholder="Alex Turner"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 outline-none focus:ring-2 focus:ring-[#96f238]">
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-600 block mb-1">Email Address:</label>
                            <input type="email" required placeholder="alex@example.com"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 outline-none focus:ring-2 focus:ring-[#96f238]">
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-600 block mb-1">Brand or Inquiry Details:</label>
                            <textarea rows="3" required placeholder="Describe the gift cards you wish to buy or sell..."
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 outline-none focus:ring-2 focus:ring-[#96f238]"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#08231a] hover:bg-[#0c362b] text-white font-extrabold py-3 rounded-xl text-xs shadow-md transition-colors cursor-pointer">
                            Dispatch to Support Desk
                        </button>
                    </form>
                </div>

                <div x-show="sent" class="text-center py-10" style="display: none;">
                    <span class="material-symbols-outlined text-5xl text-[#3d7a1a] mb-3">check_circle</span>
                    <h4 class="text-base font-extrabold text-[#0b1c30]">Message Received!</h4>
                    <p class="text-xs text-slate-500 mt-1">Our gift card desk will contact you within minutes.</p>
                </div>
            </div>

        </div>
    </div>
</section>

