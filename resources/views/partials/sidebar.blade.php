<div class="lg:hidden flex justify-end p-4">
    <button id="btnCloseSidebar" class="p-2 rounded-lg hover:bg-slate-100 text-slate-500">
        <i data-lucide="x" class="w-6 h-6"></i>
    </button>
</div>

<div class="p-8 pt-2 lg:pt-8">
    <nav class="space-y-10">

        @if(request()->routeIs('admin.*'))
        <div>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-6 px-4">
                Menu Navigasi
            </p>

            <div class="space-y-2">
                <button id="nav-dashboard" onclick="pindahTab('dashboard')"
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                           font-bold text-sm bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm">
                    <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                    Statistik
                </button>

                <button id="nav-data-alat" onclick="pindahTab('data-alat')"
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                           font-bold text-sm text-slate-400 hover:bg-slate-50">
                    <i data-lucide="package" class="w-5 h-5"></i>
                    Inventaris
                </button>

                <button id="nav-data-pinjam" onclick="pindahTab('data-pinjam')"
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                           font-bold text-sm text-slate-400 hover:bg-slate-50">
                    <i data-lucide="check-square" class="w-5 h-5"></i>
                    Verifikasi
                </button>
            </div>
        </div>
        @endif

        @if(request()->routeIs('warga.*'))
        <div>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-6 px-4">
                Menu Navigasi
            </p>

            <div class="space-y-2">
                <button id="nav-dashboard" onclick="pindahTab('dashboard')"
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                           font-bold text-sm bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm">
                    <i data-lucide="layout-grid" class="w-5 h-5"></i>
                    Ringkasan
                </button>

                <button id="nav-katalog" onclick="pindahTab('katalog')"
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                           font-bold text-sm text-slate-400 hover:bg-slate-50">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    Katalog Alat
                </button>

                <button id="nav-pinjaman" onclick="pindahTab('pinjaman')"
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl
                           font-bold text-sm text-slate-400 hover:bg-slate-50">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                    Pinjamanku
                </button>

                <button id="nav-riwayat" onclick="pindahTab('riwayat')"
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