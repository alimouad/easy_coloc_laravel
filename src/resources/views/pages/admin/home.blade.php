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
                    <p class="text-5xl font-black italic tracking-tighter">{{ number_format($usersCount) }}</p>
                </div>
                <div class="border-l border-gray-200 pl-12">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Active Hubs</p>
                    <p class="text-5xl font-black italic tracking-tighter">{{ number_format($flatsharesCount) }}</p>
                </div>
            </div>
        </div>

        <div class="flex gap-6">
            <a href="{{ route('user.home') }}"
               class="flex items-center gap-3 px-8 py-4 bg-black text-[#D9FF40] border-2 border-black rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-[#D9FF40] hover:text-black transition-all shadow-lg shadow-black/10 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span>Switch to User View</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div class="lg:col-span-8 bg-white border border-gray-100 rounded-[3.5rem] p-10 shadow-sm flex flex-col">
                <div class="flex items-center justify-between mb-10">
                    <h3 class="text-2xl font-black uppercase italic">Resident Nodes</h3>
                    <a href="{{ route('admin.users.index') }}" 
                       class="px-6 py-3 border-2 border-black text-[10px] font-black uppercase tracking-widest hover:bg-black hover:text-[#D9FF40] transition-all">
                        Show Full Registry
                    </a>
                </div>

                <div class="flex-1">
                    <table class="w-full text-left">
                        <thead class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-50">
                            <tr>
                                <th class="pb-6">Identity</th>
                                <th class="pb-6">Ecosystem</th>
                                <th class="pb-6">Reputation</th>
                                <th class="pb-6">Status</th>
                                <th class="pb-6 text-right">Administrative Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($users as $user)
                                <tr class="group">
                                    <td class="py-6">
                                        <div class="flex items-center space-x-4">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=000&color=fff"
                                                class="w-10 h-10 rounded-xl">
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
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-[#D9FF40]" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span class="text-sm font-black {{ $user->reputation_score >= 0 ? 'text-black' : 'text-rose-600' }}">{{ $user->reputation_score }}</span>
                                        </div>
                                    </td>
                                    <td class="py-6">
                                        @if ($user->is_banned)
                                            <span class="px-2 py-0.5 bg-rose-500 text-white text-[8px] font-black uppercase rounded">BANNED</span>
                                        @else
                                            <span class="px-2 py-0.5 bg-[#D9FF40] text-black text-[8px] font-black uppercase rounded">ACTIVE</span>
                                        @endif
                                    </td>
                                    <td class="py-6 text-right">
                                        @if ($user->is_banned)
                                            <form action="{{ route('admin.user.unban', $user->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button class="text-[10px] font-black uppercase text-black hover:underline underline-offset-4 decoration-[#D9FF40] decoration-2 italic">Restore Node</button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.user.ban', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Confirm Node Termination?')">
                                                @csrf @method('PATCH')
                                                <button class="text-[10px] font-black uppercase text-rose-500 hover:underline underline-offset-4 italic">Terminate Access</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-8">
                <div class="flex items-center justify-between px-4">
                    <h3 class="text-2xl font-black uppercase italic">Ecosystem Hubs</h3>
                    <a href="{{ route('admin.flatshares.index') }}" 
                       class="text-[10px] font-black text-black underline decoration-[#D9FF40] decoration-2 underline-offset-4 uppercase tracking-widest hover:text-gray-400 transition-colors">
                        Show All
                    </a>
                </div>

                @foreach ($flatshares as $flat)
                    <div class="bg-white border border-gray-100 p-8 rounded-[2.5rem] shadow-sm group hover:border-black transition-all duration-500">
                        <div class="flex justify-between items-start mb-8">
                            <div class="w-12 h-12 bg-black flex items-center justify-center rounded-2xl rotate-3 group-hover:rotate-0 transition-transform duration-300 shadow-lg shadow-black/5">
                                <svg class="w-6 h-6 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="text-right">
                                <span class="text-[9px] font-mono text-gray-300 block">HUB_REF: #{{ str_pad($flat->id, 4, '0', STR_PAD_LEFT) }}</span>
                                <span class="inline-block w-1.5 h-1.5 bg-[#D9FF40] rounded-full border border-black mt-1"></span>
                            </div>
                        </div>

                        <h4 class="text-xl font-black uppercase tracking-tighter italic mb-1">{{ $flat->name }}</h4>
                        <div class="space-y-4 mt-6">
                            <div class="flex justify-between items-end">
                                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest italic">Node Occupancy</p>
                                <p class="text-[11px] font-black text-black uppercase italic">{{ $flat->users_count }} / 10 Connected</p>
                            </div>
                            <div class="h-1.5 w-full bg-gray-50 rounded-full overflow-hidden border border-gray-100">
                                <div class="h-full bg-[#D9FF40] border-r-2 border-black transition-all duration-1000"
                                    style="width: {{ min(($flat->users_count / 10) * 100, 100) }}%"></div>
                            </div>
                        </div>

                        <div class="mt-10 pt-8 border-t border-gray-50 space-y-3">
                            <a href="{{ route('admin.flatshares.show', $flat->id) }}"
                                class="flex items-center justify-center w-full bg-black text-white py-4 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-[#D9FF40] hover:text-black transition-all shadow-xl shadow-black/5 active:scale-95">
                                Access Hub Manifest
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection