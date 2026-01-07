<aside
    id="sidebar"
    class="fixed lg:sticky inset-y-0 left-0 z-40
           w-72 bg-white border-r border-slate-100
           transform -translate-x-full lg:translate-x-0
           transition-transform duration-300 ease-in-out"
>
    <button
        id="btnCloseSidebar"
        class="lg:hidden absolute top-4 right-4 z-50
               text-slate-400 hover:text-slate-600">
        <i data-lucide="x" class="w-5 h-5"></i>
    </button>

    <!-- CONTENT -->
    <div class="p-8 pt-14 lg:pt-8 min-h-screen overflow-y-auto">

        <nav class="space-y-10">

            <!-- ADMIN -->
            @if(request()->routeIs('admin.*'))
            <div>
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-6 px-4">
                    Menu Navigasi
                </p>

                <div class="space-y-2">
                    <button onclick="pindahTab('dashboard')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm text-slate-400 hover:bg-slate-50">
                        <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                        Statistik
                    </button>

                    <button onclick="pindahTab('data-alat')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm bg-emerald-50 text-emerald-600
                               border border-emerald-100">
                        <i data-lucide="package" class="w-5 h-5"></i>
                        Inventaris
                    </button>

                    <button onclick="pindahTab('data-pinjam')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm text-slate-400 hover:bg-slate-50">
                        <i data-lucide="check-square" class="w-5 h-5"></i>
                        Verifikasi
                    </button>
                </div>
            </div>
            @endif

            <!-- WARGA -->
            @if(request()->routeIs('warga.*'))
            <div>
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-6 px-4">
                    Menu Navigasi
                </p>

                <div class="space-y-2">
                    <button onclick="pindahTab('dashboard')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm bg-emerald-50 text-emerald-600
                               border border-emerald-100">
                        <i data-lucide="layout-grid" class="w-5 h-5"></i>
                        Ringkasan
                    </button>

                    <button onclick="pindahTab('katalog')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm text-slate-400 hover:bg-slate-50">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                        Katalog Alat
                    </button>

                    <button onclick="pindahTab('pinjaman')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm text-slate-400 hover:bg-slate-50">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                        Pinjamanku
                    </button>

                    <button onclick="pindahTab('riwayat')"
                        class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                               font-bold text-sm text-slate-400 hover:bg-slate-50">
                        <i data-lucide="history" class="w-5 h-5"></i>
                        Riwayat Sewa
                    </button>
                </div>
            </div>
            @endif

        </nav>
    </div>
</aside>
