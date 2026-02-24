<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volver a Ti - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #FAF9F6; color: #333; }
        h1, h2, .serif { font-family: 'Playfair Display', serif; }
        .accent-text { color: #A68B67; }
    </style>
</head>
<body>

<main class="max-w-7xl mx-auto px-10 py-16 grid md:grid-cols-2 gap-12 items-center">
    
    <div>
        <div class="inline-flex items-center bg-[#F3EFEA] px-4 py-1 rounded-full text-[10px] uppercase tracking-widest text-[#8A765D] mb-8">
            <span class="mr-2">🏠</span> Simplify Your Shared Living
        </div>
        
        <h1 class="text-5xl md:text-6xl leading-tight mb-8">
            Home harmony <span class="accent-text italic">starts with</span> clear accounts.
        </h1>
        
        <p class="text-lg text-gray-600 leading-relaxed mb-8 max-w-md">
            Manage shared expenses, track balances, and build your roommate reputation. A tool designed to make co-living as easy as being home.
        </p>

        <div class="flex space-x-4">
            <button class="bg-[#222] text-white px-8 py-4 rounded-full font-medium hover:bg-black transition shadow-lg">
                Join for Free
            </button>
            <button class="border border-[#D6C7B3] px-8 py-4 rounded-full font-medium hover:bg-[#F3EFEA] transition">
                View Features
            </button>
        </div>
    </div>

    <div class="relative">
        <div class="rounded-lg overflow-hidden border-[12px] border-white shadow-2xl">
            <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&q=80&w=1000" 
                 alt="Shared Apartment" 
                 class="w-full h-auto object-cover aspect-[4/5] brightness-90">
        </div>

        <div class="absolute top-10 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-[#F3EFEA] flex items-center space-x-3">
            <div class="bg-green-100 p-2 rounded-full text-green-600 text-sm">⭐ 4.9</div>
            <div>
                <p class="text-[10px] font-bold text-gray-800">Roommate Score</p>
                <p class="text-[9px] text-gray-400">Top Payer • Cleanliness verified</p>
            </div>
        </div>

        <div class="absolute bottom-12 -right-6 bg-white p-5 rounded-2xl shadow-2xl border border-white max-w-[220px]">
            <h4 class="text-xs font-bold mb-3 flex justify-between">
                <span>Monthly Balance</span>
                <span class="text-[#A68B67] italic">Live</span>
            </h4>
            <div class="space-y-3">
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-gray-500">Utilities (Electricity)</span>
                    <span class="font-bold">$45.00</span>
                </div>
                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-[#A68B67] h-full w-[60%]"></div>
                </div>
                <p class="text-[9px] text-gray-400 font-medium">You owe Alex $22.50</p>
            </div>
        </div>
    </div>
</main>

</body>
</html>