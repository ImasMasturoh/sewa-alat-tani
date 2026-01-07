<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-1">
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">Inventaris Alat Tani</h2>
        <button type="button" onclick="prepareTambah()"
                class="w-full sm:w-auto bg-emerald-600 text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all flex items-center justify-center gap-2 border-0">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Inventaris
        </button>
    </div>

    <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
        
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50 border-b border-slate-100 text-[10px] font-black uppercase text-slate-400 tracking-[0.2em]">
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
                        <td class="px-10 py-6">
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

        <div class="md:hidden divide-y divide-slate-100">
            @foreach($alat as $item)
            <div class="p-5 space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="text-xl bg-slate-50 w-10 h-10 flex items-center justify-center rounded-xl border border-slate-100">
                            {{ $item->emoji }}
                        </span>
                        <div>
                            <p class="font-bold text-slate-900 leading-tight">{{ $item->nama }}</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">{{ $item->stok }} Unit</p>
                        </div>
                    </div>
                    <p class="font-black text-emerald-600 text-sm">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                </div>

                <div class="flex gap-2">
                    <button type="button" onclick="prepareEdit(this)"
                            data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                            data-harga="{{ $item->harga }}" data-stok="{{ $item->stok }}"
                            data-emoji="{{ $item->emoji }}" data-kategori="{{ $item->kategori_id }}"
                            class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl border border-blue-100 text-blue-500 text-[10px] font-black uppercase tracking-widest bg-white transition-all">
                        <i data-lucide="edit-3" class="w-3.5 h-3.5"></i> Edit
                    </button>
                    <button onclick="konfirmasiHapus('{{ $item->id }}', '{{ $item->nama }}')" 
                            class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl border border-red-100 text-red-500 text-[10px] font-black uppercase tracking-widest bg-white transition-all">
                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Hapus
                    </button>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>