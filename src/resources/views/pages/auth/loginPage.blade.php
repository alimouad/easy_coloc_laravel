@extends('layouts.authLayout')

@section('title', 'System Access | Debriefing')

@section('content')
<div class="min-h-screen relative flex items-center justify-center p-6 overflow-hidden">

    {{-- Full Background Image with 2026 "Nature Distilled" vibe --}}
    <!-- <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=2564&auto=format&fit=crop" 
             class="w-full h-full object-cover scale-105 blur-[2px]" alt="Background">
        {{-- Subtle Gradient Overlay to keep it professional --}}
        <div class="absolute inset-0 bg-white/40 backdrop-blur-[1px]"></div>
    </div> -->
         @error('credentials')
            <div class="p-3 rounded-lg bg-red-50 border border-red-100">
                <p class="text-sm text-red-600 text-center font-medium">{{ $message }}</p>
            </div>
        @enderror

    <div class="relative z-10 w-full max-w-[440px]">

        {{-- Success Alert (Bento Style) --}}
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="mb-4 p-4 bg-white/80 backdrop-blur-md border border-white rounded-2xl shadow-xl shadow-black/5 flex items-center gap-3 animate-bounce-subtle">
            <span class="material-symbols-outlined text-primary">verified</span>
            <span class="text-slate-800 text-sm font-bold">{{ session('success') }}</span>
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif

        {{-- MAIN CARD --}}
        <div class="bg-white/70 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_30px_100px_rgba(0,0,0,0.1)] border border-white ring-1 ring-black/[0.02] overflow-hidden">

            <div class="p-10 sm:p-12">
                {{-- Logo & Header --}}
                <div class="flex flex-col items-center text-center mb-10">
                    <div class="w-16 h-16 bg-white rounded-3xl shadow-lg border border-slate-100 flex items-center justify-center mb-6 transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <span class="material-symbols-outlined text-primary text-3xl">terminal</span>
                    </div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight leading-none">Debrief.Me</h1>
                    <p class="text-slate-500 text-sm mt-3 font-medium">Authentication required for secure node</p>
                </div>

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-5" novalidate>
                    @csrf

                    {{-- Email Input --}}
                    <div class="group">
                        <div class="relative">
                            <input type="email" name="email" placeholder="Email Address"
                                value="{{ old('email', $data['email'] ?? '') }}"
                                class="w-full bg-white/60 border border-slate-200/50 rounded-2xl py-4 pl-12 pr-4 text-slate-900 placeholder-slate-400
                                       focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary/50 focus:outline-none transition-all duration-300 shadow-sm">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">alternate_email</span>
                        </div>
                        @error('email')
                        <p class="text-[11px] text-rose-500 font-bold mt-2 ml-2 tracking-wide capitalize">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password Input --}}
                    <div class="group">
                        <div class="relative">
                            <input type="password" name="password" placeholder="Access Key"
                                class="w-full bg-white/60 border border-slate-200/50 rounded-2xl py-4 pl-12 pr-4 text-slate-900 placeholder-slate-400
                                       focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary/50 focus:outline-none transition-all duration-300 shadow-sm">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">lock</span>
                        </div>
                        <div class="flex justify-end mt-2">
                            <a href="#" class="text-[11px] font-black text-slate-400 hover:text-primary uppercase tracking-widest transition-colors">Forgot?</a>
                        </div>
                        @error('password')
                        <p class="text-[11px] text-rose-500 font-bold mt-2 ml-2 tracking-wide capitalize">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Login Button --}}
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary text-white font-black py-4 rounded-2xl 
                               shadow-xl shadow-indigo-200 hover:shadow-indigo-300/50 hover:-translate-y-1 
                               active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-3">
                        <span class="tracking-wide">Authorize Session</span>
                        <span class="material-symbols-outlined text-[18px]">bolt</span>
                    </button>
                </form>

                {{-- Help Footer --}}
                <div class="mt-10 flex items-center justify-between text-[11px] font-bold text-slate-400 uppercase tracking-widest px-2">
                    <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> System Live</span>
                    <a href="#" class="hover:text-primary transition-colors underline underline-offset-4">Need Help?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes bounce-subtle {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-4px);
        }
    }

    .animate-bounce-subtle {
        animation: bounce-subtle 3s infinite ease-in-out;
    }
</style>
@endsection