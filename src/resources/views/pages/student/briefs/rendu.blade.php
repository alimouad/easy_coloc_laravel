@extends('layouts.studentLayout')

@section('title', 'Submit Project')

@section('content')
<div class="max-w-5xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-8 duration-1000 p-1">

    {{-- Header --}}
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-6">
            <a href="{{ route('student.briefs') }}" class="w-14 h-14 rounded-2xl bg-white shadow-sm border border-emerald-100 flex items-center justify-center text-slate-400 hover:text-emerald-500 transition-all active:scale-90">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight leading-none">
                    Submit <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-400">Rendu</span>
                </h1>
                <p class="text-slate-400 text-sm font-bold mt-2 uppercase tracking-widest">
                    {{ $brief->title }}
                </p>
            </div>
        </div>

    </header>
    @if($submission)
        <div class="mb-6 p-6 rounded-2xl bg-amber-50 border border-amber-200 text-amber-700">
            <h3 class="font-bold text-sm uppercase tracking-wide mb-2">
                Already Submitted
            </h3>
            <p class="text-sm">
                Submitted on {{ $submission->created_at->format('d M Y') }}
            </p>
        </div>
    @endif


    <section class="bg-white/80 backdrop-blur-xl rounded-[3.5rem] p-10 border border-white shadow-[0_20px_50px_rgba(0,0,0,0.04)] relative">
        <form action="{{ route('student.briefs.submit', $brief->id) }}" method="POST" class="space-y-8">
            @csrf

            {{-- URL Input --}}
            <div class="space-y-4">
                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-6 block">Repository URL (GitHub/GitLab)</label>
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-emerald-500 transition-colors">link</span>
                    <input type="url" name="repository_url" required
                        placeholder="https://github.com/username/project"
                        value="{{ old('repository_url', $submission->repository_url ?? '') }}"
                        class="w-full pl-16 pr-8 py-6 bg-slate-50 border-2 border-transparent rounded-[2.2rem] focus:bg-white focus:border-emerald-200 focus:ring-4 focus:ring-emerald-50 transition-all outline-none font-bold text-slate-700 shadow-inner @error('repository_url') border-rose-300 @enderror">
                </div>
                @error('repository_url')
                    <p class="text-rose-500 text-[10px] font-bold ml-6 uppercase tracking-wider">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description/Notes --}}
            <div class="space-y-4">
                <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-6 block">Submission Notes</label>
                <textarea name="description" rows="4"
                    placeholder="Provide any context, stack details, or credentials if necessary..."
                    class="w-full px-8 py-6 bg-slate-50 border-2 border-transparent rounded-[2.5rem] focus:bg-white focus:border-emerald-200 focus:ring-4 focus:ring-emerald-50 transition-all outline-none font-medium text-slate-600 leading-relaxed shadow-inner @error('description') border-rose-300 @enderror">{{ old('description', $submission->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-rose-500 text-[10px] font-bold ml-6 uppercase tracking-wider">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Action --}}
            <div class="flex items-center justify-between pt-4 gap-4">
                <div class="flex items-center gap-2 px-6 opacity-50">
                    <span class="material-symbols-outlined text-sm">lock</span>
                    <span class="text-[10px] font-black uppercase tracking-tighter">Secure Submission</span>
                </div>

                <button type="submit" class="px-12 py-5 bg-gradient-to-r from-emerald-600 to-emerald-400 text-white font-black rounded-3xl shadow-xl shadow-emerald-500/30 hover:-translate-y-1 transition-all flex items-center gap-3 active:scale-95">
                    <span class="material-symbols-outlined">
                        send
                    </span>
                   Send Submission
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
