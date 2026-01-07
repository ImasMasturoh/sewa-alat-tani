<nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
        
        <div class="flex items-center gap-2 pl-14 lg:pl-0">
            <div class="bg-emerald-600 p-2 rounded-xl text-white shadow-lg shadow-emerald-200">
                <i data-lucide="tractor" class="w-6 h-6"></i>
            </div>
            <span class="text-xl font-extrabold text-emerald-900 tracking-tight">TaniSewa</span>
        </div>

        <div class="flex items-center gap-2 sm:gap-4">
            <div class="flex bg-slate-100 p-1 rounded-full border border-slate-200 shadow-inner scale-90 sm:scale-100">
                <a href="{{ route('warga.index') }}" class="{{ request()->routeIs('warga.*') ? 'bg-white shadow-sm text-emerald-600' : 'text-slate-500' }} px-3 sm:px-5 py-1.5 rounded-full text-[10px] sm:text-xs font-bold transition-all duration-200">
                    Warga
                </a>
                <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.*') ? 'bg-white shadow-sm text-emerald-600' : 'text-slate-500' }} px-3 sm:px-5 py-1.5 rounded-full text-[10px] sm:text-xs font-bold transition-all duration-200">
                    Admin
                </a>
            </div>

            <div class="h-8 w-px bg-slate-200 mx-1 hidden md:block"></div>

            <div class="flex items-center gap-2 sm:gap-3 bg-white p-1 pr-2 sm:pr-4 rounded-full border border-slate-100 shadow-sm">
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold text-xs">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </div>
                <div class="hidden xs:block sm:block text-left leading-none">
                    <p class="text-[10px] font-black text-slate-900">Umum</p>
                    <p class="text-[8px] text-slate-400 font-bold uppercase tracking-tighter">Warga Desa</p>
                </div>
            </div>
        </div>
    </div>
</nav>