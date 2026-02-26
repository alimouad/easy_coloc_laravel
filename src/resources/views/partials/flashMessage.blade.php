<div class="space-y-4 mb-8 max-w-2xl mx-auto lg:mx-0"> {{-- Fixed width here --}}

    {{-- Database Error --}}
    @if($errors->has('db'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 8000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-cloak
            class="flex items-center gap-4 p-5 rounded-[2rem] bg-zinc-950 text-rose-500 border border-white/5 shadow-2xl"
        >
            <div class="w-12 h-12 rounded-2xl bg-rose-500/10 flex items-center justify-center text-rose-500 shadow-sm border border-rose-500/20">
                <span class="material-symbols-outlined font-bold">database_off</span>
            </div>

            <div class="flex-1">
                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-rose-400 opacity-70">
                    Execution Failed
                </h4>
                <p class="text-sm font-bold text-white tracking-tight mt-0.5">
                    {{ $errors->first('db') }}
                </p>
            </div>

            <button @click="show = false" class="p-2 hover:bg-white/5 rounded-xl transition text-zinc-500">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        </div>
    @endif


    {{-- Validation Errors --}}
    @if($errors->any() && !$errors->has('db'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 10000)"
            x-show="show"
            x-transition
            x-cloak
            class="flex items-center gap-5 p-6 rounded-[2.5rem] bg-white border border-rose-100 shadow-xl shadow-rose-900/5"
        >
            <div class="w-14 h-14 rounded-2xl bg-rose-600 flex items-center justify-center text-white shadow-lg shadow-rose-200">
                <span class="material-symbols-outlined text-2xl font-bold">report</span>
            </div>

            <div class="flex-1 text-sm font-bold text-slate-700">
                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-rose-600 mb-2">
                    Attention Required
                </h4>

                <ul class="space-y-1 opacity-80">
                    @foreach($errors->all() as $error)
                        <li class="flex items-center gap-2">
                            <span class="w-1 h-1 bg-rose-400 rounded-full"></span>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <button @click="show = false" class="w-10 h-10 rounded-xl hover:bg-rose-50 transition flex items-center justify-center text-rose-300 hover:text-rose-600">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        </div>
    @endif


    {{-- Success Message --}}
    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            x-transition
            x-cloak
            class="flex items-center gap-4 p-5 rounded-[2rem] bg-zinc-950 text-white border border-white/5 shadow-2xl"
        >
            <div class="w-12 h-12 rounded-2xl bg-[#D9FF40] flex items-center justify-center text-black shadow-lg shadow-[#D9FF40]/20">
                <span class="material-symbols-outlined font-black">check_circle</span>
            </div>

            <div class="flex-1">
                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-[#D9FF40]">
                    System Success
                </h4>
                <p class="text-sm font-bold tracking-tight mt-0.5">
                    {{ session('success') }}
                </p>
            </div>

            <button @click="show = false" class="p-2 hover:bg-white/5 rounded-xl transition text-zinc-500">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        </div>
    @endif

</div>