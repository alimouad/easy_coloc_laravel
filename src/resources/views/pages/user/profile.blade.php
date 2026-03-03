@extends('layouts.userLayout')

@section('title', 'Profile | DarColoc')

@section('content')
    <main class="max-w-7xl mx-auto px-6 lg:px-12 py-10">
        <div class="mb-12">
            <div class="inline-block bg-[#D9FF40] px-3 py-1 text-[9px] font-black uppercase border border-black/5 mb-6">
                Your Identity
            </div>
            <h2 class="text-7xl font-black tracking-tighter uppercase text-gray-900 leading-[0.85]">
                User <br> <span class="text-gray-200">Profile.</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Card -->
            <div class="lg:col-span-2 bg-white border border-gray-100 rounded-[3.5rem] p-10 shadow-sm">
                <div class="flex flex-col md:flex-row gap-10 items-start">
                    <!-- Avatar Section -->
                    <div class="flex flex-col items-center space-y-6">
                        <div class="relative group">
                            <div class="absolute -inset-2 bg-gradient-to-r from-[#D9FF40] to-black rounded-[3rem] opacity-20 group-hover:opacity-40 blur-xl transition duration-500"></div>
                            <div class="relative w-32 h-32 rounded-[2.5rem] bg-black overflow-hidden border-4 border-gray-100 shadow-2xl">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=D9FF40&color=000&size=256"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        
                        @if ($user->role === 'ADMIN')
                            <div class="flex items-center space-x-2 bg-[#D9FF40] px-4 py-2 rounded-2xl border border-black/5">
                                <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-[10px] font-black uppercase tracking-widest">Admin</span>
                            </div>
                        @endif
                    </div>

                    <!-- Details Section -->
                    <div class="flex-1 space-y-8">
                        <div>
                            <h3 class="text-4xl font-black tracking-tighter uppercase italic mb-2">{{ $user->full_name }}</h3>
                            <p class="text-sm text-gray-500 font-mono">{{ $user->email }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Net Balance -->
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Net Balance</span>
                                </div>
                                <p class="text-2xl font-black tracking-tighter italic {{ $user->net_balance > 0 ? 'text-emerald-400' : ($user->net_balance < 0 ? 'text-rose-400' : 'text-gray-900') }}">
                                    {{ $user->net_balance >= 0 ? '+' : '' }}{{ number_format($user->net_balance, 2) }}
                                    <span class="text-sm {{ $user->net_balance > 0 ? 'text-emerald-300' : ($user->net_balance < 0 ? 'text-rose-300' : 'text-gray-500') }}">MAD</span>
                                </p>
                            </div>

                            <!-- Reputation -->
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-[#D9FF40]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Reputation Score</span>
                                </div>
                                <p class="text-2xl font-black tracking-tighter italic {{ $user->reputation_score >= 0 ? 'text-gray-900' : 'text-rose-600' }}">
                                    {{ $user->reputation_score }}
                                </p>
                            </div>

                            <!-- Member Since -->
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Member Since</span>
                                </div>
                                <p class="text-sm font-bold text-gray-900">{{ $user->created_at->format('F d, Y') }}</p>
                            </div>

                            <!-- Account Status -->
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</span>
                                </div>
                                @if ($user->is_banned)
                                    <span class="inline-flex items-center px-3 py-1 bg-rose-500 text-white text-[10px] font-black uppercase rounded-full">
                                        <span class="w-2 h-2 bg-white rounded-full mr-2"></span>
                                        Banned
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 bg-green-500 text-white text-[10px] font-black uppercase rounded-full">
                                        <span class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></span>
                                        Active
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colocation Info Card -->
            <div class="space-y-6">
                @if ($myFlatshare)
                    <div class="bg-black text-white border border-white/10 rounded-[3rem] p-8 shadow-2xl">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Current Colocation</h4>
                            <svg class="w-6 h-6 text-[#D9FF40]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-2xl font-black tracking-tighter uppercase italic mb-2">{{ $myFlatshare->name }}</h3>
                                <p class="text-xs font-mono text-gray-400">{{ $myFlatshare->token }}</p>
                            </div>

                            <div class="pt-4 border-t border-white/10 space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Members</span>
                                    <span class="text-sm font-black text-[#D9FF40]">{{ $myFlatshare->users->count() }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Your Role</span>
                                    @if ($myFlatshare->owner_id === $user->id)
                                        <span class="px-2 py-0.5 bg-[#D9FF40] text-black text-[8px] font-black uppercase rounded">Owner</span>
                                    @else
                                        <span class="px-2 py-0.5 bg-white/10 text-white text-[8px] font-black uppercase rounded">Member</span>
                                    @endif
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Joined</span>
                                    <span class="text-xs font-bold text-white">{{ $user->updated_at->format('M d, Y') }}</span>
                                </div>
                            </div>

                            <a href="{{ route('user.flatshare.show', $myFlatshare->id) }}"
                                class="block w-full bg-white text-black py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] text-center hover:bg-[#D9FF40] transition-all shadow-xl active:scale-95 mt-6">
                                View Colocation
                            </a>
                        </div>
                    </div>
                @else
                    <div class="bg-white border border-gray-200 rounded-[3rem] p-8 shadow-sm">
                        <div class="text-center space-y-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-black uppercase italic mb-2">No Colocation</h4>
                                <p class="text-xs text-gray-500">You haven't joined any colocation yet.</p>
                            </div>
                            <div class="pt-4 space-y-3">
                                <a href="{{ route('user.flatshare.create') }}"
                                    class="block w-full bg-black text-white py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] text-center hover:bg-[#D9FF40] hover:text-black transition-all shadow-xl active:scale-95">
                                    Create New
                                </a>
                                <a href="{{ route('user.flatshare.available') }}"
                                    class="block w-full border-2 border-black text-black py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] text-center hover:bg-black hover:text-[#D9FF40] transition-all active:scale-95">
                                    Browse Available
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Statistics Card -->
                <div class="bg-white border border-gray-100 rounded-[3rem] p-8 shadow-sm space-y-6">
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Statistics</h4>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                            <span class="text-xs font-bold text-gray-500">Total Credits</span>
                            <span class="text-lg font-black text-emerald-600">{{ number_format($user->credits, 2) }} MAD</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                            <span class="text-xs font-bold text-gray-500">Total Debts</span>
                            <span class="text-lg font-black text-rose-600">{{ number_format($user->debts, 2) }} MAD</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-500">Invitations Sent</span>
                            <span class="text-lg font-black text-gray-900">{{ $user->sentInvitations->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
