@extends('layouts.studentLayout')

@section('title', 'My Evaluations')

@section('content')
<div class="max-w-7xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-8 duration-1000">

    {{-- Header Section --}}
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Skills & <span class="text-student">Evaluations</span></h1>
            <p class="text-slate-400 font-medium mt-2">Track your progress and mastery levels across all briefs.</p>
        </div>

        <div class="bg-white p-2 rounded-[2rem] border border-slate-100 shadow-sm flex items-center">
            <div class="px-6 py-3 bg-indigo-50 rounded-[1.5rem] text-center min-w-[120px]">
                <p class="text-[9px] font-black text-student uppercase tracking-widest">Total Skills</p>
                <span class="text-xl font-black text-student">{{ count($evaluations) }}</span>
            </div>
        </div>
    </header>

    {{-- Evaluations Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @forelse($evaluations as $eval)
            @php
                // Dynamic level configuration
                $config = match($eval['mastery_level']) {
                    'TRANSPOSE' => ['color' => 'student', 'width' => 'w-full',   'label' => 'Expert'],
                    'ADAPT'     => ['color' => 'student',   'width' => 'w-2/3',  'label' => 'Advanced'],
                    'IMITATE'   => ['color' => 'student',    'width' => 'w-1/3',  'label' => 'Initiated'],
                    default     => ['color' => 'student',   'width' => 'w-5',    'label' => 'N/A'],
                };

                $c = $config['color'];
            @endphp

            <div class="group relative bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-500 flex flex-col overflow-hidden">

                {{-- Header Progress Line --}}
                <div class="h-2 w-full bg-slate-50 flex">
                    <div class="h-full bg-{{$c}} transition-all duration-1000 ease-out {{ $config['width'] }}"></div>
                </div>

                <div class="p-8 flex-1 flex flex-col">

                    {{-- Badge & Status --}}
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-2xl bg-{{$c}} flex items-center justify-center text-{{$c}}-600">
                                <i data-lucide="layers" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="block text-[10px] font-black text-{{$c}} uppercase tracking-[0.2em] leading-none mb-1">Mastery</span>
                                <span class="block text-xs font-black text-slate-800 uppercase tracking-wider">{{ $config['label'] }}</span>
                            </div>
                        </div>

                        <span class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest bg-{{$c}}  text-white shadow-lg shadow-{{$c}}-500/20">
                        {{ $eval['mastery_level'] }}
                    </span>
                    </div>

                    {{-- Title Section --}}
                    <div class="mb-6">
                        <h3 class="text-2xl font-black text-slate-800 leading-[1.1] tracking-tight group-hover:text-indigo-600 transition-colors duration-300">
                            {{ $eval['skill_label'] }}
                        </h3>
                        <div class="mt-3 flex items-center gap-2 bg-amber-50 border border-amber-200 text-amber-700 p-4">
                            <span class="flex-none w-5 h-[2px] bg-amber-50 border border-amber-200 text-amber-700"></span>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest truncate">
                                {{ $eval->brief->title ?? $eval['brief_title'] ?? 'Standard Project' }}
                            </p>
                        </div>
                    </div>

                    {{-- Feedback Box --}}
                    <div class="mt-auto relative p-6 rounded-3xl bg-slate-50 border border-slate-100/50 group-hover:bg-white group-hover:border-indigo-100 group-hover:shadow-inner transition-all duration-300">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mb-3 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-{{$c}}-400"></span>
                            Instructor Feedback
                        </p>
                        <p class="text-sm text-slate-600 font-medium leading-relaxed italic">
                            {{ $eval['comment'] ? '"'.$eval['comment'].'"' : 'The instructor did not leave a specific comment.' }}
                        </p>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-50 flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-student flex items-center justify-center text-white text-xs font-black shadow-md">
                                {{ strtoupper(substr($eval['teacher_name'] ?? 'I', 0, 1)) }}
                            </div>
                            <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-[11px] font-black text-slate-800 uppercase leading-none">{{ $eval->teacher->first_name ?? 'Instructor' }}</p>
                            <p class="text-[10px] text-student font-bold uppercase mt-1">Verified</p>
                        </div>
                    </div>

                    <div class="text-right">
                        <p class="text-[10px] font-black text-slate-300 uppercase leading-none">Eval Date</p>
                        <p class="text-[11px] font-bold text-slate-500 mt-1 uppercase">
                            {{ !empty($eval['evaluation_date']) ? date('d M Y', strtotime($eval['evaluation_date'])) : 'Pending' }}
                        </p>
                    </div>
                </div>
            </div>

        @empty
            {{-- Empty State --}}
            <div class="col-span-full py-32 text-center bg-white rounded-[3rem] border-4 border-dashed border-slate-50">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-50 rounded-full text-slate-200 mb-6">
                    <i data-lucide="frown" class="w-10 h-10"></i>
                </div>
                <h3 class="text-3xl font-black text-slate-800 tracking-tight">Nothing to report</h3>
                <p class="text-slate-400 font-bold uppercase text-xs tracking-widest mt-2">Your evaluations will appear here</p>
            </div>
        @endforelse

    </div>
</div>
@endsection
