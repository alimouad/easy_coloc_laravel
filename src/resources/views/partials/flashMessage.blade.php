<div class="space-y-6 mb-12 max-w-2xl mx-auto">

    {{-- CRITICAL: DATABASE ERROR --}}
    @if($errors->has('db'))
        <div
            x-data="{ show: true, percent: 100 }"
            x-init="let timer = setInterval(() => { percent -= 0.5; if(percent <= 0) { show = false; clearInterval(timer); } }, 40); setTimeout(() => show = false, 8000)"
            x-show="show"
            x-cloak
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative group flex items-center gap-6 p-6 rounded-[1.5rem] bg-black border-l-8 border-rose-600 shadow-2xl overflow-hidden"
        >
            <div class="absolute bottom-0 left-0 h-1 bg-rose-600 transition-all duration-100" :style="`width: ${percent}%` text-zinc-500"></div>

            <div class="w-14 h-14 shrink-0 rounded-2xl bg-rose-600/10 border border-rose-600/20 flex items-center justify-center text-rose-500 shadow-inner">
                <span class="material-symbols-outlined text-2xl font-black">terminal</span>
            </div>

            <div class="flex-1">
                <div class="flex items-center gap-2 mb-1">
                    <h4 class="text-[9px] font-black uppercase tracking-[0.4em] text-rose-500 italic">Critical_Infrastructure_Failure</h4>
                    <span class="text-[8px] font-mono font-bold bg-rose-600/20 text-rose-400 px-1.5 py-0.5 rounded">ERR_500</span>
                </div>
                <p class="text-sm font-black text-white uppercase italic leading-tight">{{ $errors->first('db') }}</p>
            </div>

            <button type="button" @click="show = false" class="relative z-50 w-10 h-10 flex items-center justify-center hover:bg-rose-600 hover:text-white rounded-xl transition-all active:scale-90 text-zinc-600 cursor-pointer">
                <span class="material-symbols-outlined text-lg pointer-events-none">close</span>
            </button>
        </div>
    @endif

    {{-- WARNING: VALIDATION REJECTED --}}
    @if($errors->any() && !$errors->has('db'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-cloak
            x-transition
            class="relative flex items-start gap-6 p-8 rounded-[2.5rem] bg-white border-2 border-black shadow-[12px_12px_0px_0px_rgba(0,0,0,1)] overflow-hidden"
        >
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 15px 15px;"></div>

            <div class="w-16 h-16 shrink-0 rounded-3xl bg-black flex items-center justify-center text-[#D9FF40] shadow-xl rotate-3">
                <span class="material-symbols-outlined text-3xl font-black">data_alert</span>
            </div>

            <div class="flex-1 pt-1">
                <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-black mb-4 flex items-center gap-3 italic">
                    <span class="w-8 h-[2px] bg-black"></span> Validation_Protocol_Rejected
                </h4>

                <ul class="space-y-2">
                    @foreach($errors->all() as $error)
                        <li class="flex items-start gap-3 text-xs font-bold text-gray-700 uppercase italic">
                            <span class="text-rose-600 font-black">>></span> {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <button type="button" @click="show = false" class="relative z-50 w-12 h-12 rounded-2xl bg-gray-50 hover:bg-black hover:text-[#D9FF40] transition-all flex items-center justify-center text-gray-400 group cursor-pointer">
                <span class="material-symbols-outlined text-sm group-hover:rotate-90 pointer-events-none">close</span>
            </button>
        </div>
    @endif

    {{-- SYSTEM SUCCESS: AUTHORIZED --}}
    @if(session('success'))
        <div
            x-data="{ show: true, percent: 100 }"
            x-init="let timer = setInterval(() => { percent -= 0.7; if(percent <= 0) { show = false; clearInterval(timer); } }, 40)"
            x-show="show"
            x-cloak
            x-transition:enter="transition cubic-bezier(0.175, 0.885, 0.32, 1.275) duration-600"
            x-transition:enter-start="opacity-0 scale-95"
            class="relative flex items-center gap-6 p-6 rounded-[2rem] bg-black text-white border-b-8 border-[#D9FF40] shadow-2xl overflow-hidden"
        >
            <div class="absolute top-0 left-0 h-1 bg-[#D9FF40] opacity-30" :style="`width: ${percent}%` text-zinc-500"></div>

            <div class="w-14 h-14 shrink-0 rounded-2xl bg-[#D9FF40] flex items-center justify-center text-black shadow-[0_0_30px_rgba(217,255,64,0.3)]">
                <span class="material-symbols-outlined text-2xl font-black">verified_user</span>
            </div>

            <div class="flex-1 relative z-10">
                <h4 class="text-[9px] font-black uppercase tracking-[0.4em] text-[#D9FF40] mb-0.5 italic">Protocol_Authorized</h4>
                <p class="text-sm font-black tracking-tight uppercase italic text-gray-100">{{ session('success') }}</p>
            </div>

            <button type="button" @click="show = false" class="relative z-50 w-12 h-12 rounded-2xl bg-gray-50 hover:bg-black hover:text-[#D9FF40] transition-all flex items-center justify-center text-gray-400 group cursor-pointer">
                <span class="material-symbols-outlined text-sm group-hover:rotate-90 pointer-events-none">close</span>
            </button>
        </div>
    @endif

</div>