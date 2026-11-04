<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | Cardic Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800;900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-white font-sans antialiased flex items-center justify-center min-h-screen p-4">

    <div class="text-center max-w-sm w-full mx-auto">

        {{-- ── Large stylised 404 with ghost in the zero ── --}}
        <div class="relative inline-flex items-center justify-center select-none mb-6">
            {{-- "4" left --}}
            <span class="font-headline font-black text-[6rem] sm:text-[8rem] leading-none text-[#E63946]">4</span>

            {{-- "0" with ghost SVG inside --}}
            <span class="relative font-headline font-black text-[6rem] sm:text-[8rem] leading-none text-[#E63946] mx-1 sm:mx-2">
                0
                {{-- Ghost peeking from the centre of the "0" --}}
                <span class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-10 h-12 sm:w-12 sm:h-14 -mt-1" viewBox="0 0 48 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        {{-- Ghost body --}}
                        <path d="M24 2C13.5 2 5 10.5 5 21V44C5 46.2 6.3 48 8 48L12 44L16 48L20 44L24 48L28 44L32 48L36 44L40 48C41.7 48 43 46.2 43 44V21C43 10.5 34.5 2 24 2Z" fill="white" stroke="#E63946" stroke-width="2.5"/>
                        {{-- Eyes --}}
                        <circle cx="17" cy="22" r="3.5" fill="#06111E"/>
                        <circle cx="31" cy="22" r="3.5" fill="#06111E"/>
                        {{-- Eye shine --}}
                        <circle cx="18.2" cy="20.8" r="1.2" fill="white"/>
                        <circle cx="32.2" cy="20.8" r="1.2" fill="white"/>
                    </svg>
                </span>
            </span>

            {{-- "4" right --}}
            <span class="font-headline font-black text-[6rem] sm:text-[8rem] leading-none text-[#E63946]">4</span>
        </div>

        {{-- Title --}}
        <h1 class="font-headline font-black text-xl sm:text-2xl text-[#0F172A] mt-2">Page not found</h1>

        {{-- Description --}}
        <p class="text-sm text-slate-500 mt-3 leading-relaxed max-w-xs mx-auto">
            The page you are looking for doesn't exist or an error occurred.
            <a href="/" class="text-[#E63946] font-semibold hover:underline">Go back</a>,
            or head over to
            <a href="/" class="text-[#E63946] font-semibold hover:underline">Home</a>.
        </p>

        {{-- Action buttons --}}
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="/"
               class="inline-flex items-center gap-2 bg-[#06111E] hover:bg-[#0F172A] text-white font-bold text-sm px-6 py-2.5 rounded-full transition-all shadow-md">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                Go Home
            </a>
            <a href="/marketplace"
               class="inline-flex items-center gap-2 border border-slate-200 hover:border-slate-300 bg-white text-slate-700 font-bold text-sm px-6 py-2.5 rounded-full transition-all shadow-sm">
                Browse Gift Cards
            </a>
        </div>

        {{-- Cardic branding --}}
        <div class="mt-12 flex items-center justify-center gap-2 opacity-40">
            <div class="w-5 h-5 rounded-md bg-[#2563EB] flex items-center justify-center">
                <svg class="w-3 h-3 fill-white" viewBox="0 0 24 24"><path d="M20 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
            </div>
            <span class="text-xs font-bold text-slate-600 tracking-wide">Cardic Store</span>
        </div>

    </div>

</body>
</html>

