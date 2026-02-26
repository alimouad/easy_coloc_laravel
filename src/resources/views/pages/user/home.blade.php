@extends('layouts.userLayout')

@section('title', 'Home | DarColoc')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">

        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-12 gap-8">
            <div class="space-y-2">
                <div
                    class="inline-flex items-center space-x-2 bg-white px-3 py-1 rounded-full border border-gray-100 shadow-sm">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest italic">Live Network
                        Access</span>
                </div>
                <h2 class="text-5xl font-black tracking-tighter uppercase text-gray-900 leading-none">
                    Shared <br> <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Infrastructure.</span>
                </h2>
            </div>

            <div class="flex gap-4">
                <div
                    class="bg-black p-6 rounded-[2rem] text-white flex flex-col justify-between w-40 h-32 shadow-2xl transition-transform hover:scale-105">
                    <span class="text-[9px] font-bold text-gray-500 uppercase tracking-widest">Net Balance</span>
                    <span class="text-2xl font-black tracking-tighter">14,200<span
                            class="text-xs ml-1 text-[#D9FF40]">MAD</span></span>
                </div>
                <div
                    class="bg-white p-6 rounded-[2rem] border border-gray-200 flex flex-col justify-between w-40 h-32 shadow-sm transition-transform hover:scale-105">
                    <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Reputation</span>
                    <div class="flex items-end justify-between">
                        <span class="text-2xl font-black tracking-tighter italic">4.95</span>
                        <div
                            class="w-8 h-8 rounded-full bg-[#D9FF40] flex items-center justify-center shadow-lg shadow-[#D9FF40]/20">
                            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">

            @foreach ($flatshares as $flat)
                <div
                    class="bg-white p-8 rounded-[3.5rem] border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 group relative">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-[#D9FF40] opacity-0 group-hover:opacity-10 blur-[80px] transition-opacity duration-700">
                    </div>

                    <div class="flex justify-between items-start mb-10 relative z-10">
                        <div>
                            <span
                                class="inline-block {{ $flat->status === 'ACTIVE' ? 'bg-black text-[#D9FF40]' : 'bg-red-100 text-red-600' }} text-[10px] font-black px-4 py-1.5 rounded-xl uppercase tracking-widest">
                                {{ $flat->status }}
                            </span>
                            <p class="text-[9px] font-bold text-gray-400 mt-2 uppercase tracking-tighter">
                                Ref: #DC-{{ $flat->created_at->format('y') }}-{{ str_pad($flat->id, 3, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>

                        <div class="flex -space-x-3">
                            <img class="w-12 h-12 rounded-2xl border-4 border-white shadow-lg"
                                src="https://ui-avatars.com/api/?name={{ urlencode($flat->name) }}&background=random"
                                alt="Member">
                            <div
                                class="w-12 h-12 rounded-2xl border-4 border-white shadow-lg bg-gray-50 flex items-center justify-center text-[10px] font-black text-gray-400">
                                +1
                            </div>
                        </div>
                    </div>

                    <h3 class="text-3xl font-black tracking-tighter uppercase mb-2 truncate" title="{{ $flat->name }}">
                        {{ $flat->name }}
                    </h3>

                    <div class="flex items-center space-x-2 mb-8">
                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                        </svg>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Casablanca Hub</span>
                    </div>

                    <div class="bg-gray-50 rounded-[2.5rem] p-6 space-y-4">
                        <div class="flex justify-between items-end">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Network
                                Token</span>
                            <span
                                class="text-[10px] font-mono font-black text-black select-all bg-white px-2 py-1 rounded-lg border border-gray-100">
                                {{ $flat->invite_token }}
                            </span>
                        </div>
                        <div class="h-3 w-full bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-black group-hover:bg-[#D9FF40] transition-all duration-700 w-[65%]"></div>
                        </div>
                    </div>

                    <a href="{{ route('user.flatshare.show', $flat->id) }}"
                        class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center opacity-40 group-hover:opacity-100 transition-opacity cursor-pointer">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Open Ecosystem</span>
                        <div
                            class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center group-hover:bg-black group-hover:text-[#D9FF40] transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M17 8l4 4m0 0l-4 4m4 4H3"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            @endforeach

            <button onclick="openModal()"
                class="h-full min-h-[430px] border-4 border-dashed border-gray-200 rounded-[3.5rem] flex flex-col items-center justify-center text-gray-300 hover:border-black hover:text-black hover:bg-white transition-all duration-500 group">
                <div
                    class="w-20 h-20 rounded-[2.5rem] bg-gray-50 flex items-center justify-center mb-6 group-hover:bg-[#D9FF40] transition-colors duration-500 shadow-sm">
                    <svg class="w-10 h-10 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span
                    class="text-xs font-black uppercase tracking-[0.3em] group-hover:tracking-[0.4em] transition-all">Launch
                    New Coloc</span>
            </button>

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
                    <label class="text-[10px] font-black uppercase text-gray-400 mb-2 ml-1 block tracking-widest">Colocation
                        Name</label>
                    <input type="text" name="name" required placeholder="e.g. Maarif Studio"
                        class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm font-bold focus:bg-white focus:border-black transition-all outline-none">
                </div>

                <div class="bg-zinc-950 rounded-[2.5rem] p-8 relative overflow-hidden group border border-white/5">
                    <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#D9FF40] opacity-10 blur-2xl"></div>
                    <div class="flex justify-between items-center mb-6 relative z-10">
                        <span class="text-[10px] font-black text-[#D9FF40] uppercase tracking-widest">Invite Protocol</span>
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

    <script>
        function openModal() {
            document.getElementById('colocModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('colocModal').classList.add('hidden');
        }
    </script>
@endsection
