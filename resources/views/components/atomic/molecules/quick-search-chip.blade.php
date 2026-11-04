@props(['label', 'query' => null])

@php
    $targetQuery = $query ?? $label;
@endphp

<button 
    type="button"
    @click="searchQuery = '{{ $targetQuery }}'; applyFilter()"
    class="bg-slate-100/90 hover:bg-blue-100 hover:text-blue-800 text-slate-600 px-2.5 py-1 rounded-md text-xs font-semibold transition-colors duration-150 cursor-pointer">
    {{ $label }}
</button>

