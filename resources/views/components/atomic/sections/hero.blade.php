{{-- ============================================================
     HERO — Full-bleed background · naturally spaced headline & text ·
     3-card real image split with silky-smooth animated transitions
     (no badges, clean images only, well-spaced typography)
     ============================================================ --}}

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('heroCardShowcase', () => ({
            active: 0,
            isTransitioning: false,
            autoTimer: null,
            groups: [
                [
                    { brand: 'Amazon',      image: '{{ asset("images/amazon.jpg") }}',      angle: -6, y: 12 },
                    { brand: 'PlayStation', image: '{{ asset("images/playstation.jpg") }}', angle:  0, y: 0  },
                    { brand: 'Steam',       image: '{{ asset("images/steam.jpg") }}',       angle:  6, y: 12 },
                ],
                [
                    { brand: 'Apple',       image: '{{ asset("images/apple.jpg") }}',       angle: -6, y: 12 },
                    { brand: 'Netflix',     image: '{{ asset("images/netflix.jpg") }}',     angle:  0, y: 0  },
                    { brand: 'Spotify',     image: '{{ asset("images/spotify.jpg") }}',     angle:  6, y: 12 },
                ],
                [
                    { brand: 'Xbox',        image: '{{ asset("images/xbox.jpg") }}',        angle: -6, y: 12 },
                    { brand: 'Airbnb',      image: '{{ asset("images/airbnb.jpg") }}',      angle:  0, y: 0  },
                    { brand: 'Amazon',      image: '{{ asset("images/amazon.jpg") }}',      angle:  6, y: 12 },
                ],
            ],
            init() {
                this.autoTimer = setInterval(() => this.next(), 4800);
            },
            next() {
                this.isTransitioning = true;
                setTimeout(() => {
                    this.active = (this.active + 1) % this.groups.length;
                    this.isTransitioning = false;
                }, 400);
            },
            get currentGroup() {
                return this.groups[this.active];
            }
        }));
    });
</script>

