@extends('layouts.userLayout')

@section('title', $flatshare->name . ' | Ecosystem')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">
        <div class="space-y-16">
            <div class="space-y-12">
                <div class="flex items-center space-x-3 text-[10px] font-black uppercase tracking-[0.3em] text-gray-300">
                    <a href="{{ route('user.home') }}" class="hover:text-black transition flex items-center group">
                        <span
                            class="w-1.5 h-1.5 bg-gray-200 group-hover:bg-black rounded-full mr-2 transition-colors"></span>
                        DASHBOARD_ROOT
                    </a>
                    <span class="text-gray-200">/</span>
                    <span class="text-black italic bg-[#D9FF40] px-2 py-0.5 rounded-md">ECOSYSTEM_MANIFEST_v2</span>
                </div>

                <div
                    class="flex flex-col lg:flex-row lg:items-end justify-between gap-10 border-b-4 border-black pb-14 relative">
                    <div
                        class="absolute -left-12 bottom-4 text-[12rem] font-black text-gray-50/50 -z-10 select-none pointer-events-none tracking-tighter uppercase italic">
                        DATA
                    </div>

                    <div class="relative">
                        <div
                            class="inline-flex items-center space-x-2 bg-black text-[#D9FF40] px-3 py-1 text-[8px] font-black uppercase tracking-[0.4em] mb-4 italic">
                            <span class="w-1.5 h-1.5 bg-[#D9FF40] rounded-full animate-pulse"></span>
                            <span>Active_Node: {{ strtoupper($flatshare->name) }}</span>
                        </div>
                        <h2
                            class="text-8xl lg:text-7xl font-black tracking-[-0.05em] uppercase text-black leading-[0.8] italic">
                            Node <br> <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-gray-200 via-gray-400 to-gray-200">Balance.</span>
                        </h2>
                    </div>

                    <div class="flex flex-col items-end gap-6">
                        

                        <button onclick="openExpenseModal()"
                            class="group relative px-10 py-6 bg-black text-white text-[10px] font-black uppercase tracking-[0.4em] hover:bg-[#D9FF40] hover:text-black transition-all shadow-[0_25px_60px_rgba(0,0,0,0.15)] active:scale-95 rounded-[1.5rem] italic overflow-hidden">
                            <div class="relative z-10 flex items-center">
                                <svg class="w-4 h-4 mr-3 transition-transform group-hover:rotate-90" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Initialize_Expense_Entry
                            </div>
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity">
                            </div>
                        </button>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($userBalances as $balance)
                    <div
                        class="bg-white border border-gray-100 p-8 rounded-[3rem] shadow-sm hover:border-black transition-all group">
                        <div class="flex justify-between items-start mb-6">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($balance->identity->full_name) }}&background=000&color=fff"
                                class="w-12 h-12 rounded-2xl shadow-lg group-hover:rotate-3 transition-transform">
                            <span class="text-[9px] font-mono text-gray-300">#RES-{{ $balance->identity->id }}</span>
                        </div>

                        <h4 class="text-xs font-black uppercase tracking-tight mb-4 italic">
                            {{ $balance->identity->full_name }}</h4>

                        <div class="space-y-1">
                            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Net Position</p>
                            <p
                                class="text-2xl font-black italic tracking-tighter {{ $balance->net >= 0 ? 'text-black' : 'text-rose-500' }}">
                                {{ $balance->net >= 0 ? '+' : '' }}{{ number_format($balance->net, 2) }} <span
                                    class="text-xs">MAD</span>
                            </p>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-50 flex justify-between">
                            <div class="text-center">
                                <p class="text-[8px] font-bold text-gray-400 uppercase">To Receive</p>
                                <p class="text-[10px] font-black text-green-500">{{ number_format($balance->credits, 2) }}
                                </p>
                            </div>
                            <div class="text-center border-l border-gray-100 pl-6">
                                <p class="text-[8px] font-bold text-gray-400 uppercase">To Pay</p>
                                <p class="text-[10px] font-black text-rose-500">{{ number_format($balance->debts, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="bg-white border border-gray-100 rounded-[3.5rem] p-10 shadow-sm overflow-hidden relative">
                <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
                    style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 30px 30px;"></div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-10">
                        <h3 class="text-2xl font-black uppercase italic tracking-tighter">Transaction_Ledger</h3>
                        <div class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span
                                class="text-[9px] font-black uppercase tracking-widest text-gray-400">Live_Registry_Sync</span>
                        </div>
                    </div>

                    <table class="w-full text-left">
                        <thead
                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <tr>
                                <th class="pb-6 pl-4">Protocol Label // Date</th>
                                <th class="pb-6">Payer (Source)</th>
                                <th class="pb-6">Recipient (Target)</th>
                                <th class="pb-6">Category</th>
                                <th class="pb-6 text-right">Amount</th>
                                <th class="pb-6 text-right pr-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($flatshare->expenses->sortByDesc('created_at') as $expense)
                                <tr class="group hover:bg-gray-50/80 transition-all">
                                    <td class="py-6 pl-4">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-xs font-black uppercase tracking-tight italic text-black">{{ $expense->title }}</span>
                                            <span class="text-[9px] font-mono font-bold text-gray-400 mt-1">
                                                [{{ $expense->created_at->format('d/m/Y') }}] <span
                                                    class="mx-1 text-[#D9FF40] group-hover:text-black">>></span>
                                                {{ $expense->created_at->format('H:i:s') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-6">
                                        <span
                                            class="text-[10px] font-black uppercase bg-black text-white px-3 py-1 rounded-lg italic">
                                            {{ $expense->payer->full_name }}
                                        </span>
                                    </td>
                                    <td class="py-6">
                                        <span
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest border border-gray-100 px-3 py-1 rounded-lg group-hover:border-black transition-colors">
                                            {{ $expense->participant->full_name }}
                                        </span>
                                    </td>
                                    <td class="py-6 italic">
                                        <span
                                            class="text-[9px] font-black uppercase border-2 border-black px-2.5 py-1 rounded-full group-hover:bg-black group-hover:text-[#D9FF40] transition-all">
                                            {{ $expense->category->name }}
                                        </span>
                                    </td>
                                    <td class="py-6 text-right">
                                        <span class="text-sm font-black italic tracking-tighter text-black">
                                            {{ number_format($expense->amount, 2) }} <span
                                                class="text-[9px] ml-0.5 opacity-50">MAD</span>
                                        </span>
                                    </td>
                                    <td class="py-6 text-right pr-4">
                                        @if ($expense->payer_id === auth()->id() && $expense->user_id !== auth()->id())
                                            <form action="{{ route('user.expenses.settle', $expense) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center space-x-2 bg-black hover:bg-[#D9FF40] text-white hover:text-black px-4 py-2 rounded-xl transition-all active:scale-95 group/btn">
                                                    <svg class="w-3 h-3 text-[#D9FF40] group-hover/btn:text-black transition-colors"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span
                                                        class="text-[9px] font-black uppercase tracking-widest">Settle_Node</span>
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="text-[8px] font-black uppercase text-gray-300 tracking-widest italic">Immutable_Entry</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
