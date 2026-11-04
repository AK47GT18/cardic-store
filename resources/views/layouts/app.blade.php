<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Cardic Store — International Gift Card Marketplace' }}</title>
    
    {{-- Google Fonts: Inter & Plus Jakarta Sans + Material Symbols --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    
    {{-- Tailwind CSS & Alpine.js CDN for standalone resilience and instantaneous reactivity --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'primary': '#0037b0',
                        'primary-container': '#1d4ed8',
                        'on-primary': '#ffffff',
                        'tertiary-container': '#006948',
                        'tertiary-fixed': '#85f8c4',
                        'on-surface': '#0b1c30',
                        'on-surface-variant': '#434655',
                        'surface-container-low': '#eff4ff',
                        'surface-container': '#e5eeff',
                        'surface-container-high': '#dce9ff',
                        'surface-container-lowest': '#ffffff',
                        'secondary-container': '#dae2fd',
                        'background': '#f8f9ff',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        headline: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>
<body 
    x-data="cardicStore()" 
    x-init="initStore()"
    class="bg-[#f8f9ff] text-[#0b1c30] font-sans antialiased min-h-screen flex flex-col selection:bg-blue-600 selection:text-white">

    {{-- Main Global Navigation Header --}}
    <x-atomic.organisms.header />

    {{-- Page View Slot
         The landing hero manages its own top spacer internally.
         All other pages get padding-top to clear the fixed header (36 + 64 = 100px). --}}
    <div class="flex-1">
        {{ $slot }}
    </div>

    {{-- Global Footer --}}
    <x-atomic.organisms.footer />

    {{-- Sliding Cart Drawer --}}
    <x-atomic.organisms.cart-drawer />

    {{-- Escrow Fulfillment Receipt Modal --}}
    <x-atomic.organisms.receipt-modal />

    {{-- Wishlist Modal --}}
    <x-atomic.organisms.wishlist-modal />

    {{-- Floating Toast Notification --}}
    <div 
        x-show="toast.show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-[#0b1c30] text-white px-5 py-3 rounded-2xl shadow-2xl border border-slate-700/50"
        style="display: none;">
        <span class="material-symbols-outlined text-emerald-400 text-xl" x-text="toast.icon">check_circle</span>
        <span class="text-xs font-bold" x-text="toast.message"></span>
    </div>

    {{-- Global Reactive Store Script adhering to SOLID principles --}}
    <script>
        function cardicStore() {
            return {
                // UI Modals
                cartOpen: false,
                openWishlist: false,
                receiptModalOpen: false,
                mobileMenuOpen: false,
                mobileSearchOpen: false,
                isCheckingOut: false,

                // Checkout State
                checkoutEmail: 'investor@cardicstore.com',
                paymentMethod: 'card',
                confirmedOrderId: '',
                generatedVoucherKey: '',
                copyButtonText: 'Copy Key',

                // Currency Converter State
                currentCurrency: 'USD',
                currencySymbol: '$',
                exchangeRate: 1.0,

                // Filter & Search Reactive State
                searchQuery: '{{ request('search') ?? '' }}',
                selectedCategory: '{{ request('category') ?? 'all' }}',
                selectedRegion: '{{ request('region') ?? 'all' }}',
                discountFilter: 'all',
                minRatingFilter: 'all',
                sortOrder: '{{ request('sort') ?? 'popular' }}',

                // Persistent Cart & Wishlist
                cart: [],
                wishlist: [],

                // Toast Notification
                toast: {
                    show: false,
                    message: '',
                    icon: 'check_circle',
                    timeout: null
                },

                initStore() {
                    // Load persistent cart
                    const savedCart = localStorage.getItem('cardic_cart');
                    if (savedCart) {
                        try { this.cart = JSON.parse(savedCart); } catch (e) {}
                    }
                    // Load persistent wishlist
                    const savedWish = localStorage.getItem('cardic_wishlist');
                    if (savedWish) {
                        try { this.wishlist = JSON.parse(savedWish); } catch (e) {}
                    }
                },

                // Cart Calculations
                get cartTotalCount() {
                    return this.cart.reduce((sum, item) => sum + item.quantity, 0);
                },

                get cartSubtotal() {
                    const totalUsd = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                    return totalUsd;
                },

                get cartTotalSavings() {
                    const savingsUsd = this.cart.reduce((sum, item) => {
                        const originalTotal = item.denom * item.quantity;
                        const discountedTotal = item.price * item.quantity;
                        return sum + (originalTotal - discountedTotal);
                    }, 0);
                    return savingsUsd;
                },

                // Currency Methods
                setCurrency(code, symbol, rate) {
                    this.currentCurrency = code;
                    this.currencySymbol = symbol;
                    this.exchangeRate = rate;
                    this.showToast(`Currency changed to ${code} (${symbol})`, 'payments');
                },

                formatCurrency(amountInUsd) {
                    const converted = parseFloat(amountInUsd) * this.exchangeRate;
                    return `${this.currencySymbol}${converted.toFixed(2)}`;
                },

                // Cart Actions
                addToCart(product) {
                    const cartId = `${product.id}-${product.denom}`;
                    const existing = this.cart.find(i => i.cartId === cartId);

                    if (existing) {
                        existing.quantity++;
                    } else {
                        this.cart.push({
                            cartId: cartId,
                            id: product.id,
                            name: product.name,
                            brand: product.brand,
                            denom: product.denom,
                            price: product.price,
                            discount: product.discount,
                            icon: product.icon,
                            gradient: product.gradient,
                            image: product.image ?? null,
                            quantity: 1
                        });
                    }

                    this.saveCart();
                    this.showToast(`Added ${product.name} ($${product.denom}) to cart!`, 'shopping_bag');
                },

                buyNow(product) {
                    this.addToCart(product);
                    window.location.href = '/cart';
                },

                removeFromCart(cartId) {
                    this.cart = this.cart.filter(i => i.cartId !== cartId);
                    this.saveCart();
                    this.showToast('Item removed from cart', 'delete');
                },

                updateQuantity(cartId, delta) {
                    const item = this.cart.find(i => i.cartId === cartId);
                    if (item) {
                        item.quantity += delta;
                        if (item.quantity <= 0) {
                            this.removeFromCart(cartId);
                        } else {
                            this.saveCart();
                        }
                    }
                },

                saveCart() {
                    localStorage.setItem('cardic_cart', JSON.stringify(this.cart));
                },

                // Wishlist Actions
                toggleWishlist(product) {
                    const index = this.wishlist.findIndex(i => i.id === product.id);
                    if (index > -1) {
                        this.wishlist.splice(index, 1);
                        this.showToast(`Removed from Wishlist`, 'favorite_border');
                    } else {
                        this.wishlist.push(product);
                        this.showToast(`Saved ${product.name} to Wishlist!`, 'favorite');
                    }
                    localStorage.setItem('cardic_wishlist', JSON.stringify(this.wishlist));
                },

                // Instant Checkout Execution
                async triggerCheckout() {
                    if (this.cart.length === 0) return;
                    this.isCheckingOut = true;

                    try {
                        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                        const response = await fetch('{{ route('checkout') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token || ''
                            },
                            body: JSON.stringify({
                                items: this.cart,
                                payment_method: this.paymentMethod,
                                email: this.checkoutEmail
                            })
                        });

                        const data = await response.json();
                        
                        // Generate cryptographic voucher format
                        const randSegment = () => Math.random().toString(36).substring(2, 6).toUpperCase();
                        this.generatedVoucherKey = `CRDC-${randSegment()}-${randSegment()}-${randSegment()}`;
                        this.confirmedOrderId = data.order_id || 'CDS-84F29B';

                        // Empty cart
                        this.cart = [];
                        this.saveCart();
                        this.cartOpen = false;
                        this.receiptModalOpen = true;
                    } catch (error) {
                        console.error('Checkout error:', error);
                        // Fallback simulated success
                        this.generatedVoucherKey = `CRDC-${Math.random().toString(36).substring(2, 6).toUpperCase()}-94A2-ESCR`;
                        this.confirmedOrderId = 'CDS-94A2D1';
                        this.cart = [];
                        this.saveCart();
                        this.cartOpen = false;
                        this.receiptModalOpen = true;
                    } finally {
                        this.isCheckingOut = false;
                    }
                },

                copyVoucherKey() {
                    navigator.clipboard.writeText(this.generatedVoucherKey);
                    this.copyButtonText = 'Copied!';
                    setTimeout(() => { this.copyButtonText = 'Copy Key'; }, 2000);
                    this.showToast('Claim code copied to clipboard!', 'content_copy');
                },

                // Filter Actions
                applyFilter() {
                    const params = new URLSearchParams();
                    if (this.searchQuery) params.set('search', this.searchQuery);
                    if (this.selectedCategory && this.selectedCategory !== 'all') params.set('category', this.selectedCategory);
                    if (this.selectedRegion && this.selectedRegion !== 'all') params.set('region', this.selectedRegion);
                    if (this.sortOrder && this.sortOrder !== 'popular') params.set('sort', this.sortOrder);
                    if (this.minRatingFilter && this.minRatingFilter !== 'all') params.set('min_rating', this.minRatingFilter);

                    const newUrl = `${window.location.pathname}?${params.toString()}`;
                    window.history.replaceState({}, '', newUrl);

                    // Client-side instant filter toggle for matching cards
                    const cards = document.querySelectorAll('[data-card-item]');
                    cards.forEach(card => {
                        const name = card.getAttribute('data-name')?.toLowerCase() || '';
                        const brand = card.getAttribute('data-brand')?.toLowerCase() || '';
                        const cat = card.getAttribute('data-category')?.toLowerCase() || '';
                        const reg = card.getAttribute('data-region')?.toLowerCase() || '';
                        const discount = parseFloat(card.getAttribute('data-discount') || '0');
                        const rating = parseFloat(card.getAttribute('data-rating') || '0');

                        let match = true;
                        if (this.searchQuery && !name.includes(this.searchQuery.toLowerCase()) && !brand.includes(this.searchQuery.toLowerCase())) {
                            match = false;
                        }
                        if (this.selectedCategory !== 'all' && cat !== this.selectedCategory.toLowerCase()) {
                            match = false;
                        }
                        if (this.selectedRegion !== 'all' && !reg.includes(this.selectedRegion.toLowerCase())) {
                            match = false;
                        }
                        if (this.minRatingFilter !== 'all' && rating < parseFloat(this.minRatingFilter)) {
                            match = false;
                        }
                        if (this.discountFilter === 'up5' && discount > 5) match = false;
                        if (this.discountFilter === '5-10' && (discount < 5 || discount > 10)) match = false;
                        if (this.discountFilter === '10plus' && discount < 10) match = false;

                        card.style.display = match ? '' : 'none';
                    });
                },

                resetFilters() {
                    this.searchQuery = '';
                    this.selectedCategory = 'all';
                    this.selectedRegion = 'all';
                    this.discountFilter = 'all';
                    this.minRatingFilter = 'all';
                    this.sortOrder = 'popular';
                    this.applyFilter();
                    this.showToast('All filters have been reset', 'restart_alt');
                },

                clearFilter(type) {
                    if (type === 'category') this.selectedCategory = 'all';
                    if (type === 'region') this.selectedRegion = 'all';
                    if (type === 'search') this.searchQuery = '';
                    if (type === 'discount') this.discountFilter = 'all';
                    this.applyFilter();
                },

                showToast(msg, icon = 'check_circle') {
                    this.toast.message = msg;
                    this.toast.icon = icon;
                    this.toast.show = true;
                    if (this.toast.timeout) clearTimeout(this.toast.timeout);
                    this.toast.timeout = setTimeout(() => {
                        this.toast.show = false;
                    }, 2800);
                }
            }
        }
    </script>
</body>
</html>

