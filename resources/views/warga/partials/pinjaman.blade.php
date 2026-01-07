<div class="space-y-6">
    <h2 class="text-xl md:text-2xl font-black text-slate-900 px-1">Pinjaman Aktif</h2>
    <div class="grid gap-4">
        @forelse($peminjaman->where('status', '!=', 'Selesai') as $p)
            <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-[2rem] border border-slate-200 flex flex-col md:flex-row md:justify-between md:items-center shadow-sm hover:border-emerald-200 transition-all gap-4">
                
                <div class="flex gap-4 items-center">
                    <div class="text-3xl md:text-4xl bg-slate-50 p-3 md:p-4 rounded-xl md:rounded-2xl shrink-0">
                        {{ $p->alat->emoji ?? '🛠️' }}
                    </div>
                    <div>
                        <h4 class="text-base md:text-lg font-black text-slate-900 leading-tight">
                            {{ $p->alat->nama ?? 'Alat Dihapus' }}
                        </h4>
                        <p class="text-[9px] md:text-[10px] text-slate-400 font-black uppercase tracking-widest mt-1">
                            {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }} • {{ $p->durasi }} Hari
                        </p>
                    </div>
                </div>

                <div class="flex flex-row-reverse md:flex-col justify-between items-center md:items-end md:text-right border-t md:border-t-0 pt-3 md:pt-0 border-slate-100 gap-2">
                    <span class="px-4 py-1.5 rounded-full text-[9px] md:text-[10px] font-black uppercase tracking-widest 
                        {{ $p->status == 'Pending' ? 'bg-amber-100 text-amber-600' : 'bg-blue-100 text-blue-600' }}">
                        {{ $p->status }}
                    </span>
                    <p class="text-base md:text-lg font-black text-slate-900">
                        Rp {{ number_format($p->total, 0, ',', '.') }}
                    </p>
                </div>

            </div>
        @empty
            <div class="py-12 md:py-20 text-center bg-slate-50 rounded-2xl md:rounded-[2.5rem] border-2 border-dashed border-slate-200 px-4">
                <p class="text-slate-400 font-bold italic text-sm">Tidak ada pinjaman yang sedang berlangsung.</p>
                <button onclick="pindahTab('katalog')" class="mt-4 text-emerald-600 font-black text-[10px] uppercase tracking-widest">Cari Alat Sekarang</button>
            </div>
        @endforelse
    </div>
</div>