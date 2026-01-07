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
        .scrollbar-hide::-webkit-scrollbar { display: none; }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">

<button
    id="btnSidebar"
    class="lg:hidden fixed top-4 left-4 z-50
           bg-emerald-600 text-white w-12 h-12 rounded-xl shadow-lg
           flex items-center justify-center text-2xl font-bold transition-transform active:scale-90">
    ☰
</button>

<div
    id="sidebarOverlay"
    class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 lg:hidden">
</div>

@include('partials.header')

<div class="flex flex-1 w-full overflow-hidden">
    <aside
        id="sidebar"
        class="fixed lg:sticky top-0 left-0 z-40
               w-72 h-screen bg-white border-r border-slate-100
               transform -translate-x-full lg:translate-x-0
               transition-transform duration-300 ease-in-out overflow-y-auto">
        
        @include('partials.sidebar')
    </aside>

    <main class="flex-1 flex flex-col bg-[#f8fafc] overflow-y-auto">
        <div class="p-4 lg:p-8 flex-1">
            @yield('content')
        </div>

        <footer class="py-12 border-t border-slate-100 bg-white">
            <div class="text-center">
                <div class="flex items-center justify-center gap-2 mb-3">
                    <i data-lucide="tractor" class="w-5 h-5 text-slate-300"></i>
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-[0.4em]">
                        TaniSewa Digital Desa
                    </span>
                </div>
                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.15em]">
                    Portal Layanan Peminjaman Alat © 2026
                </p>
            </div>
        </footer>
    </main>
</div>

@include('warga.partials.modal-sewa')

<script>
document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();

    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('btnSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    
    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; 
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    openBtn?.addEventListener('click', openSidebar);
    overlay?.addEventListener('click', closeSidebar);

    // Event delegation untuk tombol close
    document.addEventListener('click', (e) => {
        if (e.target.closest('#btnCloseSidebar')) {
            closeSidebar();
        }
    });
});
</script>

@stack('scripts')
</body>
</html>


