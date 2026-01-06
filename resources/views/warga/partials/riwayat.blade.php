<div class="space-y-6 animate-fade-in">
    <div class="flex items-center justify-between px-1">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Riwayat Sewa</h2>
        <div class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest border border-emerald-100">
            {{ $peminjaman->where('status', 'Selesai')->count() }} Transaksi Berhasil
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
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
                                    <div class="text-2xl bg-slate-50 w-12 h-12 flex items-center justify-center rounded-2xl group-hover:scale-110 transition-transform">
                                        {{ $r->alat->emoji ?? '🚜' }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900 leading-tight">{{ $r->alat->nama ?? 'Alat Dihapus' }}</p>
                                        <p class="text-[9px] text-slate-400 font-black uppercase mt-1 tracking-tighter">ID: #{{ $r->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="text-xs text-slate-500 font-bold italic">
                                    {{ \Carbon\Carbon::parse($r->tanggal_pinjam)->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <!-- Status Selesai -->
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    {{ $r->status }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right font-black text-emerald-600">
                                Rp {{ number_format($r->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <i data-lucide="archive" class="w-10 h-10 text-slate-200"></i>
                                    <p class="text-slate-400 font-bold italic text-sm">Belum ada riwayat peminjaman yang selesai.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>