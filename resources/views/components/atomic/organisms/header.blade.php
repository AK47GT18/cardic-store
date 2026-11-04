@props(['currencies' => []])

<header
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    x-data="{ scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 30 })">

    {{-- Top Slim Utility Bar --}}
    <div class="bg-[#0F172A] text-white px-4 sm:px-8 h-8 flex items-center justify-between text-xs ">
        <div class="flex items-center gap-3 truncate text-[11px]">
            <span class="flex items-center gap-1.5 text-[#38BDF8] font-semibold">
                <span class="w-1.5 h-1.5 rounded-full bg-[#38BDF8] animate-pulse"></span>
                <span>Verified Escrow Protocol Active</span>
            </span>
            <span class="hidden md:inline text-slate-500">·</span>
            <span class="hidden md:inline text-slate-300">Instant Delivery Guaranteed</span>
            <span class="hidden md:inline text-slate-500">·</span>
            <a href="mailto:support@cardicstore.com" class="hidden md:flex items-center gap-1 text-slate-300 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-xs">mail</span>
                <span>support@cardicstore.com</span>
            </a>
        </div>

        <div class="flex items-center gap-4 shrink-0 text-xs">
            {{-- Currency Picker --}}
            <div class="relative" x-data="{ open: false }">
                <button
                    type="button"
                    @click="open = !open"
                    class="flex items-center gap-1 text-slate-300 hover:text-white transition-colors focus:outline-none cursor-pointer text-[11px] font-semibold">
                    <span class="material-symbols-outlined text-xs">payments</span>
                    <span x-text="currentCurrency">USD ($)</span>
                    <span class="material-symbols-outlined text-[10px]">expand_more</span>
                </button>
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 top-full mt-1.5 w-32 bg-[#0F172A] border border-slate-700/80 rounded-xl shadow-2xl py-1 z-50">
                    <button type="button" @click="setCurrency('USD', '$', 1.0); open = false"
                        class="w-full text-left px-3 py-1.5 text-xs hover:bg-white/10 flex items-center justify-between text-white">
                        <span>USD ($)</span>
                        <span x-show="currentCurrency === 'USD'" class="text-[#38BDF8]">✓</span>
                    </button>
                    <button type="button" @click="setCurrency('EUR', '€', 0.92); open = false"
                        class="w-full text-left px-3 py-1.5 text-xs hover:bg-white/10 flex items-center justify-between text-white">
                        <span>EUR (€)</span>
                        <span x-show="currentCurrency === 'EUR'" class="text-[#38BDF8]">✓</span>
                    </button>
                    <button type="button" @click="setCurrency('GBP', '£', 0.79); open = false"
                        class="w-full text-left px-3 py-1.5 text-xs hover:bg-white/10 flex items-center justify-between text-white">
                        <span>GBP (£)</span>
                        <span x-show="currentCurrency === 'GBP'" class="text-[#38BDF8]">✓</span>
                    </button>
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-2.5 text-slate-400 text-[11px]">
                <a href="#" class="hover:text-white transition-colors">Twitter</a>
                <span>·</span>
                <a href="#" class="hover:text-white transition-colors">Telegram</a>
                <span>·</span>
                <a href="#" class="hover:text-white transition-colors">Discord</a>
            </div>
        </div>
    </div>

    {{-- Main Navbar (Solid deep navy #06111E, never transparent) --}}
    <div class="bg-[#06111E] border-b border-slate-800 shadow-md">
        <div class="h-14 sm:h-16 max-w-7xl mx-auto px-4 sm:px-8 flex items-center justify-between gap-6">

            {{-- Logo --}}
            <div class="shrink-0 flex items-center">
                <x-atomic.atoms.logo size="md" variant="white" />
            </div>

            {{-- Nav Links --}}
            <nav class="hidden md:flex items-center gap-7 text-xs sm:text-sm font-semibold tracking-wide text-slate-200">
                <a href="{{ route('home') }}"
                   class="hover:text-[#38BDF8] transition-colors {{ request()->routeIs('home') ? 'text-[#38BDF8] font-bold' : '' }}">
                    Home
                </a>
                <a href="{{ route('marketplace') }}"
                   class="hover:text-[#38BDF8] transition-colors {{ request()->routeIs('marketplace') || request()->routeIs('cards.*') ? 'text-[#38BDF8] font-bold' : '' }}">
                    Gift Cards
                </a>
                <a href="{{ route('about') }}"
                   class="hover:text-[#38BDF8] transition-colors {{ request()->routeIs('about') ? 'text-[#38BDF8] font-bold' : '' }}">
                    About Us
                </a>
                <a href="{{ route('how-it-works') }}"
                   class="hover:text-[#38BDF8] transition-colors {{ request()->routeIs('how-it-works') ? 'text-[#38BDF8] font-bold' : '' }}">
                    How It Works
                </a>
                <a href="{{ route('contact') }}"
                   class="hover:text-[#38BDF8] transition-colors {{ request()->routeIs('contact') ? 'text-[#38BDF8] font-bold' : '' }}">
                    Contact Us
                </a>
            </nav>

            {{-- Right Controls: Search, Wishlist, Cart, CTA --}}
            <div class="flex items-center gap-2.5 sm:gap-3 shrink-0">

                {{-- Compact Search Input --}}
                <div class="hidden lg:flex items-center w-44 xl:w-48">
                    <div class="relative w-full flex items-center rounded-full px-3 py-1.5 gap-2 transition-all border border-slate-700/80 bg-slate-900/90 focus-within:border-[#38BDF8]">
                        <span class="material-symbols-outlined text-slate-400 text-sm">search</span>
                        <input
                            type="text"
                            x-model="searchQuery"
                            @input.debounce.300ms="applyFilter()"
                            placeholder="Search cards..."
                            class="w-full bg-transparent border-none outline-none text-xs font-medium text-white placeholder:text-slate-400">
                    </div>
                </div>

                {{-- Wishlist --}}
                <button
                    type="button"
                    @click="openWishlist = true"
                    class="relative p-2 rounded-full text-slate-300 hover:text-white hover:bg-white/10 transition-colors cursor-pointer"
                    title="Wishlist">
                    <span class="material-symbols-outlined text-xl">favorite</span>
                    <span
                        x-show="wishlist.length > 0"
                        x-text="wishlist.length"
                        class="absolute top-0.5 right-0.5 bg-rose-500 text-white text-[9px] font-extrabold rounded-full w-4 h-4 flex items-center justify-center">
                    </span>
                </button>

                {{-- Cart Button --}}
                <button
                    type="button"
                    @click="cartOpen = true"
                    class="relative p-2 rounded-full text-slate-300 hover:text-white hover:bg-white/10 transition-colors cursor-pointer flex items-center justify-center"
                    title="Shopping Cart">
                    <span class="material-symbols-outlined text-xl">shopping_bag</span>
                    <span
                        x-show="cartTotalCount > 0"
                        x-text="cartTotalCount"
                        class="absolute top-0.5 right-0.5 bg-[#2563EB] text-white text-[9px] font-extrabold rounded-full w-4 h-4 flex items-center justify-center">
                    </span>
                </button>

                {{-- Shop Cards CTA --}}
                <a href="{{ route('marketplace') }}"
                   class="hidden sm:inline-flex items-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-bold px-4 py-2 rounded-full transition-all duration-200 active:scale-95 shadow-sm">
                    <span>Shop Cards</span>
                    <span class="material-symbols-outlined text-xs font-bold">arrow_forward</span>
                </a>

                {{-- Mobile hamburger --}}
                <button
                    type="button"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="md:hidden p-1.5 rounded-lg text-white hover:bg-white/10 focus:outline-none">
                    <span class="material-symbols-outlined text-2xl" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Drawer --}}
    <div
        x-show="mobileMenuOpen"
        x-transition
        class="md:hidden bg-[#0F172A] border-b border-slate-700 px-5 py-4 flex flex-col gap-1 shadow-2xl">

        <div class="relative flex items-center bg-slate-800 rounded-xl px-3 py-2 mb-2 border border-slate-700">
            <span class="material-symbols-outlined text-slate-400 text-sm mr-2">search</span>
            <input
                type="text"
                x-model="searchQuery"
                @input.debounce.300ms="applyFilter()"
                placeholder="Search cards..."
                class="w-full bg-transparent border-none outline-none text-xs text-white placeholder:text-slate-400">
        </div>

        @foreach([
            ['href' => route('home'),        'label' => 'Home'],
            ['href' => route('marketplace'), 'label' => 'Gift Cards'],
            ['href' => route('cart'),        'label' => 'My Cart'],
            ['href' => route('about'),       'label' => 'About Us'],
            ['href' => route('how-it-works'), 'label' => 'How It Works'],
            ['href' => route('contact'),      'label' => 'Contact Us'],
        ] as $item)
        <a @click="mobileMenuOpen = false"
           href="{{ $item['href'] }}"
           class="py-2.5 px-2 text-sm font-semibold text-white hover:text-[#38BDF8] border-b border-slate-800 transition-colors">
            {{ $item['label'] }}
        </a>
        @endforeach
    </div>
</header>
