@extends('layouts.adminLayout')

@section('title', 'Admin Dashboard')

@section('content')

<div class="max-w-full space-y-8 animate-in fade-in slide-in-from-bottom-8 duration-1000 ease-out p-1">

    {{-- Header Section --}}
    <section class="bg-white/70 backdrop-blur-3xl rounded-[3.5rem] p-8 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.08)] border border-white/80 ring-1 ring-black/[0.01]">
        <div class="flex justify-between items-center mb-10">
            <div class="flex items-center gap-5">
                <div class="relative">
                    <div class="w-16 h-16 rounded-[2rem] pink-gradient flex items-center justify-center text-white shadow-[0_10px_20px_rgba(255,79,122,0.3)] ring-4 ring-white">
                        <span class="material-symbols-outlined text-4xl">admin_panel_settings</span>
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-4 border-white rounded-full shadow-sm"></span>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">
                        Hello, <span class="text-transparent bg-clip-text pink-gradient">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </h1>
                    <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-pink-500 animate-pulse"></span>
                        Administration System
                    </p>
                </div>
            </div>
            <button class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400 hover:text-pink-500 hover:bg-white hover:shadow-xl transition-all duration-300">
                <span class="material-symbols-outlined text-2xl">notifications</span>
            </button>
        </div>

        {{-- Dynamic Stats Row --}}
        <div class="grid grid-cols-2 gap-5">
            {{-- Total Students Card --}}
            <div class="bg-white/50 p-6 rounded-[2.5rem] border border-white/60 shadow-[inset_0_2px_10px_rgba(0,0,0,0.02)] group hover:bg-white hover:shadow-lg transition-all duration-500">
                <div class="w-10 h-10 rounded-xl bg-pink-50 flex items-center justify-center text-pink-500 mb-4 group-hover:rotate-6 transition-transform">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <h3 class="text-[9px] uppercase tracking-widest font-black text-slate-400">Total Students</h3>
                <p class="text-2xl font-black text-slate-900 mt-0.5">{{ $studentCount ?? 0 }}</p>
            </div>

            {{-- Total Sprints Card --}}
            <div class="bg-white/50 p-6 rounded-[2.5rem] border border-white/60 shadow-[inset_0_2px_10px_rgba(0,0,0,0.02)] group hover:bg-white hover:shadow-lg transition-all duration-500">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500 mb-4 group-hover:-rotate-6 transition-transform">
                    <span class="material-symbols-outlined">bolt</span>
                </div>
                <h3 class="text-[9px] uppercase tracking-widest font-black text-slate-400">Active Sprints</h3>
                <p class="text-2xl font-black text-slate-900 mt-0.5">{{ $sprintCount ?? 0 }}</p>
            </div>
        </div>
    </section>

    <div class="grid w-full grid-cols-2 gap-4">
        {{-- Main Action Button: New Sprint --}}
        <div class="relative group px-2">
            <div class="absolute -inset-2 pink-gradient rounded-[2.5rem] blur-2xl opacity-20 group-hover:opacity-40 transition duration-1000"></div>
            <a href="/admin/sprints/create" class="relative w-full pink-gradient text-white rounded-[2rem] p-6 flex items-center justify-between shadow-2xl shadow-pink-500/40 transform transition-all duration-500 hover:-translate-y-2 active:scale-95 overflow-hidden">
                <div class="flex items-center gap-5">
                    <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-xl border border-white/30">
                        <span class="material-symbols-outlined text-3xl">add_task</span>
                    </div>
                    <div class="text-left">
                        <span class="block font-black text-xl tracking-tight">New Sprint</span>
                        <span class="text-white/70 text-[10px] font-bold uppercase tracking-[0.15em]">Launch a session</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center border border-white/30">
                    <span class="material-symbols-outlined">east</span>
                </div>
            </a>
        </div>

        {{-- Main Action Button: New Classroom --}}
        <div class="relative group px-2">
            {{-- Indigo Glow Backdrop --}}
            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-blue-400 rounded-[2.5rem] blur-2xl opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-500"></div>

            <a href="/admin/classrooms/create"
                class="relative flex w-full bg-gradient-to-br from-indigo-600 to-blue-500 rounded-[2.2rem] shadow-2xl shadow-indigo-500/40 transform transition-all duration-500 hover:-translate-y-2 active:scale-[0.98] overflow-hidden">

                {{-- Interior Container - Removed 'p-1' from parent and 'border' from here --}}
                <div class="relative w-full h-full bg-white/10 backdrop-blur-md rounded-[2.2rem] p-7 flex items-center justify-between">
                    <div class="flex items-center gap-5">
                        {{-- Icon Container - Removed border --}}
                        <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center backdrop-blur-xl shadow-inner group-hover:rotate-6 transition-transform duration-500">
                            <span class="material-symbols-outlined text-4xl text-white">school</span>
                        </div>
                        <div class="text-left">
                            <span class="block font-black text-xl tracking-tighter text-white">New Class</span>
                            <span class="text-white/70 text-[9px] font-bold uppercase tracking-[0.2em]">Create Classroom</span>
                        </div>
                    </div>

                    {{-- Arrow Button - Removed border --}}
                    <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white group-hover:text-indigo-600 transition-all duration-500">
                        <span class="material-symbols-outlined font-bold">east</span>
                    </div>
                </div>

                {{-- Reflection Shine Overlay --}}
                <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-40 group-hover:animate-shine"></div>
            </a>
        </div>

        <style>
            @keyframes shine {
                100% {
                    left: 125%;
                }
            }

            .group-hover\:animate-shine {
                animation: shine 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }
        </style>
    </div>


    {{-- Sprint Overview Section --}}
    <section class="bg-white/80 backdrop-blur-2xl rounded-[3.5rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-white/60">
        <div class="flex items-center justify-between mb-8 px-2">
            <div>
                <h2 class="font-black text-slate-900 text-xl tracking-tight">Sprint Overview</h2>
                <div class="h-1.5 w-8 pink-gradient rounded-full mt-1.5"></div>
            </div>
            <a href="/admin/sprints" class="text-[10px] font-black text-pink-500 uppercase tracking-[0.2em] bg-pink-50 px-4 py-2 rounded-full hover:bg-pink-500 hover:text-white transition-all duration-300">
                Manage All
            </a>
        </div>

        <div class="space-y-4">
            <p class="text-center py-6 text-slate-400 italic text-xs font-medium border-2 border-dashed border-slate-100 rounded-[2rem]">
                Activity history will appear here as sessions progress.
            </p>
        </div>
    </section>

</div>

@endsection