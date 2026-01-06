<div class="space-y-6">
    <h2 class="text-2xl font-black text-slate-900 px-1">Pinjaman Aktif</h2>
    <div class="grid gap-4">
        @forelse($peminjaman->where('status', '!=', 'Selesai') as $p)
            <div class="bg-white p-6 rounded-[2rem] border border-slate-200 flex justify-between items-center shadow-sm hover:border-emerald-200 transition-all">
                <div class="flex gap-4 items-center">
                    <div class="text-4xl bg-slate-50 p-4 rounded-2xl">{{ $p->alat->emoji ?? '🛠️' }}</div>
                    <div>
                        <h4 class="text-lg font-black text-slate-900">{{ $p->alat->nama ?? 'Alat Dihapus' }}</h4>
                        <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">
                            {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }} • {{ $p->durasi }} Hari
                        </p>
                    </div>
                </div>
                <div class="text-right flex flex-col items-end gap-2">
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest 
                        {{ $p->status == 'Pending' ? 'bg-amber-100 text-amber-600' : 'bg-blue-100 text-blue-600' }}">
                        {{ $p->status }}
                    </span>
                    <p class="text-lg font-black text-slate-900">Rp {{ number_format($p->total, 0, ',', '.') }}</p>
                </div>
            </div>
        @empty
            <div class="py-20 text-center bg-slate-50 rounded-[2.5rem] border-2 border-dashed border-slate-200">
                <p class="text-slate-400 font-bold italic text-sm">Tidak ada pinjaman yang sedang berlangsung.</p>
                <button onclick="pindahTab('katalog')" class="mt-4 text-emerald-600 font-black text-[10px] uppercase tracking-widest">Cari Alat Sekarang</button>
            </div>
        @endforelse
    </div>
</div>