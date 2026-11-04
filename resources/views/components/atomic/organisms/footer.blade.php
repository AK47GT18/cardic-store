{{-- ============================================================
     GLOBAL FOOTER (Redesigned matching LuckyCharm reference)
     Top Section: Panoramic Scenic Banner with centered headline,
                  subtitle, and pill-shaped Subscribe bar.
     Bottom Section: Clean crisp white background with:
                  - Left: Color logo, description, and dark social icons
                  - Right: 4 minimalist navigation columns (Company, Resources, Career/Categories, Help)
                  - Bottom: Minimalist copyright & legal row
     ============================================================ --}}
<footer class="overflow-hidden">

    {{-- ── UPPER SECTION: Scenic Landscape Call-To-Action Banner (Slim Height) ── --}}
    <div class="relative py-12 sm:py-16 overflow-hidden bg-slate-900">

        {{-- Background Image with Atmospheric Scenic Filter --}}
        <div class="absolute inset-0 z-0">
            <img
                src="{{ asset('images/giftcard.jpg') }}"
                alt="Scenic Landscape"
                class="w-full h-full object-cover object-center brightness-[0.35] contrast-105">
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-slate-950/40 to-black/60"></div>
        </div>

        {{-- Centered Typography & Pill Form --}}
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">

            {{-- Main Headline --}}
            <h2 class="font-headline font-black text-2xl sm:text-3xl lg:text-4xl text-white tracking-tight">
                Stay Ahead With Instant Flash Discounts.
            </h2>

            {{-- Subheadline --}}
            <p class="text-xs sm:text-sm text-slate-200 mt-2.5 max-w-xl mx-auto leading-relaxed font-normal">
                Subscribe for exclusive voucher drops, zero-fee promotions, and real-time inventory alerts across 500+ global brands.
            </p>

            {{-- Pill Subscribe Input + Button --}}
            <div x-data="{ email: '', subscribed: false }" class="mt-6 max-w-md mx-auto">
                <form @submit.prevent="subscribed = true; showToast('Thank you for subscribing!', 'mail')" class="flex flex-col sm:flex-row items-center justify-center gap-2.5">
                    <input
                        type="email"
                        x-model="email"
                        required
                        placeholder="Enter Email Address"
                        class="w-full sm:w-80 bg-white text-slate-800 placeholder:text-slate-400 text-xs sm:text-sm px-6 py-3 rounded-full shadow-lg outline-none focus:ring-2 focus:ring-blue-500 font-medium">

                    <button
                        type="submit"
                        class="w-full sm:w-auto shrink-0 bg-[#1E293B] hover:bg-[#0F172A] text-white text-xs sm:text-sm font-semibold px-6 py-3 rounded-full flex items-center justify-center gap-2 transition-all shadow-lg active:scale-95 border border-slate-600/50 cursor-pointer">
                        <span>Subscribe</span>
                        <span class="text-sm font-bold">→</span>
                    </button>
                </form>

                <p x-show="subscribed" x-cloak class="text-xs text-emerald-300 mt-2.5 font-medium text-center">
                    ✓ Thank you for subscribing to Cardic Store updates!
                </p>
            </div>

        </div>

    </div>

    {{-- ── LOWER SECTION: Clean White Minimalist Footer ── --}}
    <div class="bg-white text-slate-800 pt-16 sm:pt-20 pb-12 sm:pb-16 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-14">

                {{-- Left Column: Brand Logo + Description + Dark Social Icons --}}
                <div class="md:col-span-5 lg:col-span-5">

                    {{-- Logo: Color version on white background --}}
                    <div class="flex items-center">
                        <x-atomic.atoms.logo size="lg" variant="color" />
                    </div>

                    {{-- Descriptive Paragraph matching reference --}}
                    <p class="text-xs sm:text-sm text-slate-500 leading-relaxed mt-5 max-w-sm">
                        Dedicated To Empowering Buyers With Instant Pre-Verified Digital Gift Cards, Zero-Counterparty Escrow Settlement, And Seamless Checkout For 500+ Leading Global Brands.
                    </p>

                    {{-- Direct Channels & Socials: FB, IG, WhatsApp, Email --}}
                    <div class="mt-6">
                        <div class="flex items-center gap-2.5">
                            {{-- Facebook (FB) --}}
                            <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"
                               class="w-9 h-9 rounded-full bg-slate-900 hover:bg-[#1877F2] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>

                            {{-- Instagram (IG) --}}
                            <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"
                               class="w-9 h-9 rounded-full bg-slate-900 hover:bg-[#E4405F] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>

                            {{-- WhatsApp --}}
                            <a href="https://wa.me/?text=Hello%20Cardic%20Store%20Support" target="_blank" rel="noopener" aria-label="WhatsApp"
                               class="w-9 h-9 rounded-full bg-slate-900 hover:bg-[#25D366] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                            </a>

                            {{-- Email --}}
                            <a href="mailto:support@cardicstore.com" aria-label="Email Support"
                               class="w-9 h-9 rounded-full bg-slate-900 hover:bg-[#2563EB] text-white flex items-center justify-center transition-all hover:scale-105 shadow-sm">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/>
                                </svg>
                            </a>
                        </div>

                        {{-- Direct Contact & Support Helper Tailored to Footer --}}
                        <div class="mt-4 space-y-1.5 text-xs">
                            <a href="mailto:support@cardicstore.com" class="inline-flex items-center gap-2 text-slate-600 hover:text-[#2563EB] transition-colors font-medium">
                                <span class="w-5 h-5 rounded-md bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-xs">mail</span>
                                </span>
                                <span>support@cardicstore.com</span>
                            </a>
                            <div class="flex items-center gap-2 text-slate-400 text-[11px]">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>WhatsApp &amp; Live Escrow Support</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right Navigation: 4 Columns (Company, Resources, Career, Help) --}}
                <div class="md:col-span-7 lg:col-span-7 grid grid-cols-2 sm:grid-cols-4 gap-8">

                    {{-- Column 1: Company --}}
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 mb-4 tracking-tight">Company</h4>
                        <ul class="space-y-3 text-xs sm:text-sm text-slate-500">
                            <li><a href="{{ route('marketplace') }}" class="hover:text-slate-900 transition-colors">Gift Cards</a></li>
                            <li><a href="{{ route('how-it-works') }}" class="hover:text-slate-900 transition-colors">How It Works</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-slate-900 transition-colors">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-slate-900 transition-colors">Contact</a></li>
                        </ul>
                    </div>

                    {{-- Column 2: Resources --}}
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 mb-4 tracking-tight">Resources</h4>
                        <ul class="space-y-3 text-xs sm:text-sm text-slate-500">
                            <li><a href="{{ route('how-it-works') }}" class="hover:text-slate-900 transition-colors">How It Works</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-slate-900 transition-colors">Customer Service</a></li>
                            <li><a href="{{ route('terms') }}" class="hover:text-slate-900 transition-colors">Terms of Service</a></li>
                            <li><a href="{{ route('privacy') }}" class="hover:text-slate-900 transition-colors">Privacy Policy</a></li>
                            <li><a href="{{ route('cookies') }}" class="hover:text-slate-900 transition-colors">Cookies</a></li>
                        </ul>
                    </div>

                    {{-- Column 3: Career / Marketplace --}}
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 mb-4 tracking-tight">Career</h4>
                        <ul class="space-y-3 text-xs sm:text-sm text-slate-500">
                            <li><a href="#" class="hover:text-slate-900 transition-colors">Jobs</a></li>
                            <li><a href="{{ route('home') }}#products" class="hover:text-slate-900 transition-colors">Catalog</a></li>
                            <li><a href="{{ route('how-it-works') }}" class="hover:text-slate-900 transition-colors">Escrow Hub</a></li>
                        </ul>
                    </div>

                    {{-- Column 4: Help --}}
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 mb-4 tracking-tight">Help</h4>
                        <ul class="space-y-3 text-xs sm:text-sm text-slate-500">
                            <li><a href="{{ route('home') }}#faq" class="hover:text-slate-900 transition-colors">FAQ</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-slate-900 transition-colors">Help Centre</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-slate-900 transition-colors">Support</a></li>
                        </ul>
                    </div>

                </div>

            </div>

            {{-- ── BOTTOM ROW: Copyright & Privacy ── --}}
            <div class="mt-14 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                <div>
                    Copyright &copy; {{ date('Y') }} Cardic Store Inc. All rights reserved.
                </div>
                <div class="flex items-center gap-5">
                    <a href="{{ route('terms') }}" class="hover:text-slate-700 transition-colors">Terms of Service</a>
                    <span>·</span>
                    <a href="{{ route('privacy') }}" class="hover:text-slate-700 transition-colors">Privacy Policy</a>
                    <span>·</span>
                    <a href="{{ route('cookies') }}" class="hover:text-slate-700 transition-colors">Cookie Preferences</a>
                </div>
            </div>

        </div>
    </div>

</footer>
