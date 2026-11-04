@props(['size' => 'md', 'variant' => 'auto'])

@php
    $heightClass = match($size) {
        'sm'  => 'h-9 sm:h-10',
        'lg'  => 'h-14 sm:h-16',
        default => 'h-10 sm:h-12',
    };
@endphp

<a href="{{ route('home') }}" class="inline-flex items-center group transition-transform duration-200 hover:scale-[1.02]">
    @if($variant === 'white')
        {{-- Guaranteed always crisp on dark background (e.g. Footer & Hero) --}}
        <img
            src="{{ asset('images/logo-white.png') }}"
            alt="Cardic Store"
            class="{{ $heightClass }} w-auto object-contain block">
    @elseif($variant === 'color')
        {{-- Guaranteed authentic color version on light background --}}
        <img
            src="{{ asset('images/logo-transparent.png') }}"
            alt="Cardic Store"
            class="{{ $heightClass }} w-auto object-contain block">
    @else
        {{-- Auto toggle in Navbar based on header scroll state --}}
        <img
            src="{{ asset('images/logo-white.png') }}"
            alt="Cardic Store"
            class="{{ $heightClass }} w-auto object-contain transition-all duration-300"
            x-show="!scrolled"
            style="display: block;">

        <img
            src="{{ asset('images/logo-transparent.png') }}"
            alt="Cardic Store"
            class="{{ $heightClass }} w-auto object-contain transition-all duration-300"
            x-show="scrolled"
            x-cloak
            style="display: none;">
    @endif
</a>
