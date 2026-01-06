<div id="modal-sewa" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
    <div class="bg-white rounded-[2rem] w-full max-w-md overflow-hidden shadow-2xl animate-fade-in">
        <div class="bg-slate-900 p-6 text-white flex justify-between items-start">
            <div class="flex gap-4">
                <div id="ms-emoji" class="text-4xl bg-white/10 p-3 rounded-2xl ring-1 ring-white/20"></div>
                <div>
                    <h3 id="ms-nama" class="text-xl font-black leading-tight tracking-tight"></h3>
                    <p class="text-slate-400 text-[10px] uppercase tracking-widest font-black">Detail Peminjaman Alat</p>
                </div>
            </div>
            <button onclick="window.tutupModalSewa()" class="bg-white/20 p-2 rounded-full hover:bg-white/30 transition-all"><i data-lucide="x" class="w-4 h-4"></i></button>
        </div>
        
        <form action="{{ route('warga.peminjaman.simpan') }}" method="POST" class="p-6 space-y-5">
            @csrf
            <input type="hidden" name="alat_id" id="ms-id">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nama_peminjam" placeholder="Nama Lengkap" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                <input type="text" name="rt_peminjam" placeholder="Domisili RT" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-[9px] font-black text-slate-500 uppercase ml-1">Mulai Pakai</label>
                    <input type="date" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-bold outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                </div>
                <div class="space-y-1">
                    <label class="text-[9px] font-black text-slate-500 uppercase ml-1">Durasi (Hari)</label>
                    <div class="flex items-center bg-slate-50 border border-slate-200 rounded-xl px-2">
                        <button type="button" onclick="window.ubahDurasi(-1)" class="w-8 h-8 font-black text-slate-400 hover:text-emerald-600 transition-colors">-</button>
                        <input type="number" name="durasi" id="ms-durasi" value="1" readonly class="w-full bg-transparent text-center font-black text-sm outline-none">
                        <button type="button" onclick="window.ubahDurasi(1)" class="w-8 h-8 font-black text-slate-400 hover:text-emerald-600 transition-colors">+</button>
                    </div>
                </div>
            </div>
            <div class="bg-emerald-50 rounded-2xl p-4 border border-emerald-100">
                <div class="flex justify-between items-center text-[9px] font-black uppercase text-emerald-800 mb-2">
                    <span>Biaya / Hari</span>
                    <span class="bg-white/50 px-2 py-0.5 rounded-lg border border-emerald-100">Rp <span id="ms-harga-label">0</span></span>
                </div>
                <div class="h-px bg-emerald-200/50 my-2"></div>
                <div class="flex justify-between items-center"><span class="text-emerald-900 font-black text-xs uppercase">Total Tagihan</span><span class="text-xl font-black text-emerald-700">Rp <span id="ms-total">0</span></span></div>
            </div>
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-start gap-3">
                <i data-lucide="info" class="w-4 h-4 text-blue-500 shrink-0 mt-0.5"></i>
                <div class="space-y-1">
                    <p class="text-[9px] font-black text-blue-600 uppercase tracking-widest">Penting untuk diketahui:</p>
                    <ul class="text-[10px] text-blue-800/80 font-bold leading-relaxed list-disc list-inside">
                        <li>Bawa KTP asli saat pengambilan alat di gudang desa.</li>
                        <li>Pembayaran dilakukan tunai saat alat diambil.</li>
                    </ul>
                </div>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="window.tutupModalSewa()" class="flex-1 py-3 text-[10px] font-black uppercase text-slate-400 border border-slate-100 rounded-xl hover:bg-slate-50 transition-all">Batal</button>
                <button type="submit" class="flex-[2] py-3 text-[10px] font-black uppercase bg-emerald-600 text-white rounded-xl shadow-lg hover:bg-emerald-700 transition-all">Konfirmasi Sewa</button>
            </div>
        </form>
    </div>
</div>

<script>
    let hargaPerHariGlobal = 0;
    window.bukaModalSewa = function(btn) {
        hargaPerHariGlobal = parseInt(btn.getAttribute('data-harga'));
        document.getElementById('ms-id').value = btn.getAttribute('data-id');
        document.getElementById('ms-nama').innerText = btn.getAttribute('data-nama');
        document.getElementById('ms-emoji').innerText = btn.getAttribute('data-emoji');
        document.getElementById('ms-harga-label').innerText = new Intl.NumberFormat('id-ID').format(hargaPerHariGlobal);
        document.getElementById('ms-durasi').value = 1;
        hitungTotalSewa();
        document.getElementById('modal-sewa').classList.remove('hidden');
        if (typeof lucide !== 'undefined') lucide.createIcons();
    };
    window.tutupModalSewa = function() { document.getElementById('modal-sewa').classList.add('hidden'); };
    window.ubahDurasi = function(step) {
        const input = document.getElementById('ms-durasi');
        input.value = Math.max(1, (parseInt(input.value) || 1) + step);
        hitungTotalSewa();
    };
    function hitungTotalSewa() {
        const total = hargaPerHariGlobal * (parseInt(document.getElementById('ms-durasi').value) || 1);
        document.getElementById('ms-total').innerText = new Intl.NumberFormat('id-ID').format(total);
    }
</script>