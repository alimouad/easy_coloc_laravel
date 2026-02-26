@extends('layouts.adminLayout')

@section('title', 'All Ecosystems')

@section('content')
<div class="space-y-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 border-b border-gray-100 pb-12">
        <div>
            <div class="inline-block bg-[#D9FF40] px-3 py-1 text-[9px] font-black uppercase border border-black/5 mb-6">
                Infrastructure Registry // Hub Directory
            </div>
            <h2 class="text-7xl font-black tracking-tighter uppercase text-black leading-[0.85] italic">
                Ecosystem <br> <span class="text-gray-200">Collocation.</span>
            </h2>
        </div>

        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="SEARCH_HUB_ID..." 
                       class="bg-white border border-black/10 rounded-xl px-6 py-4 text-[10px] font-black uppercase tracking-widest focus:outline-none focus:border-black transition-all w-64">
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
                    <th class="px-10 py-6">Hub Identity</th>
                    <th class="px-10 py-6">Owner Node</th>
                    <th class="px-10 py-6">Node Occupancy</th>
                    <th class="px-10 py-6">System Status</th>
                    <th class="px-10 py-6 text-right">Administrative Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($flatshares as $flat)
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-10 py-8">
                        <div class="flex items-center space-x-5">
                            <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center rotate-3 group-hover:rotate-0 transition-transform shadow-lg shadow-black/5">
                                <svg class="w-6 h-6 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-black uppercase tracking-tight italic">{{ $flat->name }}</p>
                                <p class="text-[9px] font-mono text-gray-400">#HUB-{{ str_pad($flat->id, 4, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-10 py-8">
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($flat->owner->full_name) }}&background=000&color=fff" 
                                 class="w-8 h-8 rounded-lg shadow-sm">
                            <span class="text-[10px] font-black uppercase text-gray-500">{{ $flat->owner->full_name }}</span>
                        </div>
                    </td>
                    <td class="px-10 py-8">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 h-1.5 w-24 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-black" style="width: {{ min(($flat->users_count / 10) * 100, 100) }}%"></div>
                            </div>
                            <span class="text-[10px] font-black uppercase">{{ $flat->users_count }} / 10</span>
                        </div>
                    </td>
                    <td class="px-10 py-8">
                        <span class="inline-flex items-center space-x-2 bg-[#D9FF40]/20 px-3 py-1 rounded-full border border-[#D9FF40]/30">
                            <span class="w-1.5 h-1.5 bg-black rounded-full animate-pulse"></span>
                            <span class="text-[8px] font-black uppercase">{{ $flat->status}}</span>
                        </span>
                    </td>
                    <td class="px-10 py-8 text-right">
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('admin.flatshares.show', $flat->id) }}" 
                               class="text-[10px] font-black uppercase tracking-widest text-black underline decoration-[#D9FF40] decoration-2 underline-offset-4 hover:text-gray-400 transition-colors">
                                Access Manifest
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection