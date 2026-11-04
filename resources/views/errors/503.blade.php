<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 — Under Maintenance | Cardic Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        headline: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-white font-sans antialiased flex items-center justify-center min-h-screen p-4">

    <div class="text-center max-w-sm w-full mx-auto">

        {{-- Traffic Cone SVG (same style as 500) --}}
        <div class="flex items-center justify-center mb-6">
            <svg class="w-24 h-28 sm:w-28 sm:h-32" viewBox="0 0 120 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="60" cy="132" rx="40" ry="6" fill="#E2E8F0"/>
                <rect x="15" y="118" width="90" height="12" rx="4" fill="#CBD5E1"/>
                <path d="M28 118 L40 60 L80 60 L92 118Z" fill="#F97316"/>
                <path d="M43 60 L52 20 L68 20 L77 60Z" fill="#F97316"/>
                <rect x="29" y="98" width="62" height="10" rx="1" fill="white" opacity="0.85"/>
                <rect x="42" y="38" width="36" height="9" rx="1" fill="white" opacity="0.85"/>
                <ellipse cx="60" cy="20" rx="8" ry="4" fill="#FB923C"/>
                <ellipse cx="60" cy="16" rx="4" ry="2.5" fill="#FDA464"/>
            </svg>
        </div>

        <h1 class="font-headline font-black text-xl sm:text-2xl text-[#0F172A]">Site is Under Maintenance</h1>

        <p class="text-sm text-slate-500 mt-3 leading-relaxed max-w-xs mx-auto">
            We're upgrading our systems to serve you better. Thank you for your patience — we'll be back very soon.
        </p>

        <p class="text-xs text-slate-400 mt-5 font-medium">You can still reach us at our social media accounts</p>
        <div class="flex items-center justify-center gap-3 mt-3">
            <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"
               class="w-9 h-9 rounded-full border border-slate-200 hover:border-[#1877F2] bg-white hover:bg-[#1877F2] text-slate-500 hover:text-white flex items-center justify-center transition-all shadow-sm">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"
               class="w-9 h-9 rounded-full border border-slate-200 hover:border-[#E4405F] bg-white hover:bg-[#E4405F] text-slate-500 hover:text-white flex items-center justify-center transition-all shadow-sm">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="https://wa.me/?text=Hello%20Cardic%20Store%20Support" target="_blank" rel="noopener" aria-label="WhatsApp"
               class="w-9 h-9 rounded-full border border-slate-200 hover:border-[#25D366] bg-white hover:bg-[#25D366] text-slate-500 hover:text-white flex items-center justify-center transition-all shadow-sm">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            </a>
            <a href="mailto:support@cardicstore.com" aria-label="Email Support"
               class="w-9 h-9 rounded-full border border-slate-200 hover:border-[#2563EB] bg-white hover:bg-[#2563EB] text-slate-500 hover:text-white flex items-center justify-center transition-all shadow-sm">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/></svg>
            </a>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-3">
            <span class="text-xs text-slate-400 font-medium shrink-0">Send us an Email</span>
            <a href="mailto:support@cardicstore.com"
               class="inline-flex items-center gap-1.5 border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-xs px-4 py-2 rounded-full transition-all shadow-xs">
                support@cardicstore.com
            </a>
        </div>

        <div class="mt-12 flex items-center justify-center gap-2 opacity-40">
            <div class="w-5 h-5 rounded-md bg-[#2563EB] flex items-center justify-center">
                <svg class="w-3 h-3 fill-white" viewBox="0 0 24 24"><path d="M20 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
            </div>
            <span class="text-xs font-bold text-slate-600 tracking-wide">Cardic Store</span>
        </div>

    </div>

</body>
</html>
