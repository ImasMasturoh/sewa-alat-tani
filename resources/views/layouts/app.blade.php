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
<body class="min-h-screen bg-[#f8fafc]">
<button
    id="btnSidebar"
    class="lg:hidden fixed top-3 left-4 z-[70] 
           bg-emerald-600 text-white w-11 h-11 rounded-xl shadow-lg
           flex items-center justify-center active:scale-95 transition-all">
    <i data-lucide="menu" class="w-6 h-6"></i>
</button>

<div
    id="sidebarOverlay"
    class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden">
</div>

@include('partials.header')

<div class="flex min-h-screen">
    <aside
        id="sidebar"
        class="fixed lg:sticky top-0 left-0 z-[60]
               w-72 h-screen bg-white border-r border-slate-100
               transform -translate-x-full lg:translate-x-0
               transition-transform duration-300 ease-in-out overflow-y-auto">
        @include('partials.sidebar')
    </aside>

    <main class="flex-1 flex flex-col min-w-0">
        <div class="p-4 pt-24 lg:pt-8 lg:p-8 flex-1">
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
    window.openModal = function(id = 'modalAlat') {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; 
        }
    }

    window.closeModal = function(id = 'modalAlat') {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto'; 
        }
    }
    window.prepareTambah = function() {
        const form = document.getElementById('formAlat');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        if (form && title) {
            form.reset();
            form.action = "{{ route('admin.alat.simpan') }}"; 
            if(methodField) methodField.innerHTML = ''; 
            title.innerText = 'Tambah Alat Baru';
            openModal('modalAlat');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (window.lucide) {
            lucide.createIcons();
        }
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

        openBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            openSidebar();
        });

        overlay?.addEventListener('click', closeSidebar);
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
