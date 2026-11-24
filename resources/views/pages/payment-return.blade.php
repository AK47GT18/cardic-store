<x-layouts.app :title="'Order Confirmation — Cardic Store'">
    <main class="min-h-screen bg-[#f8f9ff] py-16 sm:py-24 px-4 sm:px-6">
        <div class="max-w-2xl mx-auto">
            @if($order && $order->payment_status === 'paid')
                <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-200/80 text-center">
                    <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-3xl">verified</span>
                    </div>

                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                        Escrow Settlement Confirmed
                    </span>

                    <h1 class="font-headline font-black text-2xl sm:text-3xl text-[#0b1c30] mt-3">
                        Thank you for your order!
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-2 max-w-md mx-auto">
                        Your transaction has been confirmed and verified. A receipt and claim key have been dispatched to <strong class="text-slate-800">{{ $order->customer_email }}</strong>.
                    </p>

                    {{-- Voucher Claim Card --}}
                    <div class="mt-8 bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-dashed border-blue-400 rounded-2xl p-6 sm:p-8">
                        <div class="text-[11px] font-extrabold uppercase tracking-widest text-[#0037b0]">
                            Your Instant Claim Code
                        </div>
                        <div class="text-2xl sm:text-3xl font-mono font-black text-[#0037b0] my-3 tracking-wider select-all">
                            {{ $order->voucher_code }}
                        </div>
                        <p class="text-xs text-slate-600">
                            🔒 100% Guaranteed Balance &bull; Instantly Redeemable Worldwide
                        </p>
                    </div>

                    {{-- Details Table --}}
                    <div class="mt-8 bg-slate-50 rounded-2xl p-6 text-left space-y-3 text-xs sm:text-sm">
                        <div class="flex justify-between text-slate-600">
                            <span>Order Reference:</span>
                            <span class="font-bold text-slate-900">{{ $order->order_id }}</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Payment Reference:</span>
                            <span class="font-mono text-slate-900">{{ $order->tx_ref }}</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Amount Paid:</span>
                            <span class="font-extrabold text-[#0037b0]">MK {{ number_format($order->total_mwk, 0) }} (${{ number_format($order->total_usd, 2) }})</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Payment Rail:</span>
                            <span class="font-bold uppercase text-slate-900">{{ $order->payment_method }} (PayChangu)</span>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                        <a href="{{ route('marketplace') }}" class="w-full sm:w-auto px-8 py-3.5 bg-[#0037b0] hover:bg-[#1d4ed8] text-white text-xs sm:text-sm font-bold rounded-full transition-all shadow-md">
                            Continue Shopping &rarr;
                        </a>
                        <a href="{{ route('home') }}" class="w-full sm:w-auto px-8 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs sm:text-sm font-bold rounded-full transition-all">
                            Back to Home
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-200/80 text-center">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-3xl animate-spin">sync</span>
                    </div>

                    <h1 class="font-headline font-black text-2xl sm:text-3xl text-[#0b1c30]">
                        Processing Mobile Money Settlement
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-2 max-w-md mx-auto">
                        Please check your phone for the USSD prompt to authorize your PIN. Once authorized, your code will unlock automatically and be emailed to you.
                    </p>

                    <div class="mt-8 p-4 bg-slate-50 rounded-xl text-xs font-mono text-slate-600">
                        Reference: {{ $txRef ?? 'N/A' }}
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('marketplace') }}" class="inline-block px-8 py-3.5 bg-[#0037b0] text-white text-xs sm:text-sm font-bold rounded-full">
                            Return to Store &rarr;
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </main>
</x-layouts.app>
