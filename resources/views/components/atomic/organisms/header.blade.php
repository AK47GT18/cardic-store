@props(['currencies' => []])

@php
    $isMainHero = request()->routeIs('home');
    $isSubHero = request()->routeIs('about') || request()->routeIs('how-it-works') || request()->routeIs('contact');
    $isHeroPage = $isMainHero || $isSubHero;
@endphp

<header id="site-header" class="fixed top-0 left-0 right-0 z-50">

    {{-- ── Top Slim Utility Bar (Smooth collapse on scroll, hidden on sub-heroes) ── --}}
    @if(!$isSubHero)
    <div id="top-utility-bar"
         style="max-height: 36px; opacity: 1; transition: max-height 0.25s ease, opacity 0.2s ease; overflow: hidden;"
         class="bg-[#0F172A] text-white px-4 sm:px-8 h-8 flex items-center justify-between text-xs">
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
                    <button type="button" @click="setCurrency('MWK', 'MK ', 1750); open = false"
                        class="w-full text-left px-3 py-1.5 text-xs hover:bg-white/10 flex items-center justify-between text-white">
                        <span>MWK (MK)</span>
                        <span x-show="currentCurrency === 'MWK'" class="text-[#38BDF8]">✓</span>
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
    @endif

    {{-- ── Main Navbar ────────────────────────────────────────── --}}
    <div id="main-nav-bar"
         data-is-hero="{{ $isHeroPage ? 'true' : 'false' }}"
         :class="(mobileMenuOpen || mobileSearchOpen) ? '!bg-white !border-b !border-slate-200 !shadow-sm' : ''"
         style="{{ $isHeroPage ? 'background-color: transparent; border-bottom: none;' : 'background-color: #ffffff; border-bottom: 1px solid #e2e8f0;' }} transition: background-color 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;"
         class="w-full {{ $isHeroPage ? '' : 'bg-white shadow-xs' }}">
        <div class="h-20 sm:h-22 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-3 sm:gap-4 lg:gap-6">

            {{-- Brand Logo --}}
            <a href="{{ route('home') }}" class="shrink-0 flex items-center group transition-transform duration-200 hover:scale-[1.02]">
                {{-- White logo for dark hero at top (hidden if mobile menu or search open) --}}
                <img
                    id="header-logo-white"
                    src="{{ asset('images/logo-white.png') }}"
                    alt="Cardic Store"
                    :class="(mobileMenuOpen || mobileSearchOpen) ? '!hidden' : ''"
                    class="h-9 sm:h-11 md:h-12 w-auto object-contain {{ $isHeroPage ? 'block' : 'hidden' }}">
                {{-- Color logo for light pages, scrolled state, or open mobile menu --}}
                <img
                    id="header-logo-color"
                    src="{{ asset('images/logo-transparent.png') }}"
                    alt="Cardic Store"
                    :class="(mobileMenuOpen || mobileSearchOpen) ? '!block' : ''"
                    class="h-9 sm:h-11 md:h-12 w-auto object-contain {{ $isHeroPage ? 'hidden' : 'block' }}">
            </a>

            {{-- Desktop Navigation Links --}}
            <nav id="header-nav-links" class="hidden lg:flex items-center gap-5 xl:gap-7 text-sm font-bold tracking-wide shrink-0">
                <a href="{{ route('home') }}"
                   class="nav-link-item transition-colors {{ request()->routeIs('home') ? 'font-extrabold text-[#38BDF8]' : ($isHeroPage ? 'text-white hover:text-[#38BDF8]' : 'text-slate-700 hover:text-[#2563EB]') }}">
                    Home
                </a>
                <a href="{{ route('marketplace') }}"
                   class="nav-link-item transition-colors {{ request()->routeIs('marketplace') || request()->routeIs('cards.*') ? 'font-extrabold text-[#38BDF8]' : ($isHeroPage ? 'text-white hover:text-[#38BDF8]' : 'text-slate-700 hover:text-[#2563EB]') }}">
                    Gift Cards
                </a>
                <a href="{{ route('about') }}"
                   class="nav-link-item transition-colors {{ request()->routeIs('about') ? 'font-extrabold text-[#38BDF8]' : ($isHeroPage ? 'text-white hover:text-[#38BDF8]' : 'text-slate-700 hover:text-[#2563EB]') }}">
                    About Us
                </a>
                <a href="{{ route('how-it-works') }}"
                   class="nav-link-item transition-colors {{ request()->routeIs('how-it-works') ? 'font-extrabold text-[#38BDF8]' : ($isHeroPage ? 'text-white hover:text-[#38BDF8]' : 'text-slate-700 hover:text-[#2563EB]') }}">
                    How It Works
                </a>
                <a href="{{ route('contact') }}"
                   class="nav-link-item transition-colors {{ request()->routeIs('contact') ? 'font-extrabold text-[#38BDF8]' : ($isHeroPage ? 'text-white hover:text-[#38BDF8]' : 'text-slate-700 hover:text-[#2563EB]') }}">
                    Contact
                </a>
            </nav>

            {{-- ── SEARCH BAR IN TOP NAV BAR (Desktop & Tablet) ── --}}
            <form
                action="{{ route('marketplace') }}"
                method="GET"
                @submit.prevent="
                    if (document.querySelectorAll('[data-card-item]').length > 0) {
                        applyFilter();
                        const p = document.getElementById('products');
                        if (p) p.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        window.location.href = '{{ route('marketplace') }}?search=' + encodeURIComponent(searchQuery || '');
                    }
                "
                class="hidden md:flex items-center w-44 lg:w-52 xl:w-60 mx-1 lg:mx-2 shrink-0">
                <div
                    id="header-search-wrap"
                    class="relative w-full flex items-center rounded-full px-3 py-1.5 gap-1.5 border transition-all duration-200 {{ $isHeroPage ? 'border-white/20 bg-white/10 hover:bg-white/15 focus-within:bg-slate-900/90 focus-within:border-[#38BDF8]' : 'border-slate-200 bg-slate-50 hover:bg-slate-100/70 focus-within:bg-white focus-within:border-[#2563EB] focus-within:ring-2 focus-within:ring-blue-100' }}">
                    <span id="header-search-icon" class="material-symbols-outlined text-base shrink-0 {{ $isHeroPage ? 'text-white/70' : 'text-slate-400' }}">search</span>
                    <input
                        type="text"
                        id="header-search-input"
                        x-model="searchQuery"
                        @input.debounce.300ms="applyFilter()"
                        placeholder="Search cards..."
                        class="w-full bg-transparent border-none outline-none text-[11px] font-medium placeholder:text-slate-400 {{ $isHeroPage ? 'text-white placeholder:text-slate-300' : 'text-slate-800 placeholder:text-slate-400' }}">
                    <button
                        type="button"
                        x-show="searchQuery && searchQuery.length > 0"
                        @click="searchQuery = ''; applyFilter()"
                        class="text-slate-400 hover:text-slate-600 transition-colors p-0.5 cursor-pointer shrink-0"
                        title="Clear search">
                        <span class="material-symbols-outlined text-xs">close</span>
                    </button>
                </div>
            </form>

            {{-- Right Controls: Mobile Search, Wishlist, Cart, CTA, Hamburger --}}
            <div class="flex items-center gap-1.5 sm:gap-2.5 lg:gap-3 shrink-0">

                {{-- Mobile Search Trigger Icon (< md screens) --}}
                <button
                    type="button"
                    id="header-btn-mobile-search"
                    @click="mobileSearchOpen = !mobileSearchOpen; if (mobileSearchOpen) mobileMenuOpen = false;"
                    :class="(mobileMenuOpen || mobileSearchOpen) ? '!text-slate-700' : ''"
                    class="md:hidden p-2 rounded-full focus:outline-none transition-colors cursor-pointer {{ $isHeroPage ? 'text-white hover:bg-white/10' : 'text-slate-600 hover:text-[#2563EB] hover:bg-blue-50' }}"
                    title="Search cards"
                    aria-label="Toggle mobile search">
                    <span class="material-symbols-outlined text-2xl" x-text="mobileSearchOpen ? 'close' : 'search'">search</span>
                </button>

                {{-- Wishlist Button: Direct Link to /wishlist --}}
                <a
                    href="{{ route('wishlist') }}"
                    id="header-btn-wishlist"
                    :class="(mobileMenuOpen || mobileSearchOpen) ? '!text-slate-700' : ''"
                    class="relative p-2 sm:p-2.5 rounded-full transition-colors inline-flex items-center justify-center cursor-pointer {{ $isHeroPage ? 'text-white hover:bg-white/10' : 'text-slate-600 hover:text-rose-600 hover:bg-rose-50' }}"
                    title="View Wishlist">
                    <span class="material-symbols-outlined text-2xl">favorite</span>
                    <span
                        x-show="wishlist.length > 0"
                        x-cloak
                        x-text="wishlist.length"
                        class="absolute top-0.5 right-0.5 bg-rose-500 text-white text-[10px] font-extrabold rounded-full w-4 h-4 flex items-center justify-center shadow-xs">
                    </span>
                </a>

                {{-- Cart Button: Direct Link to /cart --}}
                <a
                    href="{{ route('cart') }}"
                    id="header-btn-cart"
                    :class="(mobileMenuOpen || mobileSearchOpen) ? '!text-slate-700' : ''"
                    class="relative p-2 sm:p-2.5 rounded-full transition-colors inline-flex items-center justify-center cursor-pointer {{ $isHeroPage ? 'text-white hover:bg-white/10' : 'text-slate-600 hover:text-[#2563EB] hover:bg-blue-50' }}"
                    title="View Shopping Cart">
                    <span class="material-symbols-outlined text-2xl">shopping_bag</span>
                    <span
                        x-show="cartTotalCount > 0"
                        x-cloak
                        x-text="cartTotalCount"
                        class="absolute top-0.5 right-0.5 bg-[#2563EB] text-white text-[10px] font-extrabold rounded-full w-4 h-4 flex items-center justify-center shadow-xs">
                    </span>
                </a>

                {{-- Shop Cards CTA Button (Desktop) --}}
                <a href="{{ route('marketplace') }}"
                   class="hidden md:inline-flex items-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white text-xs font-bold px-4 lg:px-5 py-2.5 rounded-full transition-all duration-200 active:scale-95 shadow-sm">
                    <span>Shop Cards</span>
                    <span class="material-symbols-outlined text-xs font-bold">arrow_forward</span>
                </a>

                {{-- Mobile Menu Hamburger --}}
                <button
                    type="button"
                    id="header-btn-hamburger"
                    @click="mobileMenuOpen = !mobileMenuOpen; if (mobileMenuOpen) mobileSearchOpen = false;"
                    :class="(mobileMenuOpen || mobileSearchOpen) ? '!text-slate-800' : ''"
                    class="lg:hidden p-2 rounded-xl focus:outline-none transition-colors cursor-pointer {{ $isHeroPage ? 'text-white hover:bg-white/10' : 'text-slate-700 hover:bg-slate-100' }}"
                    aria-label="Toggle menu">
                    <span class="material-symbols-outlined text-2xl" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
                </button>
            </div>
        </div>
    </div>

    {{-- ── Mobile Inline Search Bar (Toggled by mobile search icon) ── --}}
    <div
        x-show="mobileSearchOpen"
        x-cloak
        style="display: none;"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-white border-b border-slate-200 px-4 py-3 shadow-md">
        <form
            action="{{ route('marketplace') }}"
            method="GET"
            @submit.prevent="
                if (document.querySelectorAll('[data-card-item]').length > 0) {
                    applyFilter();
                    mobileSearchOpen = false;
                    const p = document.getElementById('products');
                    if (p) p.scrollIntoView({ behavior: 'smooth' });
                } else {
                    window.location.href = '{{ route('marketplace') }}?search=' + encodeURIComponent(searchQuery || '');
                }
            ">
            <div class="relative flex items-center bg-slate-50 rounded-full px-3.5 py-2 border border-slate-200 focus-within:border-[#2563EB] focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-100">
                <span class="material-symbols-outlined text-slate-400 text-lg mr-2 shrink-0">search</span>
                <input
                    type="text"
                    x-model="searchQuery"
                    @input.debounce.300ms="applyFilter()"
                    placeholder="Search 500+ gift cards..."
                    class="w-full bg-transparent border-none outline-none text-xs text-slate-800 placeholder:text-slate-400 font-medium">
                <button
                    type="button"
                    x-show="searchQuery && searchQuery.length > 0"
                    @click="searchQuery = ''; applyFilter()"
                    class="text-slate-400 hover:text-slate-600 p-0.5 cursor-pointer shrink-0">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
            </div>
        </form>
    </div>

    {{-- ── Mobile Menu Dropdown Drawer (Clean White Background) ── --}}
    <div
        x-show="mobileMenuOpen"
        x-cloak
        style="display: none;"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white text-slate-800 border-b border-slate-200 px-5 py-5 flex flex-col gap-1 shadow-2xl">

        {{-- Mobile Menu Search Field --}}
        <form
            action="{{ route('marketplace') }}"
            method="GET"
            @submit.prevent="
                mobileMenuOpen = false;
                if (document.querySelectorAll('[data-card-item]').length > 0) {
                    applyFilter();
                    const p = document.getElementById('products');
                    if (p) p.scrollIntoView({ behavior: 'smooth' });
                } else {
                    window.location.href = '{{ route('marketplace') }}?search=' + encodeURIComponent(searchQuery || '');
                }
            "
            class="mb-3">
            <div class="relative flex items-center bg-slate-50 hover:bg-slate-100/70 focus-within:bg-white rounded-xl px-3.5 py-2.5 border border-slate-200 focus-within:border-[#2563EB] focus-within:ring-2 focus-within:ring-blue-100 transition-all">
                <span class="material-symbols-outlined text-slate-400 text-base mr-2 shrink-0">search</span>
                <input
                    type="text"
                    x-model="searchQuery"
                    @input.debounce.300ms="applyFilter()"
                    placeholder="Search 500+ gift cards..."
                    class="w-full bg-transparent border-none outline-none text-xs text-slate-800 placeholder:text-slate-400 font-medium">
                <button
                    type="button"
                    x-show="searchQuery && searchQuery.length > 0"
                    @click="searchQuery = ''; applyFilter()"
                    class="text-slate-400 hover:text-slate-600 transition-colors p-0.5 shrink-0">
                    <span class="material-symbols-outlined text-xs">close</span>
                </button>
            </div>
        </form>

        {{-- Mobile Nav Links --}}
        <nav class="flex flex-col">
            @foreach([
                ['href' => route('home'),         'label' => 'Home',         'icon' => 'home',           'active' => request()->routeIs('home')],
                ['href' => route('marketplace'),  'label' => 'Gift Cards',   'icon' => 'card_giftcard',  'active' => request()->routeIs('marketplace') || request()->routeIs('cards.*')],
                ['href' => route('about'),        'label' => 'About Us',      'icon' => 'info',           'active' => request()->routeIs('about')],
                ['href' => route('how-it-works'), 'label' => 'How It Works', 'icon' => 'help',           'active' => request()->routeIs('how-it-works')],
                ['href' => route('contact'),      'label' => 'Contact Us',   'icon' => 'support_agent',  'active' => request()->routeIs('contact')],
            ] as $item)
            <a @click="mobileMenuOpen = false"
               href="{{ $item['href'] }}"
               class="py-3 px-3.5 text-sm font-bold rounded-xl border-b border-slate-100 last:border-b-0 transition-all flex items-center justify-between {{ $item['active'] ? 'bg-blue-50/80 text-[#2563EB]' : 'text-slate-700 hover:text-[#2563EB] hover:bg-slate-50' }}">
                <span class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg {{ $item['active'] ? 'text-[#2563EB]' : 'text-slate-400' }}">{{ $item['icon'] }}</span>
                    <span>{{ $item['label'] }}</span>
                </span>
                <span class="material-symbols-outlined text-xs text-slate-300">chevron_right</span>
            </a>
            @endforeach
        </nav>

        {{-- Mobile Bottom CTA --}}
        <div class="pt-3 mt-1 border-t border-slate-100 flex flex-col gap-2">
            <a href="{{ route('marketplace') }}"
               @click="mobileMenuOpen = false"
               class="w-full flex items-center justify-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-bold text-xs py-3 rounded-full shadow-sm transition-all active:scale-95">
                <span>Explore Full Catalog (500+ Cards)</span>
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
    </div>

