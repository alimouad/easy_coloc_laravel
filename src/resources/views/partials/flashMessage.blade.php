<div class="space-y-4 mb-6">

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
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            x-cloak
            class="flex items-center gap-4 p-5 rounded-3xl bg-rose-50 text-rose-600 border border-rose-100 shadow-lg"
        >
            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-rose-500 shadow-sm">
                <span class="material-symbols-outlined">database_off</span>
            </div>

            <div class="flex-1">
                <h4 class="text-xs font-bold uppercase tracking-widest opacity-70">
                    Execution Failed
                </h4>
                <p class="text-sm font-semibold">
                    {{ $errors->first('db') }}
                </p>
            </div>

            <button @click="show = false"
                    class="text-rose-400 hover:text-rose-600 transition">
                <span class="material-symbols-outlined">close</span>
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
            class="flex items-center gap-5 p-6 rounded-3xl bg-rose-50 border border-rose-100 shadow-lg"
        >
            <div class="w-14 h-14 rounded-2xl bg-rose-500 flex items-center justify-center text-white shadow-md">
                <span class="material-symbols-outlined text-2xl">report</span>
            </div>

            <div class="flex-1 text-sm font-semibold text-slate-700">
                <h4 class="text-xs font-bold uppercase tracking-widest text-rose-600 mb-2">
                    Attention Required
                </h4>

                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <button @click="show = false"
                    class="w-9 h-9 rounded-lg hover:bg-rose-100 transition flex items-center justify-center">
                <span class="material-symbols-outlined text-rose-400 hover:text-rose-600">
                    close
                </span>
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
            class="flex items-center gap-4 p-5 rounded-3xl bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-lg"
        >
            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-emerald-500 shadow-sm">
                <span class="material-symbols-outlined">check_circle</span>
            </div>

            <div class="flex-1">
                <h4 class="text-xs font-bold uppercase tracking-widest opacity-70">
                    Success
                </h4>
                <p class="text-sm font-semibold">
                    {{ session('success') }}
                </p>
            </div>

            <button @click="show = false"
                    class="text-emerald-400 hover:text-emerald-600 transition">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    @endif

</div>
