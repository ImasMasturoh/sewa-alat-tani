<div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
    <!-- List Aktivitas peminjaman -->
    <div class="lg:col-span-2 space-y-6">
        <div class="flex justify-between items-center px-1">
            <h3 class="font-black text-slate-900 text-[11px] uppercase tracking-[0.15em]">Aktivitas Peminjaman Desa</h3>
            <button onclick="pindahTab('pinjaman')" class="text-[11px] font-bold text-emerald-600 flex items-center gap-1.5 hover:underline">
                Lihat Pinjamanku <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </button>
        </div>
        
        <div class="space-y-4">
            @forelse($peminjaman->take(5) as $sewa)
                <div class="bg-white p-5 rounded-[1.8rem] border border-slate-100 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="text-2xl bg-slate-50 w-14 h-14 flex items-center justify-center rounded-2xl">
                            {{ $sewa->alat->emoji ?? '🚜' }}
                        </div>
                        <div>
                            <h4 class="font-black text-slate-900 text-sm tracking-tight">{{ $sewa->alat->nama ?? 'Alat' }}</h4>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">
                                {{ strtoupper($sewa->nama_peminjam) }} (RT {{ $sewa->rt_peminjam }}) • {{ $sewa->tanggal_pinjam->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="px-5 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest border
                        @if($sewa->status === 'Selesai') bg-emerald-50 text-emerald-600 border-emerald-100
                        @elseif($sewa->status === 'Dipinjam') bg-orange-50 text-orange-600 border-orange-100
                        @else bg-blue-50 text-blue-600 border-blue-100 @endif">
                        {{ $sewa->status }}
                    </div>
                </div>
            @empty
                <div class="py-12 text-center bg-slate-50 rounded-[1.8rem] border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-bold italic text-xs">Belum ada aktivitas terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Alat Populer -->
    <div class="space-y-6">
        <h3 class="font-black text-slate-900 text-[11px] uppercase tracking-[0.15em] px-1">Alat Populer</h3>
        <div class="bg-emerald-600 rounded-[2.2rem] p-7 text-white shadow-xl shadow-emerald-200">
            <div class="flex items-center gap-4 mb-8">
                <div class="text-3xl bg-white/20 w-14 h-14 flex items-center justify-center rounded-2xl shadow-inner">
                    🚜
                </div>
                <div>
                    <h4 class="font-black text-sm leading-tight">Kubota G1000</h4>
                    <p class="text-[10px] font-bold text-emerald-200 tracking-tight">Banyak Disewa Musim Ini</p>
                </div>
            </div>
            <button onclick="pindahTab('katalog')" class="w-full bg-[#0f172a] text-white py-3.5 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-800 transition-all shadow-lg">
                Lihat Detail
            </button>
        </div>
    </div>
</div>