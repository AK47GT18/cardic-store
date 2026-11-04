@props(['label', 'value', 'type'])

<span class="inline-flex items-center gap-1.5 bg-slate-100/90 text-slate-700 px-3 py-1 rounded-full text-xs font-medium">
    <span class="text-slate-500">{{ $label }}:</span>
    <span class="font-bold text-slate-900">{{ $value }}</span>
    <button 
        type="button" 
        @click="clearFilter('{{ $type }}')"
        class="text-slate-400 hover:text-red-600 transition-colors cursor-pointer ml-0.5">
        <span class="material-symbols-outlined text-xs leading-none">close</span>
    </button>
</span>

