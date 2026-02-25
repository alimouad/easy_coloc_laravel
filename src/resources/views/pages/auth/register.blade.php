@extends('layouts.authLayout')

@section('title', 'Sign Up | DarColoc Community')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-8 px-6">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center shadow-xl rotate-3">
                    <svg class="w-6 h-6 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-black tracking-tighter text-gray-900 uppercase">DarColoc</h2>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Shared Living Network</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-[10px] font-bold text-gray-400 uppercase">System Status</span>
                <div class="h-2 w-2 bg-[#D9FF40] rounded-full animate-pulse"></div>
            </div>
        </div>

        <div class="bg-white rounded-[3.5rem] shadow-2xl overflow-hidden border border-gray-100 flex flex-col lg:flex-row">

            <div class="lg:w-5/12 relative min-h-[400px] bg-zinc-900">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1000&auto=format&fit=crop"
                    alt="Roommates having coffee"
                    class="absolute inset-0 w-full h-full object-cover opacity-60 grayscale hover:grayscale-0 transition-all duration-700">

                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/30"></div>

                <div class="relative h-full p-12 flex flex-col justify-between">
                    <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20">
                        <p class="text-[#D9FF40] text-xs font-black uppercase mb-1">Active Now</p>
                        <p class="text-white text-sm">"The kitchen is clean! Who's up for a movie night in the lounge?"</p>
                        <p class="text-gray-400 text-[10px] mt-2">— Sarah, Room 4B</p>
                    </div>

                    <div class="text-white">
                        <h3 class="text-4xl font-black leading-none tracking-tighter mb-4">NOT JUST A ROOM.<br><span
                                class="text-[#D9FF40]">A TRIBE.</span></h3>
                        <p class="text-gray-400 text-sm font-medium leading-relaxed">Join a community where expenses are
                            transparent and roommates become family.</p>
                    </div>
                </div>
            </div>

            <div class="lg:w-7/12 p-8 md:p-16">
                <div class="flex items-center justify-between mb-12">
                    <div class="flex flex-col">
                        <span
                            class="text-[10px] font-black uppercase text-purple-600 bg-purple-50 px-3 py-1 rounded-full w-max mb-2">Phase
                            01: Identity</span>
                        <h3 class="text-3xl font-black text-gray-900 tracking-tight">Create Resident Profile</h3>
                    </div>
                    <div class="bg-gray-50 h-16 w-16 rounded-2xl flex items-center justify-center border border-gray-100">
                        <span class="text-2xl font-black text-gray-300">01</span>
                    </div>
                </div>

                <form action="{{ route('auth.register.submit') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="flex items-center space-x-6 mb-10">
                        <div class="group relative">
                            <div
                                class="w-20 h-20 bg-gray-100 rounded-[2rem] overflow-hidden border-4 border-white shadow-xl group-hover:scale-105 transition-transform">
                                <img src="https://ui-avatars.com/api/?name=Resident&background=D9FF40&color=000"
                                    id="preview" class="w-full h-full object-cover">
                            </div>
                            <label
                                class="absolute -bottom-2 -right-2 bg-black text-[#D9FF40] p-2 rounded-xl cursor-pointer hover:scale-110 transition shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <input type="file" class="hidden">
                            </label>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Your Resident Face</h4>
                            <p class="text-xs text-gray-400 leading-relaxed">This is how your roommates will see you <br> on
                                the dashboard.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="full_name" placeholder="Full Name"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-black transition-all outline-none font-bold">

                        <input type="email" name="email" placeholder="Personal Email"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-black transition-all outline-none font-bold">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="relative">
                            <input type="password" name="password" placeholder="Access Password"
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-black transition-all outline-none font-bold">
                            <button type="button"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-black">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="relative">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-black transition-all outline-none font-bold">
                            <button type="button"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-black">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>



                    <div class="bg-black rounded-[2.5rem] p-8 relative overflow-hidden group">
                        <div
                            class="absolute -right-10 -top-10 w-32 h-32 bg-[#D9FF40] rounded-full opacity-10 group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="flex justify-between items-center mb-6">
                            <span class="text-[10px] font-black text-[#D9FF40] uppercase tracking-widest">Resident Digital
                                Key</span>
                            <div class="h-6 w-10 bg-zinc-800 rounded-md border border-zinc-700"></div>
                        </div>

                        <div class="flex items-baseline space-x-1">
                            <span
                                class="text-3xl font-mono font-black tracking-tighter text-white">#DC-{{ date('y') }}-</span>
                            <span
                                class="text-3xl font-mono font-black tracking-tighter text-[#D9FF40] animate-pulse">XP88</span>
                        </div>
                        <p class="text-[9px] text-zinc-500 uppercase font-bold mt-4">Authorized for: Shared Kitchen, Lounge
                            & Laundry</p>
                    </div>

                    <button type="submit"
                        class="w-full bg-black text-white py-6 rounded-[2rem] font-black uppercase tracking-widest text-sm shadow-2xl hover:bg-zinc-800 transition-all hover:-translate-y-1 active:scale-95">
                        Create My Profile
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
