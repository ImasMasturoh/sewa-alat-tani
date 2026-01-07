<div id="modal-crud" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
    <div class="bg-white rounded-[2.5rem] w-full max-w-lg overflow-hidden shadow-2xl animate-fade-in">
        <div class="bg-slate-900 p-8 text-white flex justify-between items-start">
            <div class="flex gap-4">
                <div class="bg-white/10 p-3 rounded-2xl ring-1 ring-white/20">
                    <i data-lucide="package" class="w-6 h-6"></i>
                </div>
                <div>
                    <h5 class="text-xl font-black tracking-tight" id="modal-title">Tambah Inventaris</h5>
                    <p class="text-slate-400 text-[10px] uppercase tracking-widest font-bold">Detail Alat Desa</p>
                </div>
            </div>
            <button type="button" onclick="tutupModal()" class="bg-white/10 p-2 rounded-full hover:bg-white/20 transition-all border-0 text-white">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>

        <div class="p-8">
            <form action="{{ route('admin.alat.simpan') }}" method="POST" id="form-alat">
                @csrf
                <div id="method-field"></div>
                
                <div class="space-y-5">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Nama Peralatan</label>
                        <input type="text" name="nama" id="input-nama" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Kategori</label>
                            <select name="kategori_id" id="input-kategori" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold outline-none">
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $cat->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-1.5 text-center">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Emoji</label>
                            <input type="text" name="emoji" id="input-emoji" placeholder="🚜" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-center text-xl outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Harga / Hari</label>
                            <input type="number" name="harga" id="input-harga" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Stok Unit</label>
                            <input type="number" name="stok" id="input-stok" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-4 mt-8">
                    <button type="button" onclick="tutupModal()" class="col-span-2 py-4 text-[11px] font-black uppercase bg-slate-100 text-slate-500 rounded-2xl border-0 hover:bg-slate-200 transition-all">Batal</button>
                    <button type="submit" class="col-span-3 py-4 text-[11px] font-black uppercase bg-emerald-600 text-white rounded-2xl shadow-lg hover:bg-emerald-700 transition-all border-0">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>