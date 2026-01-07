<div class="space-y-6 animate-fade-in">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 px-1">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Riwayat Sewa</h2>
        <div class="bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest border border-emerald-100 self-start sm:self-auto">
            {{ $peminjaman->where('status', 'Selesai')->count() }} Transaksi Berhasil
        </div>
    </div>

    <div class="bg-white sm:rounded-[2.5rem] rounded-3xl border border-slate-100 overflow-hidden shadow-sm">
        
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 border-b border-slate-100 text-[10px] font-black uppercase text-slate-400 tracking-widest">
                    <tr>
                        <th class="px-8 py-6">Peralatan Tani</th>
                        <th class="px-8 py-6 text-center">Tanggal Pinjam</th>
                        <th class="px-8 py-6 text-center">Status</th>
                        <th class="px-8 py-6 text-right">Total Biaya</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($peminjaman->where('status', 'Selesai') as $r)
                        <tr class="hover:bg-slate-50/30 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="text-2xl bg-slate-50 w-12 h-12 flex items-center justify-center rounded-2xl group-hover:scale-110 transition-transform text-slate-600">
                                        {{ $r->alat->emoji ?? '🚜' }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900 leading-tight">{{ $r->alat->nama ?? 'Alat Dihapus' }}</p>
                                        <p class="text-[9px] text-slate-400 font-black uppercase mt-1 tracking-tighter">ID: #{{ $r->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center text-xs text-slate-500 font-bold italic">
                                {{ \Carbon\Carbon::parse($r->tanggal_pinjam)->format('d M Y') }}
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    {{ $r->status }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right font-black text-emerald-600">
                                Rp {{ number_format($r->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y divide-slate-50">
            @forelse($peminjaman->where('status', 'Selesai') as $r)
                <div class="p-5 flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="text-xl bg-slate-50 w-10 h-10 flex items-center justify-center rounded-xl text-slate-600">
                                {{ $r->alat->emoji ?? '🚜' }}
                            </div>
                            <div>
                                <p class="font-bold text-slate-900 text-sm leading-tight">{{ $r->alat->nama ?? 'Alat Dihapus' }}</p>
                                <p class="text-[9px] text-slate-400 font-black uppercase tracking-tighter">ID: #{{ $r->id }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full text-[8px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100">
                            {{ $r->status }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between bg-slate-50/50 p-3 rounded-xl border border-slate-100">
                        <div class="flex flex-col">
                            <span class="text-[8px] text-slate-400 font-black uppercase tracking-widest">Tgl Pinjam</span>
                            <span class="text-xs text-slate-600 font-bold italic">{{ \Carbon\Carbon::parse($r->tanggal_pinjam)->format('d M Y') }}</span>
                        </div>
                        <div class="flex flex-col text-right">
                            <span class="text-[8px] text-slate-400 font-black uppercase tracking-widest">Total Bayar</span>
                            <span class="text-sm font-black text-emerald-600">Rp {{ number_format($r->total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                @endforelse
        </div>

        @if($peminjaman->where('status', 'Selesai')->isEmpty())
            <div class="px-8 py-16 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-2">
                        <i data-lucide="archive" class="w-8 h-8 text-slate-200"></i>
                    </div>
                    <p class="text-slate-400 font-bold italic text-sm">Belum ada riwayat peminjaman.</p>
                </div>
            </div>
        @endif
    </div>
</div>