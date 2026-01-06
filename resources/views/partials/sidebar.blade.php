<aside class="w-72 border-r border-slate-100 min-h-screen p-8 bg-white hidden lg:block sticky top-0">
    <nav class="space-y-10">
        <!-- MENU ADMIN  -->
        @if(request()->routeIs('admin.*'))
        <div>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-6 px-4">Menu Navigasi</p>
            <div class="space-y-2">
                <button onclick="pindahTab('dashboard')" id="nav-dashboard" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm transition-all text-slate-400 hover:bg-slate-50">
                    <i data-lucide="bar-chart-3" class="w-5 h-5"></i> Statistik
                </button>

                <button onclick="pindahTab('data-alat')" id="nav-data-alat" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm bg-emerald-50 text-emerald-600 shadow-sm border border-emerald-100">
                    <i data-lucide="package" class="w-5 h-5"></i> Inventaris
                </button>

                <button onclick="pindahTab('data-pinjam')" id="nav-data-pinjam" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm text-slate-400 hover:bg-slate-50 transition-all">
                    <i data-lucide="check-square" class="w-5 h-5"></i> Verifikasi
                </button>
            </div>
        </div>
        @endif

        <!-- MENU WARGA  -->
        @if(request()->routeIs('warga.*'))
        <div>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-6 px-4">Menu Navigasi</p>
            <div class="space-y-2">
                <button onclick="pindahTab('dashboard')" id="nav-dashboard" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm bg-emerald-50 text-emerald-600 shadow-sm border border-emerald-100">
                    <i data-lucide="layout-grid" class="w-5 h-5"></i> Ringkasan
                </button>
                <button onclick="pindahTab('katalog')" id="nav-katalog" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm text-slate-400 hover:bg-slate-50 transition-all">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i> Katalog Alat
                </button>
                </button>
                <button onclick="pindahTab('pinjaman')" id="nav-pinjaman" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm text-slate-400 hover:bg-slate-50 transition-all">
                    <i data-lucide="calendar" class="w-5 h-5"></i> Pinjamanku
                </button>
                <button onclick="pindahTab('riwayat')" id="nav-riwayat" 
                    class="nav-item w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-sm text-slate-400 hover:bg-slate-50 transition-all">
                    <i data-lucide="history" class="w-5 h-5"></i> Riwayat Sewa
                </button>
            </div>
        </div>
        @endif
    </nav>
</aside>