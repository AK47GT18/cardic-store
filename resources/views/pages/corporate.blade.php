<x-layouts.app title="Bulk & Corporate — Cardic Store Institutional Liquidity">
    <div class="pt-[100px]">
    <main class="w-full bg-[#f8f9ff] min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-1.5 text-xs text-slate-500 mb-6">
                <a href="{{ route('marketplace') }}" class="hover:text-[#1d4ed8]">Home</a>
                <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
                <span class="text-[#0b1c30] font-bold">Bulk & Corporate Wholesale</span>
            </nav>

            {{-- Hero Section --}}
            <div class="text-center max-w-3xl mx-auto mb-14">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-blue-100 text-[#0037b0] text-xs font-bold mb-3 uppercase tracking-wider">
                    <span class="material-symbols-outlined text-sm">domain</span>
                    Enterprise & Wholesale API
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-[#0b1c30] tracking-tight leading-tight">
                    Institutional Wholesale & <br><span class="text-[#1d4ed8]">Automated API Delivery</span>
                </h1>
                <p class="text-sm sm:text-base text-slate-600 mt-3 leading-relaxed">
                    Scale employee rewards, loyalty incentive cashouts, and high-volume corporate disbursements. Access up to 18% bulk discounts and zero-latency REST / Webhook endpoints.
                </p>
            </div>

            {{-- Wholesale Tier Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                @foreach($tiers as $tier)
                    <div class="bg-white rounded-3xl p-8 border {{ $tier['popular'] ? 'border-2 border-[#1d4ed8] shadow-xl relative' : 'border-slate-100 shadow-sm' }} flex flex-col justify-between">
                        @if($tier['popular'])
                            <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#1d4ed8] text-white text-[11px] font-extrabold uppercase tracking-wider px-3.5 py-1 rounded-full shadow-xs">
                                Most Popular Wholesale
                            </div>
                        @endif

                        <div>
                            <h3 class="text-xl font-extrabold text-[#0b1c30]">{{ $tier['name'] }}</h3>
                            <div class="text-xs font-bold text-slate-400 mt-0.5">{{ $tier['volume'] }}</div>

                            <div class="mt-6 pb-6 border-b border-slate-100">
                                <span class="text-3xl font-extrabold text-[#0037b0]">{{ $tier['discount'] }}</span>
                                <span class="text-xs text-slate-500 block mt-1">Direct from institutional liquidity pool</span>
                            </div>

                            <ul class="mt-6 space-y-3.5 text-xs text-slate-600">
                                <li class="flex items-center gap-2.5">
                                    <span class="material-symbols-outlined text-emerald-600 text-base">check_circle</span>
                                    <span>{{ $tier['api'] }}</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="material-symbols-outlined text-emerald-600 text-base">check_circle</span>
                                    <span>{{ $tier['escrow'] }}</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="material-symbols-outlined text-emerald-600 text-base">check_circle</span>
                                    <span>{{ $tier['support'] }}</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="material-symbols-outlined text-emerald-600 text-base">check_circle</span>
                                    <span>Custom Regional Denominations</span>
                                </li>
                            </ul>
                        </div>

                        <a href="#inquiry-form" class="mt-8 w-full {{ $tier['popular'] ? 'bg-[#1d4ed8] hover:bg-[#0037b0] text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800' }} font-bold py-3 rounded-2xl text-xs text-center transition-colors block">
                            Request Wholesale Access
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Inquiry Form Section --}}
            <div id="inquiry-form" 
                 x-data="{
                     submitted: false,
                     email: '',
                     company: '',
                     volume: '$25,000 – $100,000 / mo',
                     submitInquiry() {
                         if (!this.email) return;
                         this.submitted = true;
                     }
                 }"
                 class="max-w-3xl mx-auto bg-white rounded-3xl p-8 sm:p-12 shadow-lg border border-slate-100 mb-16">
                
                <div x-show="!submitted">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-extrabold text-[#0b1c30]">Inquire for Corporate Wholesale</h2>
                        <p class="text-xs text-slate-500 mt-1">Our sales engineering team provides full API sandbox credentials within 2 business hours.</p>
                    </div>

                    <form @submit.prevent="submitInquiry()" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1">Company / Organization Name:</label>
                                <input type="text" x-model="company" placeholder="Acme Technologies Corp." class="w-full bg-[#eff4ff] border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-900 outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1">Corporate Email:</label>
                                <input type="email" required x-model="email" placeholder="finance@acme.com" class="w-full bg-[#eff4ff] border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-900 outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20">
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1">Estimated Monthly Volume:</label>
                            <select x-model="volume" class="w-full bg-[#eff4ff] border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-900 outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20">
                                <option>$5,000 – $25,000 / month</option>
                                <option selected>$25,000 – $100,000 / month</option>
                                <option>$100,000+ / month (Enterprise)</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1">Integration Scope / Requirements:</label>
                            <textarea rows="3" placeholder="Tell us about the brands you require, payment terms, or custom webhook specifications..." class="w-full bg-[#eff4ff] border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-900 outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#1d4ed8] hover:bg-[#0037b0] text-white font-bold py-3.5 rounded-2xl text-xs sm:text-sm shadow-md transition-colors cursor-pointer">
                            Submit Corporate Inquiry
                        </button>
                    </form>
                </div>

                <div x-show="submitted" class="text-center py-8" style="display: none;">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-3xl font-bold">check</span>
                    </div>
                    <h3 class="text-xl font-extrabold text-[#0b1c30]">Inquiry Dispatched to Institutional Desk!</h3>
                    <p class="text-xs text-slate-600 mt-2 max-w-sm mx-auto">
                        We have received your corporate inquiry for <span class="font-bold text-slate-800" x-text="company || 'your company'"></span>. An assigned relationship manager will contact <span class="font-bold text-slate-800" x-text="email"></span> with sandbox documentation shortly.
                    </p>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>


