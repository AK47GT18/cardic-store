@props([
    'variant' => 'default', // default, discount, instant, region, outline, success, primary
    'size' => 'sm',
])

@php
    $baseClasses = 'inline-flex items-center gap-1 font-semibold rounded-full ';
    $sizeClasses = match($size) {
        'xs' => 'text-[10px] leading-3 px-1.5 py-0.5',
        'md' => 'text-xs leading-4 px-3 py-1',
        default => 'text-[11px] leading-3.5 px-2 py-0.5',
    };

    $variantClasses = match($variant) {
        'discount' => 'bg-emerald-600 text-white font-bold shadow-xs',
        'instant' => 'bg-emerald-500/10 text-emerald-700 border border-emerald-500/20 font-bold',
        'region' => 'bg-white/20 backdrop-blur-md text-white font-bold',
        'primary' => 'bg-blue-600 text-white font-bold',
        'secondary' => 'bg-slate-100 text-slate-700 font-medium',
        'outline' => 'border border-slate-200 text-slate-600 font-medium',
        'crypto' => 'bg-amber-500/15 text-amber-800 border border-amber-500/30 font-bold',
        default => 'bg-blue-50 text-blue-700 font-semibold',
    };
@endphp

<span {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }}>
    {{ $slot }}
</span>

