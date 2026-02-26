@extends('layouts.adminLayout')

@section('title', 'Global Resident Registry')

@section('content')
<div class="space-y-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 border-b border-gray-100 pb-12">
        <div>
            <div class="inline-block bg-[#D9FF40] px-3 py-1 text-[9px] font-black uppercase border border-black/5 mb-6">
                System Registry // Resident Directory
            </div>
            <h2 class="text-7xl font-black tracking-tighter uppercase text-black leading-[0.85] italic">
                Resident <br> <span class="text-gray-200">Nodes.</span>
            </h2>
        </div>

        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="SEARCH_NODE_IDENTITY..." 
                       class="bg-white border border-black/10 rounded-xl px-6 py-4 text-[10px] font-black uppercase tracking-widest focus:outline-none focus:border-black transition-all w-72 shadow-sm">
            </div>
            <a href="{{ route('admin.home') }}" class="px-8 py-4 bg-black text-white text-[10px] font-black uppercase tracking-widest hover:bg-[#D9FF40] hover:text-black transition-all shadow-xl shadow-black/5">
                Terminal Home
            </a>
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-[3.5rem] overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">
                <tr>
                    <th class="px-10 py-6">Identity</th>
                    <th class="px-10 py-6">Email Node</th>
                    <th class="px-10 py-6">Ecosystem Hub</th>
                    <th class="px-10 py-6 text-center">Protocol Status</th>
                    <th class="px-10 py-6 text-right">Administrative Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-10 py-8">
                        <div class="flex items-center space-x-5">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=000&color=fff&bold=true" 
                                     class="w-12 h-12 rounded-2xl shadow-lg shadow-black/5 grayscale group-hover:grayscale-0 transition-all">
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-white rounded-full flex items-center justify-center border border-gray-100">
                                    <div class="w-2 h-2 {{ $user->is_banned ? 'bg-rose-500' : 'bg-[#D9FF40]' }} rounded-full border border-black animate-pulse"></div>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-black uppercase tracking-tight italic text-black">{{ $user->full_name }}</p>
                                <p class="text-[9px] font-mono text-gray-400">#RES-NODE-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-10 py-8">
                        <span class="text-[11px] font-bold text-gray-500 uppercase tracking-tight">{{ $user->email }}</span>
                    </td>
                    <td class="px-10 py-8">
                        @if($user->flatshare)
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 bg-black rounded-full"></span>
                                <span class="text-[10px] font-black uppercase text-black italic">{{ $user->flatshare->name }}</span>
                            </div>
                        @else
                            <span class="text-[9px] font-black text-gray-300 uppercase italic">Unlinked Node</span>
                        @endif
                    </td>
                    <td class="px-10 py-8 text-center">
                        <span class="inline-flex px-3 py-1 rounded-lg border-2 {{ $user->is_banned ? 'border-rose-500/20 text-rose-500' : 'border-[#D9FF40]/20 text-black' }} text-[9px] font-black uppercase italic">
                            {{ $user->is_banned ? 'Banned' : 'Authorized' }}
                        </span>
                    </td>
                    <td class="px-10 py-8 text-right">
                        <form action="{{ route($user->is_banned ? 'admin.user.unban' : 'admin.user.ban', $user->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="text-[10px] font-black uppercase {{ $user->is_banned ? 'text-black' : 'text-rose-500' }} hover:underline underline-offset-8 decoration-2 italic tracking-widest transition-all">
                                {{ $user->is_banned ? 'Restore_Access' : 'Terminate_Node' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection