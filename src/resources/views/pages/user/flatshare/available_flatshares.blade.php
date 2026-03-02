@extends('layouts.userLayout')

@section('title', 'Registry // Available Nodes | EasyColoc')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">
        {{-- SYSTEM HEADER: Registry Intelligence --}}
        <div class="relative mb-20">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#D9FF40]/10 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="relative flex flex-col lg:flex-row lg:items-end justify-between gap-12 border-b-5 border-black pb-12">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center space-x-3 bg-black text-[#D9FF40] px-5 py-2.5 text-[10px] font-black uppercase tracking-[0.4em] mb-8 italic rounded-full shadow-2xl">
                        <span class="w-2.5 h-2.5 bg-[#D9FF40] rounded-full animate-ping"></span>
                        <span>Protocol // Discovery_Scan_Active</span>
                    </div>
                    <h1 class="text-2xl lg:text-[4rem] font-black tracking-[ -0.05em] uppercase text-black leading-[0.75] italic">
                        Available <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-200 via-gray-400 to-gray-600">Collocation.</span>
                    </h1>
                </div>
                
                <div class="lg:w-80 space-y-4">
                    <div class="bg-black p-6 rounded-[2.5rem] shadow-2xl transform lg:-rotate-2">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-[9px] font-black text-[#D9FF40] uppercase tracking-widest">Global_Status</span>
                            <div class="flex space-x-1">
                                <div class="w-1 h-3 bg-[#D9FF40]"></div>
                                <div class="w-1 h-3 bg-[#D9FF40]/40"></div>
                                <div class="w-1 h-3 bg-[#D9FF40]/20"></div>
                            </div>
                        </div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase leading-relaxed">
                            Nodes_Online: <span class="text-white">{{ $flatshares->count() }} UNIT(S)</span><br>
                            Auth_Level: <span class="text-white">PUBLIC_READ</span><br>
                            Registry: <span class="text-[#D9FF40]">SYNCED_LIVE</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if ($flatshares->isEmpty())
            {{-- EMPTY STATE: System Idle --}}
            <div class="bg-white border-4 border-black rounded-[5rem] p-32 text-center shadow-2xl relative group overflow-hidden">
                 <div class="absolute inset-0 opacity-[0.05] pointer-events-none" style="background-image: repeating-linear-gradient(45deg, #000 0, #000 1px, transparent 0, transparent 50%); background-size: 10px 10px;"></div>
                 <h3 class="text-6xl font-black tracking-tighter uppercase italic text-black mb-6 opacity-20">No_Active_Signals</h3>
                 <p class="text-xs font-black text-gray-400 uppercase tracking-[0.5em] animate-pulse">Scanning for ecosystem broadcast...</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                @foreach ($flatshares as $flatshare)
                    <div class="group relative bg-white border-2 border-gray-100 rounded-[4rem] p-12 shadow-sm hover:border-black transition-all duration-700 hover:shadow-[0_40px_100px_rgba(0,0,0,0.1)] flex flex-col overflow-hidden">
                        
                        {{-- Tactical Background Element --}}
                        <div class="absolute top-0 left-0 w-full h-2 bg-gray-100 group-hover:bg-[#D9FF40] transition-colors duration-500"></div>
                        <div class="absolute -right-12 -top-12 w-48 h-48 bg-gray-50 rounded-full group-hover:bg-[#D9FF40]/10 transition-colors duration-700 blur-3xl"></div>

                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex items-center justify-between mb-12">
                                <div class="relative">
                                    <div class="w-20 h-20 rounded-[2.5rem] bg-black flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                                        <span class="text-3xl font-black text-[#D9FF40] italic">{{ strtoupper(substr($flatshare->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-white border-4 border-black rounded-full flex items-center justify-center">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-black text-gray-300 uppercase tracking-tighter mb-1 italic">Registry_Ref</p>
                                    <p class="text-xs font-mono font-black text-black">#00{{ $flatshare->id }}</p>
                                </div>
                            </div>

                            <div class="flex-grow mb-12">
                                <h3 class="text-4xl font-black tracking-[ -0.04em] uppercase italic leading-[0.9] mb-8 group-hover:text-black transition-colors">
                                    {{ $flatshare->name }}
                                </h3>

                                <div class="space-y-6">
                                    {{-- Owner Node --}}
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center text-[10px] font-black">ID</div>
                                        <div class="flex-1 border-b border-dashed border-gray-200 pb-2">
                                            <p class="text-[8px] font-black text-gray-400 uppercase tracking-widest">Identity_Owner</p>
                                            <p class="text-xs font-black uppercase italic">{{ $flatshare->owner->full_name }}</p>
                                        </div>
                                    </div>

                                    {{-- Capacity Metric --}}
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-end">
                                            <span class="text-[8px] font-black text-gray-400 uppercase tracking-widest">Node_Load</span>
                                            <span class="text-[10px] font-mono font-black">{{ $flatshare->users_count }} / 10 <span class="text-[8px]">UNIT</span></span>
                                        </div>
                                        <div class="h-1.5 w-full bg-gray-50 rounded-full overflow-hidden border border-gray-100">
                                            <div class="h-full bg-black group-hover:bg-[#D9FF40] transition-all duration-1000" style="width: {{ ($flatshare->users_count / 10) * 100 }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
@endsection