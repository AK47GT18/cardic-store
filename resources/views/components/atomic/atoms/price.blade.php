@props(['price', 'original' => null, 'currency' => 'USD'])

<div {{ $attributes->merge(['class' => 'inline-flex items-baseline gap-1.5']) }}>
    <span class="text-xl font-extrabold text-[#0b1c30] tracking-tight" x-text="formatCurrency({{ $price }})">
        ${{ number_format($price, 2) }}
    </span>
    @if($original && $original > $price)
        <span class="text-xs text-slate-400 line-through font-medium" x-text="formatCurrency({{ $original }})">
            ${{ number_format($original, 2) }}
        </span>
    @endif
</div>