</header>

{{-- Dynamic Navbar Scroll Controller:
     - On Hero Page: Transparent/dark at top (no white overlay), smoothly transitions to frosted white on scroll.
     - On Non-Hero Pages: Crisp white at top, frosted translucent white on scroll. --}}
<script>
    (function () {
        function updateHeaderScroll() {
            var nav = document.getElementById('main-nav-bar');
            var util = document.getElementById('top-utility-bar');
            if (!nav) return;

            var isHero = nav.getAttribute('data-is-hero') === 'true';
            var scrolled = (window.scrollY || window.pageYOffset || 0) > 30;

            var logoWhite = document.getElementById('header-logo-white');
            var logoColor = document.getElementById('header-logo-color');
            var links = document.querySelectorAll('.nav-link-item');
            var searchWrap = document.getElementById('header-search-wrap');
            var searchInput = document.getElementById('header-search-input');
            var searchIcon = document.getElementById('header-search-icon');
            var btnMobileSearch = document.getElementById('header-btn-mobile-search');
            var btnWishlist = document.getElementById('header-btn-wishlist');
            var btnCart = document.getElementById('header-btn-cart');
            var btnHamburger = document.getElementById('header-btn-hamburger');

            if (isHero) {
                // In Hero Page: No white at top; frosted white on scroll
                if (scrolled) {
                    nav.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                    nav.style.backdropFilter = 'blur(16px)';
                    nav.style.webkitBackdropFilter = 'blur(16px)';
                    nav.style.boxShadow = '0 4px 20px -2px rgba(0, 0, 0, 0.08)';
                    nav.style.borderBottom = '1px solid #e2e8f0';

                    if (logoWhite) logoWhite.style.display = 'none';
                    if (logoColor) logoColor.style.display = 'block';

                    links.forEach(function (el) { el.style.color = '#1e293b'; });

                    if (searchWrap) {
                        searchWrap.style.borderColor = '#e2e8f0';
                        searchWrap.style.backgroundColor = '#f1f5f9';
                    }
                    if (searchInput) searchInput.style.color = '#1e293b';
                    if (searchIcon) searchIcon.style.color = '#64748b';

                    if (btnMobileSearch) btnMobileSearch.style.color = '#475569';
                    if (btnWishlist) btnWishlist.style.color = '#475569';
                    if (btnCart) btnCart.style.color = '#475569';
                    if (btnHamburger) btnHamburger.style.color = '#1e293b';
                } else {
                    nav.style.backgroundColor = 'transparent';
                    nav.style.backdropFilter = 'none';
                    nav.style.webkitBackdropFilter = 'none';
                    nav.style.boxShadow = 'none';
                    nav.style.borderBottom = 'none';

                    if (logoWhite) logoWhite.style.display = 'block';
                    if (logoColor) logoColor.style.display = 'none';

                    links.forEach(function (el) { el.style.color = '#ffffff'; });

                    if (searchWrap) {
                        searchWrap.style.borderColor = 'rgba(255, 255, 255, 0.25)';
                        searchWrap.style.backgroundColor = 'rgba(255, 255, 255, 0.12)';
                    }
                    if (searchInput) searchInput.style.color = '#ffffff';
                    if (searchIcon) searchIcon.style.color = 'rgba(255, 255, 255, 0.7)';

                    if (btnMobileSearch) btnMobileSearch.style.color = '#ffffff';
                    if (btnWishlist) btnWishlist.style.color = '#ffffff';
                    if (btnCart) btnCart.style.color = '#ffffff';
                    if (btnHamburger) btnHamburger.style.color = '#ffffff';
                }
            } else {
                // Non-Hero Page: White at top, frosted white on scroll
                if (scrolled) {
                    nav.style.backgroundColor = 'rgba(255, 255, 255, 0.90)';
                    nav.style.backdropFilter = 'blur(16px)';
                    nav.style.webkitBackdropFilter = 'blur(16px)';
                    nav.style.boxShadow = '0 4px 20px -2px rgba(0, 0, 0, 0.08)';
                    nav.style.borderBottomColor = 'rgba(226, 232, 240, 0.8)';
                } else {
                    nav.style.backgroundColor = '#ffffff';
                    nav.style.backdropFilter = 'none';
                    nav.style.webkitBackdropFilter = 'none';
                    nav.style.boxShadow = '0 1px 3px 0 rgba(0, 0, 0, 0.04)';
                    nav.style.borderBottomColor = '#e2e8f0';
                }
            }

            // Top utility bar collapse
            if (util) {
                util.style.maxHeight = scrolled ? '0px' : '36px';
                util.style.opacity = scrolled ? '0' : '1';
                util.style.pointerEvents = scrolled ? 'none' : 'auto';
            }
        }

        window.addEventListener('scroll', updateHeaderScroll, { passive: true });
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', updateHeaderScroll);
        } else {
            updateHeaderScroll();
        }
    })();
</script>
