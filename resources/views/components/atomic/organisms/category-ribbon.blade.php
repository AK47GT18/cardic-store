@props(['categories' => []])

<div class="h-12 bg-[#eff4ff] border-b border-slate-200/60 px-4 sm:px-8">
    <div class="max-w-7xl mx-auto h-full flex items-center gap-6 overflow-x-auto no-scrollbar text-slate-600 text-xs font-semibold">
        @foreach($categories as $cat)
            <button 
                type="button"
                @click="selectedCategory = '{{ $cat['id'] }}'; applyFilter()"
                :class="selectedCategory === '{{ $cat['id'] }}' 
                    ? 'text-[#0037b0] border-b-2 border-[#0037b0] font-bold pb-0.5' 
                    : 'hover:text-[#0037b0]'"
                class="flex items-center gap-1.5 whitespace-nowrap transition-colors duration-150 py-3 cursor-pointer shrink-0">
                <span class="material-symbols-outlined text-base">{{ $cat['icon'] }}</span>
                <span>{{ $cat['name'] }}</span>
                @if($cat['count'] > 0)
                    <span class="text-[10px] bg-white/80 text-slate-500 px-1.5 py-0.2 rounded-full font-bold ml-0.5">
                        {{ $cat['count'] }}
                    </span>
                @endif
            </button>
        @endforeach
    </div>
</div>

