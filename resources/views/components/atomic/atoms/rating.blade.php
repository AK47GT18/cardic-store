@props(['rating' => 5.0, 'reviews' => null, 'size' => 'sm'])

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-1']) }}>
    <span class="material-symbols-outlined text-amber-400 text-sm leading-none" style="font-variation-settings: 'FILL' 1;">star</span>
    <span class="font-bold text-xs text-slate-800">{{ number_format($rating, 1) }}</span>
    @if($reviews !== null)
        <span class="text-[11px] text-slate-400 font-normal">({{ is_numeric($reviews) && $reviews >= 1000 ? round($reviews / 1000, 1) . 'k' : $reviews }})</span>
    @endif
</div>

