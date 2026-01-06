<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TaniSewa - Portal Warga')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc; 
        }
        [x-cloak] { display: none !important; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .animate-fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(10px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">

    @include('partials.header')

    <div class="flex flex-1 w-full overflow-hidden">
        
        @include('partials.sidebar')

        <main class="flex-1 flex flex-col min-w-0 bg-[#f8fafc] overflow-y-auto">
            <div class="p-2 lg:p-6 flex-1">
                @yield('content')
            </div>

            <footer class="py-12 border-t border-slate-100 bg-white">
                <div class="text-center">
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <i data-lucide="tractor" class="w-5 h-5 text-slate-300"></i>
                        <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.4em]">TaniSewa Digital Desa</span>
                    </div>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.15em]">
                        Portal Layanan Peminjaman Alat untuk Warga dan Bumdes Desa © 2026
                    </p>
                </div>
            </footer>
        </main>
    </div>

    @include('warga.partials.modal-sewa')
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
    @stack('scripts')
</body>
</html>