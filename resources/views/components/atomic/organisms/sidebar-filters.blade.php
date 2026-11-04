@props([
    'categories' => [],
    'regions' => [],
])

<aside class="flex flex-col gap-5">
    <div class="bg-white rounded-2xl p-5 shadow-xs border border-slate-100 flex flex-col gap-6">
        {{-- Header & Reset --}}
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <span class="text-base font-extrabold text-[#0b1c30] flex items-center gap-2">
                <span class="material-symbols-outlined text-[#1d4ed8] text-xl">tune</span> 
                Filters
            </span>
            <button 
                type="button"
                @click="resetFilters()"
                class="text-xs text-[#1d4ed8] hover:text-[#0037b0] font-bold cursor-pointer">
                Reset All
            </button>
        </div>

        {{-- Categories Filter --}}
        <div class="flex flex-col gap-2">
            <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-wider text-slate-400">
                <span>Categories</span>
            </div>
            <div class="space-y-1">
                @foreach($categories as $cat)
                    <button 
                        type="button"
                        @click="selectedCategory = '{{ $cat['id'] }}'; applyFilter()"
                        :class="selectedCategory === '{{ $cat['id'] }}'
                            ? 'bg-[#eff4ff] text-[#0037b0] font-bold'
                            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium'"
                        class="w-full flex items-center justify-between p-2 rounded-xl text-xs transition-colors duration-150 cursor-pointer text-left">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm text-slate-400">{{ $cat['icon'] }}</span>
                            <span>{{ $cat['name'] }}</span>
                        </span>
                        <span class="text-[11px] text-slate-400 font-semibold">{{ $cat['count'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Region / Currency Filter --}}
        <div class="flex flex-col gap-2 pt-2 border-t border-slate-100">
            <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-wider text-slate-400">
                <span>Region / Currency</span>
            </div>
            <div class="space-y-1">
                @foreach($regions as $r)
                    <label class="flex items-center gap-2.5 p-2 rounded-xl hover:bg-slate-50 cursor-pointer text-xs font-medium text-slate-700 transition-colors">
                        <input 
                            type="radio" 
                            name="sidebar_region" 
                            value="{{ $r['code'] }}"
                            x-model="selectedRegion"
                            @change="applyFilter()"
                            class="text-[#1d4ed8] focus:ring-0 accent-[#1d4ed8]">
                        <span class="flex-1 flex items-center gap-1.5">
                            <span>{{ $r['flag'] }}</span>
                            <span>{{ $r['name'] }}</span>
                        </span>
                        <span class="text-[11px] text-slate-400 font-semibold">{{ $r['count'] }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Discount Savings Yield Range --}}
        <div class="flex flex-col gap-2 pt-2 border-t border-slate-100">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Discount Savings</span>
            <div class="grid grid-cols-2 gap-1.5">
                <button 
                    type="button"
                    @click="discountFilter = 'all'; applyFilter()"
                    :class="discountFilter === 'all' ? 'bg-[#1d4ed8] text-white font-bold shadow-xs' : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                    class="py-2 rounded-xl text-xs text-center transition-colors">
                    All Deals
                </button>
                <button 
                    type="button"
                    @click="discountFilter = 'up5'; applyFilter()"
                    :class="discountFilter === 'up5' ? 'bg-[#1d4ed8] text-white font-bold shadow-xs' : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                    class="py-2 rounded-xl text-xs text-center transition-colors">
                    Up to 5% off
                </button>
                <button 
                    type="button"
                    @click="discountFilter = '5-10'; applyFilter()"
                    :class="discountFilter === '5-10' ? 'bg-[#1d4ed8] text-white font-bold shadow-xs' : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                    class="py-2 rounded-xl text-xs text-center transition-colors">
                    5% – 10% off
                </button>
                <button 
                    type="button"
                    @click="discountFilter = '10plus'; applyFilter()"
                    :class="discountFilter === '10plus' ? 'bg-[#1d4ed8] text-white font-bold shadow-xs' : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                    class="py-2 rounded-xl text-xs text-center transition-colors">
                    10%+ off 🔥
                </button>
            </div>
        </div>

        {{-- Denomination Range --}}
        <div class="flex flex-col gap-2 pt-2 border-t border-slate-100">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Face Value Range</span>
            <div class="flex flex-col gap-2">
                <label class="flex items-center gap-2.5 text-xs text-slate-700 cursor-pointer">
                    <input type="checkbox" checked class="rounded text-[#1d4ed8] accent-[#1d4ed8]">
                    <span>$10 – $25 USD</span>
                </label>
                <label class="flex items-center gap-2.5 text-xs text-slate-700 cursor-pointer">
                    <input type="checkbox" checked class="rounded text-[#1d4ed8] accent-[#1d4ed8]">
                    <span>$25 – $50 USD</span>
                </label>
                <label class="flex items-center gap-2.5 text-xs text-slate-700 cursor-pointer">
                    <input type="checkbox" checked class="rounded text-[#1d4ed8] accent-[#1d4ed8]">
                    <span>$50 – $100 USD</span>
                </label>
                <label class="flex items-center gap-2.5 text-xs text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded text-[#1d4ed8] accent-[#1d4ed8]">
                    <span>$100 – $500 USD</span>
                </label>
            </div>
        </div>

        {{-- Delivery & Payment Mode --}}
        <div class="flex flex-col gap-2 pt-2 border-t border-slate-100">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Delivery & Payment</span>
            <div class="space-y-2">
                <div class="flex items-center justify-between p-2.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-800">
                    <span class="flex items-center gap-2 text-xs font-bold">
                        <span class="material-symbols-outlined text-sm text-emerald-600">bolt</span>
                        Instant Delivery (&lt;60s)
                    </span>
                    <input type="checkbox" checked class="rounded text-emerald-600 accent-emerald-600">
                </div>
                <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-slate-700">
                    <span class="flex items-center gap-2 text-xs font-semibold">
                        <span class="material-symbols-outlined text-sm text-amber-600">currency_bitcoin</span>
                        Crypto Accepted
                    </span>
                    <input type="checkbox" checked class="rounded text-[#1d4ed8] accent-[#1d4ed8]">
                </div>
            </div>
        </div>

        {{-- Customer Rating Filter --}}
        <div class="flex flex-col gap-2 pt-2 border-t border-slate-100">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Customer Rating</span>
            <div class="space-y-1">
                <label class="flex items-center gap-2 text-xs font-medium text-slate-700 cursor-pointer p-1 rounded-lg hover:bg-slate-50">
                    <input type="radio" name="min_rating" value="4.5" x-model="minRatingFilter" @change="applyFilter()" class="accent-[#1d4ed8]">
                    <span class="flex items-center text-amber-500 font-bold gap-1">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        4.5 & above
                    </span>
                </label>
                <label class="flex items-center gap-2 text-xs font-medium text-slate-700 cursor-pointer p-1 rounded-lg hover:bg-slate-50">
                    <input type="radio" name="min_rating" value="4.0" x-model="minRatingFilter" @change="applyFilter()" class="accent-[#1d4ed8]">
                    <span class="flex items-center text-amber-500 font-bold gap-1">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        4.0 & above
                    </span>
                </label>
            </div>
        </div>
    </div>

    {{-- Corporate Wholesale Promo Widget --}}
    <div class="bg-gradient-to-br from-[#0037b0] to-[#1d4ed8] rounded-2xl p-5 text-white shadow-md relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
        <span class="material-symbols-outlined text-2xl text-[#76eab6] mb-2">domain</span>
        <div class="text-base font-extrabold leading-tight">Buying Bulk for Business?</div>
        <p class="text-xs text-blue-100 mt-1 leading-relaxed">
            Unlock volume tier discounts up to 18% off with automated corporate API endpoints, multi-sig escrow, and invoice terms.
        </p>
        <a href="{{ route('corporate') }}" 
           class="mt-4 w-full bg-white text-[#0037b0] hover:bg-blue-50 font-bold text-xs py-2.5 rounded-xl shadow-xs transition-all text-center block">
            Inquire Corporate Sales
        </a>
    </div>
</aside>

