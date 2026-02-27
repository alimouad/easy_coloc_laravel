@extends('layouts.userLayout')

@section('title', $flatshare->name . ' | Ecosystem')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">
        <div class="space-y-16">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 border-b border-gray-100 pb-12">
                <div>
                    <div
                        class="inline-block bg-black text-[#D9FF40] px-3 py-1 text-[9px] font-black uppercase tracking-widest mb-6 italic">
                        Infrastructure // Financial_Audit
                    </div>
                    <h2 class="text-7xl font-black tracking-tighter uppercase text-black leading-[0.85] italic">
                        Network <br> <span class="text-gray-200">Balance.</span>
                    </h2>
                </div>

                <button onclick="openExpenseModal()"
                    class="px-8 py-5 bg-black text-white text-[11px] font-black uppercase tracking-[0.3em] hover:bg-[#D9FF40] hover:text-black transition-all shadow-2xl active:scale-95 rounded-2xl italic">
                    Initialize_New_Expense
                </button>
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

            <div class="bg-white border border-gray-100 rounded-[3.5rem] p-10 shadow-sm overflow-hidden">
                <h3 class="text-2xl font-black uppercase italic mb-10">Transaction Ledger</h3>

                <table class="w-full text-left">
                    <thead class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-50">
                        <tr>
                            <th class="pb-6">Protocol Label</th>
                            <th class="pb-6">Payer</th>
                            <th class="pb-6">Resident Share</th>
                            <th class="pb-6">Category</th>
                            <th class="pb-6 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($flatshare->expenses->sortByDesc('created_at') as $expense)
                            <tr class="group hover:bg-gray-50/50 transition-colors">
                                <td class="py-6">
                                    <p class="text-xs font-black uppercase tracking-tight italic">{{ $expense->title }}</p>
                                    <p class="text-[9px] font-mono text-gray-300">
                                        {{ $expense->created_at->format('Y.m.d // H:i') }}</p>
                                </td>
                                <td class="py-6">
                                    <span class="text-[10px] font-black uppercase bg-gray-100 px-2 py-1 rounded-lg">
                                        {{ $expense->payer->full_name }}
                                    </span>
                                </td>
                                <td class="py-6">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase">
                                        {{ $expense->participant->full_name }}
                                    </span>
                                </td>
                                <td class="py-6 italic">
                                    <span
                                        class="text-[9px] font-black uppercase border border-black px-2 py-0.5 rounded-full">
                                        {{ $expense->category->name }}
                                    </span>
                                </td>
                                <td class="py-6 text-right">
                                    <span class="text-sm font-black italic tracking-tighter">
                                        {{ number_format($expense->amount, 2) }} <span class="text-[9px] ml-1">MAD</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
