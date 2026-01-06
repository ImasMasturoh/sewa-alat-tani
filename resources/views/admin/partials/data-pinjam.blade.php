<h2 class="text-2xl font-black text-slate-900 tracking-tight">Verifikasi Peminjaman Alat</h2>
<div class="bg-white rounded-[2.5rem] border border-slate-200 overflow-hidden shadow-sm">
    <div class="table-responsive">
        <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200 text-[10px] font-black uppercase text-slate-400 tracking-widest">
                <tr>
                    <th class="px-8 py-5">Peminjam / Alat</th>
                    <th class="px-8 py-5">Tagihan</th>
                    <th class="px-8 py-5 text-center">Status</th>
                    <th class="px-8 py-5 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($peminjaman as $sewa)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-5">
                        <p class="font-black text-slate-900 leading-none mb-1">{{ $sewa->nama_peminjam }}</p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase">{{ $sewa->alat->nama }}</p>
                    </td>
                    <td class="px-8 py-5 font-black text-emerald-600">
                        Rp {{ number_format($sewa->total, 0, ',', '.') }}
                    </td>
                    <td class="px-8 py-5 text-center">
                        <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest border 
                            @if($sewa->status === 'Dipinjam') bg-orange-100 text-orange-700 border-orange-200
                            @elseif($sewa->status === 'Pending') bg-blue-100 text-blue-700 border-blue-200
                            @else bg-emerald-100 text-emerald-700 border-emerald-200 @endif">
                            {{ $sewa->status }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <div class="flex justify-center gap-2">
                            @if($sewa->status === 'Pending')
                                <form action="{{ route('admin.peminjaman.update', $sewa->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="status" value="Dipinjam">
                                    <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-md border-0">Konfirmasi</button>
                                </form>
                            @elseif($sewa->status === 'Dipinjam')
                                <form action="{{ route('admin.peminjaman.update', $sewa->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="status" value="Selesai">
                                    <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-md border-0">Selesaikan</button>
                                </form>
                            @else
                                <span class="text-slate-300 italic text-[10px]">Tervalidasi</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>