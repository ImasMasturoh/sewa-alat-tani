<div id="modalAlat" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

    <div class="relative bg-white w-full max-w-lg rounded-[2rem] shadow-2xl overflow-hidden transform transition-all">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
            <div>
                <h3 id="modalTitle" class="text-xl font-black text-slate-900 tracking-tight">Tambah Alat</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Lengkapi informasi inventaris</p>
            </div>
            <button onclick="closeModal()" class="p-2 rounded-xl hover:bg-slate-100 text-slate-400 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form id="formAlat" action="" method="POST" class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
            @csrf
            <div id="methodField"></div>

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4 sm:col-span-3">
                    <label class="block text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 px-1">Emoji</label>
                    <input type="text" name="emoji" id="inputEmoji" placeholder="🚜" required
                           class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-3 text-center text-2xl focus:border-emerald-500 focus:bg-white outline-none transition-all">
                </div>
                <div class="col-span-8 sm:col-span-9">
                    <label class="block text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 px-1">Nama Peralatan</label>
                    <input type="text" name="nama" id="inputNama" placeholder="Contoh: Traktor Mini" required
                           class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-3 font-bold text-slate-900 focus:border-emerald-500 focus:bg-white outline-none transition-all">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 px-1">Biaya Sewa (Rp)</label>
                    <input type="number" name="harga" id="inputHarga" placeholder="0" required
                           class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-3 font-bold text-slate-900 focus:border-emerald-500 focus:bg-white outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 px-1">Stok Unit</label>
                    <input type="number" name="stok" id="inputStok" placeholder="0" required
                           class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-3 font-bold text-slate-900 focus:border-emerald-500 focus:bg-white outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 px-1">Kategori</label>
                <select name="kategori_id" id="inputKategori" required
                        class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-3 font-bold text-slate-900 focus:border-emerald-500 focus:bg-white outline-none transition-all appearance-none">
                    @foreach($kategori as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4 flex flex-col sm:flex-row gap-3">
                <button type="submit" 
                        class="flex-1 bg-emerald-600 text-white py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all">
                    Simpan Data
                </button>
                <button type="button" onclick="closeModal()"
                        class="sm:hidden w-full py-4 text-slate-400 font-bold text-xs uppercase tracking-widest">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
