@extends('layouts.userLayout')

@section('title', $flatshare->name . ' | Ecosystem')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">

        <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div class="space-y-4">
                <div class="flex items-center space-x-2 text-[10px] font-black uppercase tracking-widest text-gray-400">
                    <a href="{{ route('user.home') }}" class="hover:text-black transition">Dashboard</a>
                    <span>/</span>
                    <span class="text-black italic">Ecosystem Detail</span>
                </div>

                <h2 class="text-6xl font-black tracking-tighter uppercase text-gray-900 leading-none italic">
                    {{ $flatshare->name }}
                </h2>
            </div>

            <div class="flex items-center gap-4">

                <button onclick="openExpenseModal()"
                    class="group h-[68px] flex items-center space-x-4 px-6 border-2 border-black rounded-[2rem] hover:bg-black transition-all active:scale-95 shadow-xl shadow-black/5 bg-white">
                    <div
                        class="w-8 h-8 bg-black group-hover:bg-[#D9FF40] rounded-xl flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 text-[#D9FF40] group-hover:text-black transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span
                        class="text-[11px] font-black uppercase tracking-[0.2em] text-black group-hover:text-white transition-colors italic">Add_Expense</span>
                </button>

                <div
                    class="bg-black h-[88px] px-8 rounded-[2rem] text-white flex items-center space-x-6 shadow-2xl relative overflow-hidden group border border-white/5">
                    <div
                        class="absolute -right-4 -top-4 w-20 h-20 bg-[#D9FF40] opacity-10 blur-2xl group-hover:opacity-20 transition-opacity">
                    </div>

                    <div class="relative z-10">
                        <p class="text-[8px] font-black text-[#D9FF40] uppercase tracking-[0.3em] mb-1">Active Token</p>
                        <p class="text-xl font-mono font-black tracking-tighter italic">{{ $flatshare->invite_token }}</p>
                    </div>

                    <button onclick="copyToken('{{ $flatshare->invite_token }}')"
                        class="h-10 w-10 bg-zinc-800 rounded-xl flex items-center justify-center hover:bg-[#D9FF40] hover:text-black transition-all active:scale-90 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-[3.5rem] p-10 border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center space-x-6">
                            <h3 class="text-2xl font-black tracking-tighter uppercase">Resident Directory</h3>

                            <a href="{{ route('user.flatshare.expenses.index', $flatshare->id) }}"
                                class="group flex items-center space-x-2 bg-black hover:bg-[#D9FF40] px-4 py-1.5 rounded-xl transition-all active:scale-95 shadow-lg shadow-black/5">
                                <svg class="w-3 h-3 text-[#D9FF40] group-hover:text-black transition-colors" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span
                                    class="text-[9px] font-black uppercase tracking-[0.2em] text-white group-hover:text-black transition-colors">View_Ledger</span>
                            </a>
                        </div>

                        <span
                            class="bg-gray-100 text-gray-500 text-[10px] font-black px-3 py-1 rounded-full uppercase italic">
                            {{ $flatshare->users->count() }} Verified Nodes
                        </span>
                    </div>

                    <div class="space-y-4">
                        {{-- Loop through the USERS relationship --}}
                        @forelse($flatshare->users as $member)
                            <div
                                class="flex items-center justify-between p-4 rounded-3xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100 group">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div
                                            class="w-14 h-14 rounded-2xl bg-gray-100 overflow-hidden border-2 border-white shadow-sm ring-1 ring-gray-100 group-hover:ring-[#D9FF40] transition-all">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($member->full_name) }}&background=D9FF40&color=000"
                                                class="w-full h-full object-cover">
                                        </div>
                                        @if ($member->id === $flatshare->owner_id)
                                            <div
                                                class="absolute -top-2 -right-2 bg-black text-[#D9FF40] p-1 rounded-lg border-2 border-white shadow-sm">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.388 2.46a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.388-2.46a1 1 0 00-1.175 0l-3.388 2.46c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.05 8.717c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.951-.69l1.286-3.97z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-black text-gray-900 tracking-tight uppercase text-sm italic">
                                            {{ $member->full_name }}</h4>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                            Score: {{ $member->reputation_score }} • Joined
                                            {{ $member->created_at->format('M Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span
                                        class="bg-green-100 text-green-600 text-[9px] font-black px-2 py-0.5 rounded uppercase">
                                        {{ $member->id === $flatshare->owner_id ? 'Owner' : 'Member' }}
                                    </span>

                                    @if (auth()->id() === $flatshare->owner_id && auth()->id() !== $member->id)
                                        <button
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-300 hover:text-rose-500 transition-all hover:bg-rose-50">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-400 text-sm italic py-10">No active nodes detected in this
                                registry.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-zinc-950 p-10 rounded-[3.5rem] text-white shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-[#D9FF40] opacity-5 blur-[100px]"></div>

                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-[#D9FF40] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#D9FF40]/10">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-2xl font-black tracking-tighter uppercase mb-2">Invite Resident</h3>
                        <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest leading-relaxed mb-8">
                            Authorizing new nodes into the ecosystem requires email validation.</p>

                        <form action="{{ route('user.flatshare.invite', $flatshare->id) }}" method="POST"
                            class="space-y-4">
                            @csrf
                            <div class="relative">
                                <input type="email" name="email" placeholder="resident@email.com" required
                                    class="w-full bg-zinc-900 border-2 border-zinc-800 rounded-2xl p-4 text-xs font-bold focus:bg-zinc-800 focus:border-[#D9FF40] transition-all outline-none text-white">
                            </div>

                            <button type="submit"
                                class="w-full bg-[#D9FF40] text-black py-5 rounded-2xl font-black uppercase tracking-widest text-xs shadow-xl shadow-[#D9FF40]/10 hover:bg-white transition-all active:scale-95">
                                Send Secure Link
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <h4 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6">Security Settings</h4>
                    <div class="space-y-3">
                        <button
                            class="w-full text-left px-5 py-3 rounded-xl hover:bg-gray-50 text-xs font-bold text-gray-700 flex justify-between items-center transition">
                            <span>Regenerate Token</span>
                            <svg class="w-4 h-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                        </button>
                        <button
                            class="w-full text-left px-5 py-3 rounded-xl hover:bg-rose-50 text-xs font-bold text-rose-600 flex justify-between items-center transition">
                            <span>Archive Coloc</span>
                            <svg class="w-4 h-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="expenseModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-6">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-md" onclick="closeExpenseModal()"></div>

        <div
            class="relative bg-white w-full max-w-2xl rounded-[3.5rem] shadow-[0_30px_100px_rgba(0,0,0,0.3)] border border-black/5 overflow-hidden transition-all transform scale-100">

            <div class="p-10 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
                <div>
                    <p
                        class="text-[9px] font-black text-[#D9FF40] bg-black px-2 py-0.5 inline-block uppercase tracking-widest mb-2 italic">
                        Protocol: Financial_Entry</p>
                    <h3 class="text-3xl font-black uppercase tracking-tighter italic text-black">Add Expense</h3>
                </div>
                <button onclick="closeExpenseModal()"
                    class="w-12 h-12 flex items-center justify-center rounded-2xl hover:bg-black hover:text-[#D9FF40] transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('user.expenses.store') }}" method="POST"
                class="p-10 space-y-8 max-h-[70vh] overflow-y-auto">
                @csrf
                <input type="hidden" name="flatshare_id" value="{{ $flatshare->id }}">
                <input type="hidden" name="payer_id" value="{{ auth()->id() }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 pl-2">Transaction
                            Label</label>
                        <input type="text" name="title" required placeholder="e.g. UTILITY_BILL"
                            class="w-full bg-gray-50 border-2 border-transparent focus:border-black focus:bg-white rounded-2xl px-6 py-4 text-xs font-black uppercase tracking-widest outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 pl-2">Amount
                            (MAD)</label>
                        <input type="number" name="amount" step="0.01" required placeholder="0.00"
                            class="w-full bg-gray-50 border-2 border-transparent focus:border-black focus:bg-white rounded-2xl px-6 py-4 text-xs font-black uppercase tracking-widest outline-none transition-all">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 pl-2">Participating Nodes
                        (Split with)</label>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($flatshare->users as $user)
                            <label class="cursor-pointer group">
                                <input type="checkbox" name="participants[]" value="{{ $user->id }}"
                                    class="peer hidden" checked>
                                <div
                                    class="flex items-center space-x-3 p-4 bg-gray-50 border-2 border-transparent rounded-2xl peer-checked:border-black peer-checked:bg-white transition-all group-hover:bg-gray-100">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=000&color=fff"
                                        class="w-8 h-8 rounded-lg grayscale group-hover:grayscale-0 transition-all">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-[10px] font-black uppercase truncate">{{ $user->full_name }}</p>
                                        <p class="text-[8px] font-bold text-gray-400 uppercase">Resident Node</p>
                                    </div>
                                    <div
                                        class="w-4 h-4 rounded-full border-2 border-gray-200 peer-checked:border-black peer-checked:bg-[#D9FF40] flex items-center justify-center">
                                        <div class="w-1.5 h-1.5 bg-black rounded-full opacity-0 peer-checked:opacity-100">
                                        </div>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 pl-2">Network
                        Category</label>
                    <select name="category_id" required
                        class="w-full bg-gray-50 border-2 border-transparent focus:border-black focus:bg-white rounded-2xl px-6 py-4 text-xs font-black uppercase tracking-widest outline-none transition-all cursor-pointer">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ strtoupper($category->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-black text-white py-5 rounded-3xl text-[11px] font-black uppercase tracking-[0.3em] hover:bg-[#D9FF40] hover:text-black transition-all shadow-xl shadow-black/10 active:scale-[0.98]">
                        Confirm_Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openExpenseModal() {
            const modal = document.getElementById('expenseModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeExpenseModal() {
            const modal = document.getElementById('expenseModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function copyToken(text) {
            navigator.clipboard.writeText(text);
            alert('Token copied to clipboard: ' + text);
        }
    </script>
@endsection
