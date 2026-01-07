<div class="space-y-6">
    <div class="flex justify-between items-center px-1">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Inventaris Alat Tani</h2>
        <button type="button" onclick="prepareTambah()"
                class="bg-emerald-600 text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all flex items-center gap-2 border-0">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Inventaris
        </button>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50/50 border-b border-slate-50 text-[10px] font-black uppercase text-slate-400 tracking-[0.2em]">
                <tr>
                    <th class="px-10 py-6">Nama Alat</th>
                    <th class="px-10 py-6">Biaya Sewa</th>
                    <th class="px-10 py-6">Stok</th>
                    <th class="px-10 py-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($alat as $item)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-10 py-6 font-bold text-slate-900">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl bg-slate-50 w-12 h-12 flex items-center justify-center rounded-2xl group-hover:scale-110 transition-transform">
                                {{ $item->emoji }}
                            </span>
                            {{ $item->nama }}
                        </div>
                    </td>
                    <td class="px-10 py-6 font-black text-emerald-600">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="px-10 py-6 font-bold text-slate-600">{{ $item->stok }} Unit</td>
                    <td class="px-10 py-6 text-center">
                        <div class="flex justify-center gap-3">
                            <button type="button" onclick="prepareEdit(this)"
                                    data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                    data-harga="{{ $item->harga }}" data-stok="{{ $item->stok }}"
                                    data-emoji="{{ $item->emoji }}" data-kategori="{{ $item->kategori_id }}"
                                    class="p-2.5 rounded-xl border border-blue-100 text-blue-500 hover:bg-blue-50 transition-all bg-white">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                            <button onclick="konfirmasiHapus('{{ $item->id }}', '{{ $item->nama }}')" 
                                    class="p-2.5 rounded-xl border border-red-100 text-red-500 hover:bg-red-50 transition-all bg-white">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <form id="form-hapus-{{ $item->id }}" action="{{ route('admin.alat.hapus', $item->id) }}" method="POST" class="hidden">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>