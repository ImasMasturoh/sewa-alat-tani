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

<!--HAMBURGER -->
<button
    id="btnSidebar"
    class="lg:hidden fixed top-4 left-4 z-50
           bg-emerald-600 text-white p-3 rounded-xl shadow-lg">
    <i data-lucide="menu" class="w-5 h-5"></i>
</button>
<div
    id="sidebarOverlay"
    class="hidden fixed inset-0 bg-black/50 z-30 lg:hidden">
</div>

@include('partials.header')

<div class="flex flex-1 w-full overflow-hidden">
    <aside
        id="sidebar"
        class="fixed lg:static z-40
               w-72 min-h-screen bg-white border-r border-slate-100
               transform -translate-x-full lg:translate-x-0
               transition-transform duration-300 ease-in-out">
        <div class="lg:hidden flex justify-end p-4">
            <button id="btnCloseSidebar"
                class="p-2 rounded-lg hover:bg-slate-100">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        @include('partials.sidebar')
    </aside>

    <main class="flex-1 flex flex-col bg-[#f8fafc] overflow-y-auto">
        <div class="p-3 lg:p-6 flex-1">
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
    const closeBtn = document.getElementById('btnCloseSidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    }

    openBtn?.addEventListener('click', openSidebar);
    closeBtn?.addEventListener('click', closeSidebar);
    overlay?.addEventListener('click', closeSidebar);
});
</script>

@stack('scripts')
</body>
</html>
