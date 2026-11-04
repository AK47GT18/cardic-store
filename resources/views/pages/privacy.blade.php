<x-layouts.app title="Privacy Policy & Cookies — Cardic Store">

    <div class="bg-[#F8FAFC] text-[#0F172A] min-h-screen pt-24 sm:pt-28">

        {{-- ── PAGE HEADER ── --}}
        <div class="bg-[#06111E] text-white py-14 sm:py-20 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10"
                 style="background: radial-gradient(circle at 70% 50%, #2563EB 0%, transparent 60%), radial-gradient(circle at 20% 40%, #38BDF8 0%, transparent 55%);"></div>
            <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-4 py-1.5 text-xs font-semibold text-slate-200 mb-5">
                    <span class="material-symbols-outlined text-xs text-[#38BDF8]">shield</span>
                    Privacy & Data
                </div>
                <h1 class="font-headline font-black text-3xl sm:text-5xl tracking-tight">Privacy Policy &amp; Cookies</h1>
                <p class="text-sm sm:text-base text-slate-300 mt-3 max-w-xl mx-auto leading-relaxed">
                    Your privacy is fundamental to how Cardic Store operates. This policy explains what data we collect, how we use it, and your rights over it.
                </p>
                <p class="text-xs text-slate-500 mt-4">Last updated: November 2026</p>
            </div>
        </div>

        {{-- ── CONTENT ── --}}
        <div class="max-w-3xl mx-auto px-4 sm:px-6 py-12 sm:py-16">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-10 space-y-10 prose prose-slate max-w-none">

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">1</span>
                        Information We Collect
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Cardic Store collects only the minimum information necessary to process your order and deliver your digital gift card codes. This includes:
                    </p>
                    <ul class="mt-3 space-y-1.5 text-sm text-slate-600 list-disc list-inside">
                        <li><strong>Delivery email address</strong> — required to send your encrypted redemption codes.</li>
                        <li><strong>Payment data</strong> — processed exclusively by our PCI-compliant payment partners (Stripe, PayPal). Cardic Store does not store raw card numbers.</li>
                        <li><strong>Session data</strong> — anonymous cart contents stored in your browser's localStorage. No account creation is required.</li>
                        <li><strong>Usage analytics</strong> — aggregated, anonymised page-view data to improve Platform performance.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">2</span>
                        How We Use Your Data
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Your data is used solely to fulfil your order, communicate order confirmation and delivery status, and to maintain the security and integrity of the Platform. We do not sell, rent, or share your personal information with any third party for marketing purposes.
                    </p>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">3</span>
                        Zero-KYC Stance
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Cardic Store operates a zero-KYC (Know Your Customer) model for standard purchases. We do not require government ID, proof of address, or identity documents for any transaction below our internal risk threshold. This allows buyers worldwide to transact with minimal friction while still maintaining compliance with applicable financial regulations.
                    </p>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">4</span>
                        Email Security &amp; Encryption
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Your delivery email address is encrypted in transit using TLS 1.3 and stored with AES-256 encryption at rest. Gift card redemption codes are transmitted within encrypted email payloads. We recommend you access your delivery email over a secure network. Order confirmations are retained for 30 days for dispute resolution purposes, after which they are automatically purged.
                    </p>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">5</span>
                        Cookies &amp; Local Storage
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed mb-3">
                        Cardic Store uses a minimal cookie footprint. We distinguish between:
                    </p>
                    <div class="space-y-3">
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <h3 class="text-xs font-black text-[#06111E] mb-1">Essential Cookies</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Required for the Platform to function. These include CSRF protection tokens and session identifiers. They cannot be disabled.</p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <h3 class="text-xs font-black text-[#06111E] mb-1">localStorage (Cart & Wishlist)</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">Your cart and wishlist items are stored locally in your browser's localStorage under the keys <code class="bg-slate-200 px-1 rounded text-[10px]">cardic_cart</code> and <code class="bg-slate-200 px-1 rounded text-[10px]">cardic_wishlist</code>. This data never leaves your device and is cleared when you clear your browser data.</p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <h3 class="text-xs font-black text-[#06111E] mb-1">Analytics Cookies</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">We use privacy-preserving analytics to understand aggregate usage patterns. No personally identifiable information is included in analytics data. You may opt out at any time.</p>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">6</span>
                        Payment Processing Standards
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        All card payments are processed via Stripe, a PCI DSS Level 1 certified payment processor. Cryptocurrency payments are handled through non-custodial wallet flows. PayPal payments are subject to PayPal's own privacy policy. Cardic Store does not receive, store, or log raw payment credentials at any point.
                    </p>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">7</span>
                        Your Rights
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Depending on your jurisdiction, you may have the right to access, correct, or erase your personal data held by Cardic Store. To exercise any of these rights, contact us at <a href="mailto:support@cardicstore.com" class="text-[#2563EB] hover:underline font-medium">support@cardicstore.com</a>. We will respond within 72 hours.
                    </p>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">8</span>
                        Policy Updates
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        We may update this Privacy Policy from time to time. Any material changes will be communicated via a banner on the Platform. Continued use following notification of changes constitutes acceptance of the updated policy.
                    </p>
                </section>

                <section>
                    <h2 class="text-base sm:text-lg font-black text-[#06111E] flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-black shrink-0">9</span>
                        Contact
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        For any privacy-related queries, write to us at:<br>
                        <a href="mailto:support@cardicstore.com" class="text-[#2563EB] hover:underline font-medium">support@cardicstore.com</a>
                    </p>
                </section>

            </div>

            {{-- Back Link --}}
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-[#2563EB] transition-colors">
                    <span class="material-symbols-outlined text-sm">arrow_back</span>
                    Back to Home
                </a>
            </div>
        </div>

    </div>

</x-layouts.app>

