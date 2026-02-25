@extends('layouts.teacherLayout')

@section('title', 'Teacher Workspace')

@section('content')
<div class="space-y-10 animate-in fade-in duration-700">

    {{-- Header --}}
    <header class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 px-4">
        <div class="flex items-center gap-6">
            {{-- Optional: Teacher Avatar Circle --}}
            <div class="hidden md:flex w-16 h-16 rounded-[2rem] bg-indigo-600 items-center justify-center text-white shadow-xl shadow-indigo-200">
                <span class="text-xl font-black">{{ strtoupper(substr(auth()->user()->first_name ?? 'T', 0, 1)) }}</span>
            </div>

            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">
                    Hello, <span class="text-indigo-600">{{ auth()->user()->first_name ?? 'Teacher' }}</span>
                </h1>
                <p class="text-slate-400 font-medium mt-1 uppercase text-[10px] tracking-widest flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Teacher Portal • {{ date('l, d M') }}
                </p>
            </div>
        </div>

        {{-- Quick Search/Action --}}
        <div class="flex items-center gap-3">
            <div class="hidden sm:flex flex-col items-end">
                <span class="text-xs font-black text-slate-800">{{ auth()->user()->first_name ?? 'Teacher' }} {{ auth()->user()->last_name ?? 'User' }}</span>
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter">Academic Lead</span>
            </div>
        </div>
    </header>

    {{-- Right Column --}}
    <aside class="lg:col-span-4">
        <section class="bg-white rounded-[3rem] p-8 border border-slate-100 shadow-sm min-h-[500px] flex flex-col">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl font-black text-slate-800">Feedback Queue</h2>
                <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-black rounded-full uppercase tracking-tighter">
                    3 Pending
                </span>
            </div>

            <div class="space-y-6">
                {{-- Static Item 1 --}}
                <div class="flex items-center gap-4 group p-2 rounded-3xl hover:bg-slate-50 transition-all duration-300">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 font-black text-sm border-2 border-white shadow-sm">
                            SC
                        </div>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full animate-pulse"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-slate-800 truncate">Sarah Connor</p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">Brief: Portfolio V2</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] font-black text-slate-300 uppercase">2m ago</p>
                    </div>
                </div>

                {{-- Static Item 2 --}}
                <div class="flex items-center gap-4 group p-2 rounded-3xl hover:bg-slate-50 transition-all duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-pink-600 font-black text-sm border-2 border-white shadow-sm">
                        JH
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-slate-800 truncate">James Hall</p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">Brief: SQL Schema</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] font-black text-slate-300 uppercase">15m ago</p>
                    </div>
                </div>

                {{-- Static Item 3 --}}
                <div class="flex items-center gap-4 group p-2 rounded-3xl hover:bg-slate-50 transition-all duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 font-black text-sm border-2 border-white shadow-sm">
                        EG
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-slate-800 truncate">Elena Gilbert</p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">Brief: UI Patterns</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] font-black text-slate-300 uppercase">1h ago</p>
                    </div>
                </div>
            </div>

            {{-- Call to Action --}}
            <div class="mt-auto pt-8">
                <a href="{{ route('teacher.briefs.index') }}" class="w-fit p-5 bg-slate-900 text-white rounded-[2rem] font-black text-[10px] uppercase tracking-widest shadow-xl shadow-slate-200 hover:bg-indigo-600 transition-all flex items-center justify-center gap-3 group">
                    Review All Submissions
                    <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </section>
    </aside>

</div>
@endsection
