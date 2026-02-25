@extends('layouts.authLayout')

@section('title', 'Login | DarColoc')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8 px-2">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center shadow-xl rotate-2 transition-transform hover:rotate-0">
                <svg class="w-6 h-6 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-black tracking-tighter text-gray-900 uppercase leading-none">DarColoc</h2>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Shared Living Network</p>
            </div>
        </div>
        <a href="{{ route('auth.register') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-black transition">Create Account</a>
    </div>

    <div class="bg-white rounded-[3.5rem] shadow-2xl overflow-hidden border border-gray-100 flex flex-col lg:flex-row">
        
        <div class="lg:w-5/12 relative min-h-[400px] lg:min-h-[600px] bg-zinc-900 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1556912177-c5483015480a?q=80&w=1000&auto=format&fit=crop" 
                 alt="Roommates Cooking" 
                 class="absolute inset-0 w-full h-full object-cover opacity-50 grayscale contrast-125">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
            
            <div class="relative h-full p-12 flex flex-col justify-end text-white">
                <div class="mb-8">
                    <div class="inline-flex items-center space-x-2 bg-[#D9FF40]/10 border border-[#D9FF40]/20 px-3 py-1 rounded-full mb-4">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#D9FF40]"></span>
                        <span class="text-[#D9FF40] text-[10px] font-black uppercase">Community Secure</span>
                    </div>
                    <h3 class="text-4xl font-black leading-none tracking-tighter uppercase">Unlock Your <br> Living Space.</h3>
                    <p class="text-gray-400 text-sm mt-4 font-medium opacity-80 leading-relaxed">Enter your credentials to access your colocation dashboard and shared expenses.</p>
                </div>
            </div>
        </div>

        <div class="lg:w-7/12 p-8 md:p-12 lg:p-20 flex flex-col justify-center">
            <div class="mb-12">
                <h3 class="text-3xl font-black text-gray-900 tracking-tight">Resident Login</h3>
                <p class="text-gray-400 text-sm font-bold uppercase tracking-widest mt-2">Welcome back to the tribe</p>
            </div>

            <form action="{{ route('auth.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-4">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase text-gray-400 mb-2 ml-1 block tracking-widest">Email Address</label>
                        <input type="email" name="email" placeholder="name@darcoloc.com" required
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm font-bold focus:bg-white focus:border-black transition-all outline-none">
                    </div>

                    <div class="group">
                        <div class="flex justify-between items-center mb-2 ml-1">
                            <label class="text-[10px] font-black uppercase text-gray-400 block tracking-widest">Access Password</label>
                            <a href="#" class="text-[10px] font-black uppercase text-gray-400 hover:text-black">Forgot?</a>
                        </div>
                        <input type="password" name="password" placeholder="••••••••" required
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm font-bold focus:bg-white focus:border-black transition-all outline-none">
                    </div>
                </div>

                <div class="flex items-center space-x-3 py-2">
                    <input type="checkbox" id="remember" class="w-4 h-4 rounded border-gray-300 focus:ring-0 accent-black">
                    <label for="remember" class="text-xs font-bold text-gray-500 uppercase tracking-widest cursor-pointer">Stay Authenticated</label>
                </div>

                <div class="bg-zinc-950 rounded-[2.5rem] p-6 relative overflow-hidden group border border-white/5 shadow-xl mt-4">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-[#D9FF40] rounded-full opacity-5 blur-2xl group-hover:opacity-10 transition-all duration-700"></div>
                    <div class="flex items-center justify-between relative z-10">
                        <div class="flex items-center space-x-3">
                            <div class="h-8 w-8 bg-[#D9FF40] rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-white uppercase tracking-widest">Encryption Key 256-Bit</span>
                        </div>
                        <div class="h-4 w-8 bg-zinc-800 rounded-sm border border-zinc-700"></div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-black text-white py-6 rounded-[2rem] font-black uppercase tracking-widest text-sm shadow-xl hover:bg-zinc-800 transition-all hover:-translate-y-1 active:scale-95">
                    Authorize Access
                </button>
            </form>

            <p class="text-center mt-10 text-xs font-bold text-gray-400 uppercase tracking-widest">
                New to the space? <a href="{{ route('auth.register') }}" class="text-black hover:underline">Join the tribe</a>
            </p>
        </div>
    </div>
</div>
@endsection