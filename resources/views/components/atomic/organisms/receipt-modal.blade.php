<div 
    x-show="receiptModalOpen" 
    class="fixed inset-0 z-50 flex items-center justify-center p-4" 
    style="display: none;"
    x-transition>
    
    {{-- Backdrop --}}
    <div 
        @click="receiptModalOpen = false" 
        class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity">
    </div>

    {{-- Content Card --}}
    <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-100 z-10 text-center">
        {{-- Success animated icon --}}
        <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-4 ring-8 ring-emerald-50">
            <span class="material-symbols-outlined text-3xl font-bold">check</span>
        </div>

        <div class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-800 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
            <span class="material-symbols-outlined text-sm">verified_user</span> Escrow Fulfilled in 38s
        </div>

        <h3 class="text-xl sm:text-2xl font-extrabold text-[#0b1c30]">Order Confirmed & Delivered!</h3>
        <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-sm mx-auto">
            Your cryptographic keys have been authenticated against issuer balance databases and sent to <span class="font-bold text-slate-800" x-text="checkoutEmail || 'your email'"></span>.
        </p>

        {{-- Voucher Key Box --}}
        <div class="mt-6 bg-[#eff4ff] border border-blue-200/80 rounded-2xl p-4 text-left">
            <div class="flex items-center justify-between text-xs text-slate-500 mb-2">
                <span class="font-bold uppercase tracking-wider text-[10px]">Your Digital Claim Key:</span>
                <span class="text-emerald-700 font-bold flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Valid & Active
                </span>
            </div>
            
            <div class="flex items-center justify-between bg-white px-3 py-2.5 rounded-xl border border-slate-200">
                <span class="font-mono text-sm font-bold text-[#0037b0] tracking-wider select-all" x-text="generatedVoucherKey"></span>
                <button 
                    type="button" 
                    @click="copyVoucherKey()"
                    class="text-xs bg-[#1d4ed8] hover:bg-[#0037b0] text-white px-3 py-1.5 rounded-lg font-bold transition-all flex items-center gap-1 cursor-pointer">
                    <span class="material-symbols-outlined text-xs">content_copy</span>
                    <span x-text="copyButtonText">Copy Key</span>
                </button>
            </div>

            <div class="mt-3 grid grid-cols-2 gap-2 text-[11px] text-slate-600 pt-3 border-t border-blue-200/50">
                <div>
                    <span class="text-slate-400 block text-[10px]">Order Reference:</span>
                    <span class="font-bold font-mono text-slate-800" x-text="confirmedOrderId"></span>
                </div>
                <div>
                    <span class="text-slate-400 block text-[10px]">Escrow Warranty:</span>
                    <span class="font-bold text-emerald-700">100% Protected</span>
                </div>
            </div>
        </div>

        {{-- Next Steps Actions --}}
        <div class="mt-6 flex flex-col sm:flex-row gap-2">
            <button 
                type="button" 
                @click="receiptModalOpen = false" 
                class="flex-1 bg-[#1d4ed8] hover:bg-[#0037b0] text-white font-bold py-2.5 rounded-xl text-xs transition-colors cursor-pointer">
                Continue Shopping
            </button>
            <a 
                href="{{ route('how-it-works') }}" 
                class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-4 py-2.5 rounded-xl text-xs transition-colors inline-flex items-center justify-center gap-1">
                <span class="material-symbols-outlined text-sm">help</span>
                Redemption Guide
            </a>
        </div>
    </div>
</div>

