<x-layouts.app title="Cardic Store — Experience the Future of Gift Card Exchange">

    {{-- Section 1: Hero --}}
    <x-atomic.sections.hero />

    {{-- Section 2: Buyer Benefits --}}
    <x-atomic.sections.our-approach />

    {{-- Section 3: Split Benefit & Verification Feature --}}
    <x-atomic.sections.who-we-are />

    {{-- Section 4: 3-Photo Card Pillars & Featured Gift Cards Grid --}}
    <x-atomic.sections.products :cards="$cards" />

    {{-- Section 5: Panoramic Mid-Page Feature Banner --}}
    <x-atomic.sections.panoramic-banner />

    {{-- Section 6: Buyer Reviews & FAQ Accordion --}}
    <x-atomic.sections.sell-calculator />

</x-layouts.app>
