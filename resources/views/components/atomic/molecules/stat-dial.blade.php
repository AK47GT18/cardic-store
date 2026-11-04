@props([
    'title' => 'Avg Delivery Speed',
    'value' => '43s',
    'subtitle' => 'Instant Digital Key',
    'icon' => 'bolt',
    'percent' => 88,
    'color' => '#10b981', // emerald
])

<div class="flex items-center gap-3.5 bg-white p-3.5 rounded-2xl border border-slate-100/80 shadow-xs">
    {{-- Gauge Visual Arc --}}
    <div class="relative w-12 h-12 shrink-0 flex items-center justify-center">
        <svg class="w-12 h-12 -rotate-90" viewBox="0 0 36 36">
            {{-- Background Ring --}}
            <path
                class="text-slate-100"
                stroke-width="3.5"
                stroke="currentColor"
                fill="none"
                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
            />
            {{-- Value Ring --}}
            <path
                stroke-dasharray="{{ $percent }}, 100"
                stroke-linecap="round"
                stroke-width="3.5"
                stroke="{{ $color }}"
                fill="none"
                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
            />
        </svg>
        <span class="material-symbols-outlined text-lg absolute" style="color: {{ $color }}">{{ $icon }}</span>
    </div>

    <div>
        <div class="text-base font-extrabold text-[#0b1c30] tracking-tight leading-none">{{ $value }}</div>
        <div class="text-xs font-semibold text-slate-500 mt-1 leading-tight">{{ $title }}</div>
        <div class="text-[10px] text-slate-400 font-medium leading-tight">{{ $subtitle }}</div>
    </div>
</div>