<section
    class="relative w-full overflow-hidden bg-[#060F1E] flex flex-col justify-between"
    style="min-height: 100svh;"
    x-data="heroCardShowcase()"
    x-init="init()">

    {{-- ── Full-bleed Atmospheric Background ──────────────────── --}}
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset('images/giftcard.jpg') }}"
            alt="Gift cards background"
            class="w-full h-full object-cover object-center"
            style="filter: brightness(0.24) saturate(1.35);">

        {{-- Smooth directional gradient --}}
        <div class="absolute inset-0" style="background: linear-gradient(105deg, rgba(6,15,30,0.98) 0%, rgba(6,15,30,0.80) 45%, rgba(6,15,30,0.20) 100%);"></div>

        {{-- Deep dark fade at bottom --}}
        <div class="absolute bottom-0 left-0 right-0 h-48" style="background: linear-gradient(to top, #060F1E 0%, transparent 100%);"></div>

        {{-- Ambient blue glow --}}
        <div class="absolute -top-32 -left-32 w-[650px] h-[650px] pointer-events-none" style="background: radial-gradient(circle, rgba(37,99,235,0.16) 0%, transparent 70%);"></div>
    </div>

    {{-- ── Nav Spacer (Matches sleek h-14 sm:h-16 nav + h-8 topbar) ── --}}
    <div class="h-20 sm:h-24 shrink-0"></div>

    {{-- ── Main Hero Content Area (Well-Spaced) ─────────────────── --}}
    <div class="relative z-10 w-full max-w-[1440px] mx-auto px-6 sm:px-10 lg:px-12 my-auto py-12 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-14 lg:gap-16 items-center">

            {{-- ── LEFT: Text Spread Out & Well-Spaced ─────────────── --}}
            <div class="lg:col-span-7 xl:col-span-7">

                {{-- Headline with comfortable leading & character spacing --}}
                <h1 class="font-headline font-black text-white tracking-normal leading-[1.12] sm:leading-[1.14] text-4xl sm:text-6xl lg:text-7xl">
                    Buy Gift Cards at the Best <span class="text-[#38BDF8]">Discounts.</span>
                </h1>

                {{-- Generously spaced subcopy --}}
                <p class="mt-8 text-slate-300 text-base sm:text-lg lg:text-xl font-normal leading-[1.7] max-w-2xl">
                    The modern escrow-backed marketplace for 500+ verified brands. Buy digital gift codes with up to <strong class="text-white font-semibold">12% instant savings</strong>, authenticated and delivered to your inbox in seconds.
                </p>

                {{-- Clean primary action button (Sleek, balanced size) --}}
                <div class="mt-10 flex items-center gap-5 flex-wrap">
                    <a href="#products"
                       class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-bold text-sm px-6 py-3 rounded-full transition-all duration-200 active:scale-95 shadow-md group">
                        <span>Browse Gift Cards</span>
                        <span class="material-symbols-outlined text-base transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </a>

                    <div class="flex items-center gap-2 text-xs sm:text-sm text-slate-400 font-medium">
                        <span class="material-symbols-outlined text-emerald-400 text-lg">verified_user</span>
                        <span>100% Balance Warranty</span>
                    </div>
                </div>

                {{-- Quick Popular Brands --}}
                <div class="mt-12 flex items-center gap-3 text-xs sm:text-sm text-slate-400 flex-wrap">
                    <span class="font-bold text-slate-500 uppercase tracking-wider text-xs">Trending:</span>
                    <span class="bg-white/8 hover:bg-white/14 px-3.5 py-1.5 rounded-full border border-white/10 text-white font-semibold transition-colors">Amazon</span>
                    <span class="bg-white/8 hover:bg-white/14 px-3.5 py-1.5 rounded-full border border-white/10 text-white font-semibold transition-colors">Apple</span>
                    <span class="bg-white/8 hover:bg-white/14 px-3.5 py-1.5 rounded-full border border-white/10 text-white font-semibold transition-colors">PlayStation</span>
                    <span class="bg-white/8 hover:bg-white/14 px-3.5 py-1.5 rounded-full border border-white/10 text-white font-semibold transition-colors">Steam</span>
                </div>

            </div>

            {{-- ── RIGHT: Animated 3-Card Real Image Showcase ── --}}
            <div class="lg:col-span-5 xl:col-span-5 flex justify-center lg:justify-end">
                <div class="relative w-full max-w-[500px] h-[380px] sm:h-[440px] flex items-center justify-center">

                    {{-- Smooth animated container with fade & slight scale during transitions --}}
                    <div
                        class="relative w-full h-full flex items-center justify-center transition-all duration-500 ease-out"
                        :class="isTransitioning ? 'opacity-0 scale-95 translate-y-3' : 'opacity-100 scale-100 translate-y-0'">

                        <template x-for="(card, idx) in currentGroup" :key="idx">
                            <div
                                class="absolute rounded-3xl overflow-hidden shadow-[0_25px_60px_-15px_rgba(0,0,0,0.85)] border border-white/15 cursor-pointer group transition-all duration-500"
                                :style="`
                                    width: ${idx === 1 ? '240px' : '210px'};
                                    height: ${idx === 1 ? '340px' : '300px'};
                                    left: ${idx === 0 ? '10px' : (idx === 1 ? '130px' : '250px')};
                                    transform: translateY(${card.y}px) rotate(${card.angle}deg);
                                    z-index: ${idx === 1 ? 20 : (idx === 2 ? 15 : 10)};
                                `"
                                @mouseenter="$el.style.transform = 'translateY(-15px) rotate(0deg) scale(1.05)'; $el.style.zIndex = '30';"
                                @mouseleave="$el.style.transform = `translateY(${card.y}px) rotate(${card.angle}deg) scale(1)`; $el.style.zIndex = idx === 1 ? '20' : (idx === 2 ? '15' : '10');">

                                {{-- Pure Clean Real Brand Image (No Badges, No Clutter) --}}
                                <img
                                    :src="card.image"
                                    :alt="card.brand"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    style="filter: brightness(0.9) saturate(1.15);">

                                {{-- Subtle bottom vignette --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent pointer-events-none"></div>

                                {{-- Clean Brand Title --}}
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="text-white font-extrabold text-base sm:text-lg leading-tight drop-shadow-md" x-text="card.brand"></div>
                                </div>

                            </div>
                        </template>

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
