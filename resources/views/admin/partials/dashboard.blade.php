<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Total Pendapatan Lunas -->
    <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-slate-300 relative overflow-hidden group hover:shadow-lg transition-all">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Total Pendapatan Lunas</p>
        <h4 class="text-3xl font-black text-emerald-700">
            Rp {{ number_format($peminjaman->where('status', 'Selesai')->sum('total'), 0, ',', '.') }}
        </h4>
    </div>

    <!-- Permintaan Pending  -->
    <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-slate-200 relative overflow-hidden group hover:shadow-lg transition-all">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Permintaan Pending</p>
        <h4 class="text-3xl font-black text-slate-900">
            {{ $peminjaman->where('status', 'Pending')->count() }} Unit
        </h4>
     </div>

    <!-- Unit Sedang Dipakai -->
    <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-slate-200 relative overflow-hidden group hover:shadow-lg transition-all">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Unit Sedang Dipakai</p>
        <h4 class="text-3xl font-black text-slate-900">
            {{ $peminjaman->where('status', 'Dipinjam')->count() }} Unit
        </h4>
</div>
</div>