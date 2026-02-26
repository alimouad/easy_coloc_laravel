@extends('layouts.adminLayout')

@section('title', 'Global Registry')

@section('content')
<div class="space-y-16">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-12">
        <div>
            <div class="inline-block bg-[#D9FF40] px-3 py-1 text-[9px] font-black uppercase border border-black/5 mb-6">
                Terminal Mode: Global Authority
            </div>
            <h2 class="text-7xl font-black tracking-tighter uppercase text-black leading-[0.85] italic">
                Network <br> <span class="text-gray-200">Registry.</span>
            </h2>
        </div>
        <div class="flex gap-12">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Total Nodes</p>
                <p class="text-5xl font-black italic tracking-tighter">{{ $usersCount }}</p>
            </div>
            <div class="border-l border-gray-200 pl-12">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Active Hubs</p>
                <p class="text-5xl font-black italic tracking-tighter">{{ $flatsharesCount }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-8 bg-white border border-gray-100 rounded-[3.5rem] p-10 shadow-sm">
            <h3 class="text-2xl font-black uppercase italic mb-10">Resident Nodes</h3>
            
            <table class="w-full text-left">
                <thead class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-50">
                    <tr>
                        <th class="pb-6">Identity</th>
                        <th class="pb-6">Ecosystem</th>
                        <th class="pb-6">Status</th>
                        <th class="pb-6 text-right">Administrative Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                    <tr class="group">
                        <td class="py-6">
                            <div class="flex items-center space-x-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=000&color=fff" class="w-10 h-10 rounded-xl">
                                <div>
                                    <p class="text-xs font-black uppercase tracking-tight">{{ $user->full_name }}</p>
                                    <p class="text-[9px] font-bold text-gray-400 uppercase">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-6 text-[10px] font-mono font-black text-gray-400 italic">
                            {{ $user->flatshare->name ?? 'UNLINKED' }}
                        </td>
                        <td class="py-6">
                            @if($user->is_banned)
                                <span class="px-2 py-0.5 bg-rose-500 text-white text-[8px] font-black uppercase rounded">BANNED</span>
                            @else
                                <span class="px-2 py-0.5 bg-[#D9FF40] text-black text-[8px] font-black uppercase rounded">ACTIVE</span>
                            @endif
                        </td>
                        <td class="py-6 text-right">
                            @if($user->is_banned)
                                <form action="{{ route('admin.user.unban', $user->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button class="text-[10px] font-black uppercase text-black hover:underline underline-offset-4 decoration-[#D9FF40] decoration-2">Restore Node</button>
                                </form>
                            @else
                                <form action="{{ route('admin.user.ban', $user->id) }}" method="POST" onsubmit="return confirm('Confirm Node Termination?')">
                                    @csrf @method('PATCH')
                                    <button class="text-[10px] font-black uppercase text-rose-500 hover:underline underline-offset-4">Terminate Access</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-10">
                {{ $users->links() }}
            </div>
        </div>

        <div class="lg:col-span-4 space-y-6">
            <h3 class="text-2xl font-black uppercase italic px-4">Ecosystem Hubs</h3>
            @foreach($flatshares as $flat)
            <div class="bg-white border border-gray-100 p-8 rounded-[2.5rem] shadow-sm group hover:border-black transition-all">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-10 h-10 bg-black flex items-center justify-center rounded-xl rotate-3 group-hover:rotate-0 transition-transform">
                        <svg class="w-5 h-5 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    </div>
                    <span class="text-[9px] font-mono text-gray-300">#{{ $flat->id }}</span>
                </div>
                <h4 class="text-lg font-black uppercase italic">{{ $flat->name }}</h4>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2">{{ $flat->users_count }} NODES CONNECTED</p>
                
                <div class="mt-6 pt-6 border-t border-gray-50 flex justify-between">
                    <a href="#" class="text-[10px] font-black uppercase tracking-widest text-black underline decoration-[#D9FF40] decoration-2 underline-offset-4">View Manifest</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection