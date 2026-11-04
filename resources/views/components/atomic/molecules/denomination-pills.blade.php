@props(['denominations' => [25, 50, 100], 'default' => 50, 'discount' => 5.0])

<div class="mt-2.5">
    <div class="mb-1.5">
        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Select Value:</span>
    </div>
    <div class="grid grid-cols-4 gap-1.5">
        @foreach($denominations as $denom)
            <button 
                type="button"
                @click="selectedDenom = {{ $denom }}; activePrice = ({{ $denom }} * (1 - {{ $discount }} / 100)).toFixed(2); activeSavings = ({{ $denom }} * ({{ $discount }} / 100)).toFixed(2)"
                :class="selectedDenom === {{ $denom }} 
                    ? 'bg-[#1d4ed8] text-white font-bold shadow-xs scale-[1.02]' 
                    : 'bg-[#eff4ff] hover:bg-[#dce9ff] text-slate-700 font-semibold'"
                class="py-1.5 rounded-lg text-xs transition-all duration-150 cursor-pointer text-center">
                ${{ $denom }}
            </button>
        @endforeach
    </div>
</div>

