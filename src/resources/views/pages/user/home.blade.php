@extends('layouts.userLayout')

@section('title', 'Home | DarColoc')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">
        @foreach ($pendingInvites as $invite)
            <div class="mb-12 relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-zinc-800 via-[#D9FF40] to-zinc-800 rounded-[4rem] opacity-20 group-hover:opacity-40 blur-xl transition duration-1000">
                </div>

                <div
                    class="relative bg-zinc-950 border border-white/5 rounded-[3.5rem] p-8 md:px-10 py-6 shadow-2xl overflow-hidden">

                    <div class="absolute top-0 left-0 w-1.5 h-full bg-[#D9FF40] shadow-[0_0_15px_rgba(217,255,64,0.4)]">
                    </div>

                    <div class="flex flex-col xl:flex-row gap-12 items-center relative z-10">

                        <div
                            class="flex flex-col items-center xl:items-start text-center xl:text-left space-y-6 min-w-[300px]">
                            <div class="relative">
                                <div
                                    class="w-24 h-24 rounded-[2.5rem] bg-zinc-900 border-4 border-zinc-800 shadow-2xl overflow-hidden -rotate-3 group-hover:rotate-0 transition-all duration-500">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($invite->flatshare->name) }}&background=D9FF40&color=000&size=128"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all">
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 w-10 h-10 bg-white rounded-2xl flex items-center justify-center shadow-lg border-4 border-zinc-950">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                            </div>

                            <div>
                                <span
                                    class="text-[10px] font-black uppercase tracking-[0.4em] text-[#D9FF40] bg-[#D9FF40]/10 px-3 py-1 rounded-full">Protocol
                                    Pending</span>
                                <h3
                                    class="text-4xl font-black tracking-tighter uppercase text-white mt-3 italic leading-none">
                                    {{ $invite->flatshare->name }}
                                </h3>
                            </div>
                        </div>

                        <div class="hidden xl:block w-[1px] h-24 bg-zinc-800/50"></div>

                        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-8 w-full">

                            <div class="space-y-4">
                                <div class="flex items-center space-x-4 group/info">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-zinc-900 flex items-center justify-center border border-white/5 group-hover/info:border-[#D9FF40]/30 transition-colors">
                                        <svg class="w-5 h-5 text-zinc-500 group-hover/info:text-[#D9FF40]" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[9px] font-black text-zinc-500 uppercase tracking-widest">Authorized
                                            By</p>
                                        <p class="text-xs font-bold text-zinc-200">
                                            {{ $invite->flatshare->owner->full_name }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4 group/info">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-zinc-900 flex items-center justify-center border border-white/5 group-hover/info:border-[#D9FF40]/30 transition-colors">
                                        <svg class="w-5 h-5 text-zinc-500 group-hover/info:text-[#D9FF40]" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[9px] font-black text-zinc-500 uppercase tracking-widest">
                                            Transmission</p>
                                        <p class="text-xs font-bold text-zinc-200">
                                            {{ $invite->created_at->format('d M, Y • H:i') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col justify-center space-y-3">
                                <form action="{{ route('user.invitation.accept', $invite->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-[#D9FF40] text-black py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-white transition-all shadow-xl shadow-[#D9FF40]/10 active:scale-95 flex items-center justify-center space-x-3">
                                        <span>Authorize Access</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </button>
                                </form>

                                <form action="{{ route('user.invitation.decline', $invite->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full bg-transparent text-zinc-600 py-3 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:text-rose-500 transition-colors italic">
                                        Terminate Connection
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-16 gap-12">
            <div class="space-y-8">
                <div class="space-y-4">
                    <div
                        class="inline-flex items-center space-x-2 bg-white px-3 py-1 rounded-full border border-gray-100 shadow-sm">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest italic">Live Network
                            Access</span>
                    </div>
                    <h2 class="text-7xl font-black tracking-tighter uppercase text-gray-900 leading-[0.85]">
                        Shared <br> <span class="text-gray-200">Collocation.</span>
                    </h2>
                </div>


            </div>
            <div class="flex flex-col gap-5">
                <div class="flex gap-6">
                    <div
                        class="bg-black p-8 rounded-[3rem] text-white flex flex-col justify-between w-48 h-40 shadow-2xl transition-transform hover:rotate-2 border border-white/10">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Net Balance</span>
                        <span class="text-3xl font-black tracking-tighter italic {{ auth()->user()->net_balance > 0 ? 'text-emerald-400' : (auth()->user()->net_balance < 0 ? 'text-rose-400' : 'text-white') }}">{{ auth()->user()->net_balance >= 0 ? '+' : '' }}{{ number_format(auth()->user()->net_balance, 2) }}<span
                            class="text-xs ml-1 {{ auth()->user()->net_balance > 0 ? 'text-emerald-300' : (auth()->user()->net_balance < 0 ? 'text-rose-300' : 'text-[#D9FF40]') }}">MAD</span></span>
                    </div>

                    <div
                        class="bg-white p-8 rounded-[3rem] border border-gray-200 flex flex-col justify-between w-48 h-40 shadow-sm transition-transform hover:-rotate-2">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Reputation</span>
                        <div class="flex items-end justify-between">
                            <span class="text-3xl font-black tracking-tighter italic">{{ auth()->user()->reputation_score }}</span>
                            <div
                                class="w-10 h-10 rounded-2xl bg-[#D9FF40] flex items-center justify-center shadow-lg shadow-[#D9FF40]/20 border border-black/5">
                                <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
                <button onclick="openCategoryModal()"
                    class="group flex items-center space-x-4 px-6 py-3 border-2 border-black rounded-2xl hover:bg-black transition-all active:scale-95 shadow-xl shadow-black/5">
                    <div
                        class="w-6 h-6 bg-black group-hover:bg-[#D9FF40] rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 text-[#D9FF40] group-hover:text-black transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span
                        class="text-[11px] font-black uppercase tracking-[0.2em] text-black group-hover:text-white transition-colors italic w-fill">Initialize_Category</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">

            @if ($myFlatshare)
                <div
                    class="bg-white p-8 rounded-[3.5rem] border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-[#D9FF40] opacity-0 group-hover:opacity-10 blur-[80px] transition-opacity duration-700">
                    </div>

                    <div class="flex justify-between items-start mb-10 relative z-10">
                        <div>
                            <span
                                class="inline-block bg-black text-[#D9FF40] text-[10px] font-black px-4 py-1.5 rounded-xl uppercase tracking-widest">
                                {{ $myFlatshare->status }}
                            </span>
                            <p class="text-[9px] font-bold text-gray-400 mt-2 uppercase tracking-tighter">
                                Ref:
                                #DC-{{ $myFlatshare->created_at->format('y') }}-{{ str_pad($myFlatshare->id, 3, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>

                        <div
                            class="w-12 h-12 rounded-2xl border-4 border-white shadow-lg bg-gray-50 flex items-center justify-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($myFlatshare->name) }}&background=D9FF40&color=000"
                                class="w-full h-full rounded-xl object-cover">
                        </div>
                    </div>

                    <h3 class="text-3xl font-black tracking-tighter uppercase mb-2 truncate"
                        title="{{ $myFlatshare->name }}">
                        {{ $myFlatshare->name }}
                    </h3>

                    <div class="flex items-center space-x-2 mb-8">
                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                        </svg>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Active
                            Infrastructure</span>
                    </div>

                    <div class="bg-gray-50 rounded-[2.5rem] p-6 space-y-4">
                        <div class="flex justify-between items-end">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Invite
                                Token</span>
                            <span
                                class="text-[10px] font-mono font-black text-black select-all bg-white px-2 py-1 rounded-lg border border-gray-100">
                                {{ $myFlatshare->invite_token }}
                            </span>
                        </div>
                        <div class="h-3 w-full bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-black group-hover:bg-[#D9FF40] transition-all duration-700 w-[75%]">
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('user.flatshare.show', $myFlatshare->id) }}"
                        class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center opacity-40 group-hover:opacity-100 transition-opacity cursor-pointer">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Open Dashboard</span>
                        <div
                            class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center group-hover:bg-black group-hover:text-[#D9FF40] transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M17 8l4 4m0 0l-4 4m4 4H3"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            @endif

            {{-- 2. CONDITIONAL ACTION BUTTON --}}
            @if (!auth()->user()->flatshare_id)
                <button onclick="openModal()"
                    class="h-full min-h-[430px] border-4 border-dashed border-gray-200 rounded-[3.5rem] flex flex-col items-center justify-center text-gray-300 hover:border-black hover:text-black hover:bg-white transition-all duration-500 group">
                    <div
                        class="w-20 h-20 rounded-[2.5rem] bg-gray-50 flex items-center justify-center mb-6 group-hover:bg-[#D9FF40] transition-colors duration-500 shadow-sm">
                        <svg class="w-10 h-10 group-hover:text-black" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-xs font-black uppercase tracking-[0.3em] group-hover:tracking-[0.4em] transition-all">Launch
                        New Coloc</span>
                </button>
            @else
                {{-- "Locked" State for Assigned Nodes --}}
                <div
                    class="h-full min-h-[430px] bg-gray-100/50 border-2 border-gray-200 rounded-[3.5rem] flex flex-col items-center justify-center p-10 text-center">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-4 shadow-sm text-gray-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Creation Restricted</p>
                    <p class="text-xs font-bold text-gray-500 mt-2 leading-relaxed">Your node is already assigned to an
                        active ecosystem. Only one concurrent session is permitted.</p>
                </div>
            @endif

        </div>
    </main>

    <div id="colocModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-6 transition-all">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-md transition-opacity" onclick="closeModal()"></div>
        <div class="bg-white w-full max-w-xl rounded-[4rem] p-12 relative z-10 shadow-2xl border border-white">
            <div class="flex justify-between items-start mb-10">
                <div>
                    <span
                        class="text-[10px] font-black text-purple-600 bg-purple-50 px-4 py-1.5 rounded-full uppercase tracking-widest">Protocol:
                        Initialize</span>
                    <h3 class="text-4xl font-black tracking-tighter text-gray-900 mt-4 uppercase">Create Space</h3>
                </div>
                <button onclick="closeModal()"
                    class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 hover:text-black hover:bg-gray-100 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.flatshare.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label
                        class="text-[10px] font-black uppercase text-gray-400 mb-2 ml-1 block tracking-widest">Colocation
                        Name</label>
                    <input type="text" name="name" required placeholder="e.g. Maarif Studio"
                        class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm font-bold focus:bg-white focus:border-black transition-all outline-none">
                </div>

                <div class="bg-zinc-950 rounded-[2.5rem] p-8 relative overflow-hidden group border border-white/5">
                    <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#D9FF40] opacity-10 blur-2xl"></div>
                    <div class="flex justify-between items-center mb-6 relative z-10">
                        <span class="text-[10px] font-black text-[#D9FF40] uppercase tracking-widest">Invite
                            Protocol</span>
                        <span
                            class="bg-[#D9FF40] text-[8px] font-black px-2 py-0.5 rounded shadow-sm text-black">AUTO-GEN</span>
                    </div>
                    <div class="text-2xl font-mono font-black text-white relative z-10 tracking-tighter">
                        INV-<span class="text-[#D9FF40]">XXXXXX</span>
                    </div>
                    <p class="text-[9px] text-zinc-500 uppercase font-bold mt-4">A unique secure token will be generated on
                        submission.</p>
                </div>

                <button type="submit"
                    class="w-full bg-black text-white py-6 rounded-[2rem] font-black uppercase tracking-widest text-xs shadow-xl hover:bg-zinc-800 transition-all active:scale-95">
                    Confirm Initialization
                </button>
            </form>
        </div>
    </div>
    <div id="categoryModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-6">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-md" onclick="closeCategoryModal()"></div>

        <div
            class="relative bg-white w-full max-w-lg rounded-[3.5rem] shadow-[0_40px_120px_rgba(0,0,0,0.3)] border border-black/5 overflow-hidden transition-all transform scale-100">

            <div class="p-10 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <div>
                    <p
                        class="text-[9px] font-black text-[#D9FF40] bg-black px-2 py-0.5 inline-block uppercase tracking-widest mb-2 italic">
                        Protocol: Node_Setup</p>
                    <h3 class="text-3xl font-black uppercase tracking-tighter italic">Init Category</h3>
                </div>
                <button onclick="closeCategoryModal()"
                    class="w-12 h-12 flex items-center justify-center rounded-2xl hover:bg-black hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.categories.store') }}" method="POST" class="p-10 space-y-8">
                @csrf

                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 pl-2">Label
                        Identity</label>
                    <input type="text" name="name" required placeholder="e.g. PREMIUM_FLATS"
                        class="w-full bg-gray-50 border-2 border-transparent focus:border-black focus:bg-white rounded-2xl px-6 py-4 text-xs font-black uppercase tracking-widest outline-none transition-all">
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 pl-2">Infrastructure
                        Icon</label>
                    <div class="grid grid-cols-4 gap-4">
                        @php
                            $icons = ['home', 'office-building', 'academic-cap', 'user-group'];
                        @endphp
                        @foreach ($icons as $iconName)
                            <label class="cursor-pointer">
                                <input type="radio" name="icon" value="{{ $iconName }}" class="peer hidden"
                                    {{ $loop->first ? 'checked' : '' }}>
                                <div
                                    class="aspect-square bg-gray-50 border-2 border-transparent rounded-2xl flex items-center justify-center text-gray-400 peer-checked:border-black peer-checked:bg-white peer-checked:text-black transition-all group">
                                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        @if ($iconName == 'home')
                                            <path
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        @endif
                                        @if ($iconName == 'office-building')
                                            <path
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        @endif
                                        @if ($iconName == 'academic-cap')
                                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        @endif
                                        @if ($iconName == 'user-group')
                                            <path
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        @endif
                                    </svg>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit"
                        class="w-full bg-black text-white py-5 rounded-3xl text-[11px] font-black uppercase tracking-[0.3em] hover:bg-[#D9FF40] hover:text-black transition-all shadow-xl shadow-black/10 active:scale-[0.97]">
                        Confirm_Infrastructure_Node
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCategoryModal() {
            const modal = document.getElementById('categoryModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Lock scroll
        }

        function closeCategoryModal() {
            const modal = document.getElementById('categoryModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto'; // Unlock scroll
        }

        function openModal() {
            document.getElementById('colocModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('colocModal').classList.add('hidden');
        }
    </script>
@endsection
