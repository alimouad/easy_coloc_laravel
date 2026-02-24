@extends('layouts.adminLayout')

@section('title', 'Assign Teacher')

@section('content')
<div class="max-w-5xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-8 duration-1000 p-1">
    
    {{-- Header --}}
    <header class="flex items-center justify-between">
        <div class="flex items-center gap-6">
            <a href="/admin/classroom" class="w-14 h-14 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-slate-400 hover:text-primary transition-all hover:shadow-md active:scale-90">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight leading-none">Assign <span class="text-primary">Teacher</span></h1>
                <p class="text-slate-400 text-[11px] font-bold uppercase tracking-[0.2em] mt-2 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-primary/20 flex items-center justify-center">
                        <span class="w-1 h-1 rounded-full bg-primary animate-pulse"></span>
                    </span>
                    Classroom Management
                </p>
            </div>
        </div>
        {{-- Context Badge --}}
        <div class="hidden sm:block px-6 py-3 rounded-2xl bg-white border border-slate-100 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Active Room</p>
            <p class="text-sm font-bold text-slate-700">{{ $classroom['name'] }} <span class="text-slate-300 mx-1">/</span> {{ $classroom['year'] }}</p>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        {{-- Current Status Card --}}
        <div class="md:col-span-1 space-y-4">
            <div class="bg-white p-8 rounded-[3rem] border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.03)] relative overflow-hidden group">
                {{-- Decorative background element --}}
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/10 transition-colors duration-700"></div>
                
                <div class="relative space-y-6">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-indigo-50 flex items-center justify-center text-primary shadow-inner">
                        <span class="material-symbols-outlined text-4xl group-hover:rotate-12 transition-transform duration-500">badge</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Current Mentor</p>
                        <h4 class="text-xl font-black text-slate-900 leading-tight">
                            {{ $classroom['mentor_name'] ?? 'Unassigned' }}
                        </h4>
                        <p class="text-xs font-medium text-slate-400 mt-1">Responsible for evaluations</p>
                    </div>
                </div>
            </div>

            {{-- Secondary Info Card --}}
            <div class="bg-slate-900 p-8 rounded-[2.5rem] text-white shadow-xl shadow-slate-200">
                <span class="material-symbols-outlined text-primary mb-4">security</span>
                <p class="text-xs font-bold leading-relaxed opacity-80">
                    System logs will record this assignment for auditing purposes.
                </p>
            </div>
        </div>

        {{-- Assignment Form --}}
        <div class="md:col-span-2">
            <section class="bg-white/80 backdrop-blur-xl rounded-[3.5rem] p-10 border border-white shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] relative">
                <form action="{{ route('admin.classrooms.assignTeacher.store', $classroom) }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="classroom_id" value="{{ $classroom['id'] }}">

                    <div class="space-y-4">
                        <div class="flex items-center justify-between px-4">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Select New Teacher</label>
                            <span class="text-[10px] font-black text-primary uppercase bg-primary/10 px-3 py-1 rounded-full">Required</span>
                        </div>
                        
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary transition-colors">person_search</span>
                            <select name="teacher_id" required 
                                class="w-full pl-16 pr-12 py-6 bg-slate-50 border-2 border-transparent rounded-[2.2rem] focus:bg-white focus:border-primary/20 focus:ring-4 focus:ring-primary/5 transition-all outline-none font-bold text-slate-700 appearance-none cursor-pointer">
                                <option value="" disabled selected>Choose from available staff...</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher['id'] }}">
                                        {{ $teacher['first_name'] }} {{ $teacher['last_name'] }} ({{ $teacher['email'] }})
                                    </option>
                                @endforeach
                            </select>
                            <span class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    {{-- Warning Box --}}
                    <div class="p-6 rounded-[2.2rem] bg-amber-50/50 border border-amber-100 flex gap-5 items-start">
                        <div class="w-10 h-10 rounded-xl bg-white flex-shrink-0 flex items-center justify-center text-amber-500 shadow-sm">
                            <span class="material-symbols-outlined">info</span>
                        </div>
                        <div>
                            <h5 class="text-xs font-black text-amber-800 uppercase tracking-wider mb-1">Access Notice</h5>
                            <p class="text-[11px] text-amber-700 leading-relaxed font-medium">
                                The selected teacher will gain immediate access to manage <strong>students, briefs, and evaluations</strong> for this classroom. This action will appear in the system activity feed.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-4">
                        <button type="submit" 
                            class="group relative px-10 py-5 bg-primary text-white font-black rounded-3xl shadow-2xl shadow-primary/30 hover:-translate-y-1 transition-all flex items-center gap-3 active:scale-95">
                            <span class="material-symbols-outlined transition-transform group-hover:rotate-12">how_to_reg</span>
                            Confirm Assignment
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection