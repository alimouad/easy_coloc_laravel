<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DarColoc | Simplify Your Living</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F4F4; /* Matches the screenshot background */
            color: #1a1a1a;
        }

        .lime-accent {
            background-color: #D9FF40;
        }

        .text-lime-accent {
            color: #D9FF40;
        }
    </style>
</head>

<body>

    <main class="max-w-7xl mx-auto px-10 py-20 grid md:grid-cols-2 gap-16 items-center">

        @include('partials.flashMessage')
        <div>
            <div
                class="inline-flex items-center bg-white border border-gray-200 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-8 shadow-sm">
                <span class="mr-2 text-black">●</span> Live Colocation Tracking
            </div>

            <h1 class="text-6xl md:text-7xl font-black leading-[0.9] tracking-tighter mb-8 text-black">
                HOME HARMONY <br>
                <span class="text-gray-400">STARTS WITH</span><br>
                CLEAR ACCOUNTS.
            </h1>

            <p class="text-lg text-gray-500 leading-relaxed mb-10 max-w-md font-medium">
                Manage shared expenses and track roommate balances with the same precision as a global logistics firm. 
            </p>

            <div class="flex space-x-4">
                <button
                    class="bg-black text-white px-10 py-5 rounded-2xl font-bold hover:bg-zinc-800 transition shadow-xl shadow-black/10 active:scale-95">
                    Join for Free
                </button>
                <button
                    class="bg-white border-2 border-gray-100 px-10 py-5 rounded-2xl font-bold hover:border-black transition active:scale-95">
                    View Features
                </button>
            </div>
        </div>

        <div class="relative">

            <div class="rounded-[3.5rem] overflow-hidden border-[12px] border-white shadow-2xl relative">
                <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&q=80&w=1000"
                    class="w-full h-auto aspect-[4/5] object-cover grayscale-[30%] brightness-90">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
            </div>

            <div
                class="absolute -top-6 -left-8 bg-white/90 backdrop-blur-xl p-6 rounded-[2rem] shadow-2xl border border-white/50 max-w-[220px]">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-black flex items-center justify-center text-[#D9FF40] font-black">
                        M
                    </div>
                    <div>
                        <h4 class="text-[11px] font-black text-black uppercase">Mouad's Score</h4>
                        <p class="text-[10px] text-gray-500 font-bold tracking-tight">Verified Resident</p>
                    </div>
                </div>
                <div class="inline-block lime-accent text-black text-[10px] font-black px-2 py-1 rounded-lg uppercase tracking-tighter">
                    ⭐ 4.98 Reputation
                </div>
            </div>

            <div class="absolute bottom-10 -right-10 bg-black p-8 rounded-[2.5rem] shadow-2xl w-[280px] text-white">
                <div class="flex justify-between items-start mb-8">
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-500">Balance ID #772-90</span>
                    <span class="lime-accent text-black text-[9px] font-black px-2 py-1 rounded">IN TRANSIT</span>
                </div>
                
                <div class="space-y-5">
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Total Owed</p>
                        <span class="text-4xl font-black tracking-tighter">$124.50</span>
                    </div>

                    <div class="h-2 w-full bg-zinc-800 rounded-full overflow-hidden">
                        <div class="h-full lime-accent w-3/4"></div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <div class="w-7 h-7 rounded-full border-2 border-black bg-gray-600"></div>
                            <div class="w-7 h-7 rounded-full border-2 border-black bg-gray-400"></div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">2 Pending Roommates</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>