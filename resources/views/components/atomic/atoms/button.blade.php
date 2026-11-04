@props([
    'variant' => 'primary', // primary, secondary, outline, ghost, icon, success
    'size' => 'md',
    'href' => null,
    'icon' => null,
    'iconRight' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-bold transition-all duration-200 cursor-pointer focus:outline-none';
    
    $sizeClasses = match($size) {
        'sm' => 'text-xs px-3 py-1.5 rounded-lg gap-1.5',
        'lg' => 'text-base px-6 py-3 rounded-2xl gap-2.5 shadow-sm',
        'icon' => 'p-2 rounded-xl',
        default => 'text-sm px-4 py-2 rounded-xl gap-2',
    };

    $variantClasses = match($variant) {
        'primary' => 'bg-[#1d4ed8] hover:bg-[#0037b0] text-white shadow-sm hover:shadow active:scale-[0.98]',
        'secondary' => 'bg-[#eff4ff] hover:bg-[#dce9ff] text-[#0037b0] active:scale-[0.98]',
        'outline' => 'border border-slate-200 hover:border-slate-300 bg-white text-slate-800 shadow-xs hover:bg-slate-50',
        'ghost' => 'text-slate-600 hover:text-slate-900 hover:bg-slate-100',
        'icon' => 'bg-[#eff4ff] hover:bg-[#dce9ff] text-[#0b1c30]',
        'success' => 'bg-emerald-600 hover:bg-emerald-700 text-white shadow-sm',
        'dark' => 'bg-[#0b1c30] hover:bg-[#131b2e] text-white shadow-sm',
        default => 'bg-[#1d4ed8] text-white',
    };
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }}>
        @if($icon)
            <span class="material-symbols-outlined text-base leading-none">{{ $icon }}</span>
        @endif
        {{ $slot }}
        @if($iconRight)
            <span class="material-symbols-outlined text-base leading-none">{{ $iconRight }}</span>
        @endif
    </a>
@else
    <button {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }}>
        @if($icon)
            <span class="material-symbols-outlined text-base leading-none">{{ $icon }}</span>
        @endif
        {{ $slot }}
        @if($iconRight)
            <span class="material-symbols-outlined text-base leading-none">{{ $iconRight }}</span>
        @endif
    </button>
@endif

