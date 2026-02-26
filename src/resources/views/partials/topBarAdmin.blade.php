   <nav class="bg-white border-b border-black/5 px-12 h-24 flex items-center justify-between sticky top-0 z-50">
       <div class="flex items-center space-x-12">
           <div class="flex items-center space-x-4">
               <div class="w-10 h-10 bg-black flex items-center justify-center rounded-xl rotate-3">
                   <span class="text-[#D9FF40] font-black text-xl italic">E</span>
               </div>
               <h1 class="text-sm font-black uppercase tracking-widest italic">Admin.Hub</h1>
           </div>
           <div class="hidden md:flex items-center space-x-8 border-l border-gray-100 pl-12">
               <a href="{{ route('admin.home') }}"
                   class="text-[10px] font-black uppercase tracking-[0.2em] transition-colors {{ request()->routeIs('admin.home') ? 'text-black underline decoration-[#D9FF40] decoration-2 underline-offset-8' : 'text-gray-400 hover:text-black' }}">
                   Overview
               </a>

               <a href="{{ route('admin.users.index') }}"
                   class="text-[10px] font-black uppercase tracking-[0.2em] transition-colors {{ request()->routeIs('admin.users.*') ? 'text-black underline decoration-[#D9FF40] decoration-2 underline-offset-8' : 'text-gray-400 hover:text-black' }}">
                   Nodes
               </a>

               <a href="{{ route('admin.flatshares.index') }}"
                   class="text-[10px] font-black uppercase tracking-[0.2em] transition-colors {{ request()->routeIs('admin.flatshares.*') ? 'text-black underline decoration-[#D9FF40] decoration-2 underline-offset-8' : 'text-gray-400 hover:text-black' }}">
                   Flatshare
               </a>
           </div>
       </div>

       <div class="flex items-center space-x-6">
           <div class="text-right hidden sm:block">
               <p class="text-[10px] font-black uppercase leading-none">{{ auth()->user()->full_name }}</p>
               <p class="text-[8px] font-bold text-gray-400 uppercase tracking-widest mt-1">System Authority</p>
           </div>
           <form action="{{ route('auth.logout') }}" method="POST">
               @csrf
               <button
                   class="w-10 h-10 border border-black/10 rounded-xl flex items-center justify-center hover:bg-black hover:text-[#D9FF40] transition-all">
                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                           d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                   </svg>
               </button>
           </form>
       </div>
   </nav>
