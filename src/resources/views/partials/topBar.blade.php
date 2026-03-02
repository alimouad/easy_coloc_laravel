<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-gray-200/50 px-6 lg:px-12 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div
                class="w-11 h-11 bg-black rounded-2xl flex items-center justify-center shadow-xl rotate-3 hover:rotate-0 transition-transform duration-500 cursor-pointer">
                <span class="text-[#D9FF40] font-black text-2xl tracking-tighter">E</span>
            </div>
            <div class="hidden sm:block">
                <h1 class="text-xl font-black tracking-tighter uppercase leading-none italic">EasyColoc</h1>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-[0.2em] mt-0.5">Logistics of Living</p>
            </div>
        </div>

        <div class="hidden md:flex items-center p-1 bg-gray-100 rounded-2xl border border-gray-200">
            <a href="{{ route('user.home') }}"
                class="px-6 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition {{ request()->routeIs('user.home') ? 'bg-white shadow-sm text-black' : 'text-gray-400 hover:text-black' }}">
                Dashboard
            </a>

            <a href="{{ route('user.flatshare.available') }}"
                class="px-6 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition {{ request()->routeIs('user.flatshare.available') ? 'bg-white shadow-sm text-black' : 'text-gray-400 hover:text-black' }}">
                Flatshares
            </a>

            <a href="{{ route('user.profile') }}"
                class="px-6 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition {{ request()->routeIs('user.profile') ? 'bg-white shadow-sm text-black' : 'text-gray-400 hover:text-black' }}">
                Profile
            </a>

            {{-- <a href="{{ route('user.history') }}"
                class="px-6 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition {{ request()->routeIs('user.flatshare.*') ? 'bg-white shadow-sm text-black' : 'text-gray-400 hover:text-black' }}">
                History
            </a> --}}

        </div>

        <div class="flex items-center space-x-3">
            @if(!auth()->user()->flatshare_id)
            <button
                class="hidden lg:flex bg-black text-white px-5 py-2.5 rounded-2xl font-black text-[10px] uppercase tracking-widest items-center space-x-2 hover:bg-zinc-800 transition active:scale-95 shadow-xl shadow-black/10"
                onclick="openModal()">
                <svg class="w-3.5 h-3.5 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>New Coloc</span>
            </button>
            @endif



            <a href="{{ route('user.profile') }}" title="View Profile"
                class="h-11 w-11 rounded-2xl bg-gray-200 overflow-hidden border-2 border-white shadow-sm ring-1 ring-gray-100 hover:ring-[#D9FF40] transition-all cursor-pointer">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->full_name) }}&background=D9FF40&color=000"
                    class="w-full h-full object-cover">
            </a>
            <form method="POST" action="{{ route('auth.logout') }}" class="inline">
                @csrf
                <button type="submit" title="Terminate Session"
                    class="group flex items-center justify-center w-11 h-11 bg-white border border-gray-200 rounded-2xl hover:bg-rose-50 hover:border-rose-100 transition-all duration-300">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-rose-500 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
