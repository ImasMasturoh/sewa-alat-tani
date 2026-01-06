<div class="space-y-4 animate-fade-in">
    <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="relative w-full md:w-80 group">
            <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
            <input type="text" id="pencarian-alat" onkeyup="filterAlat()" placeholder="Cari nama alat..." 
                   class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-medium shadow-sm transition-all">
        </div>

        <!-- Navigasi Kategori -->
        <div class="flex gap-2 overflow-x-auto w-full md:w-auto pb-1 scrollbar-hide" id="kategori-container">
            <button onclick="setKategori('Semua', this)" 
                    class="btn-kat active-kat px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border bg-emerald-600 text-white border-emerald-600 shadow-lg shrink-0 transition-all">
                Semua
            </button>
            @foreach($kategori as $kat)
                <button onclick="setKategori('{{ $kat->nama }}', this)" 
                        class="btn-kat bg-white text-slate-500 border-slate-200 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border transition-all shrink-0 hover:bg-slate-50">
                    {{ $kat->nama }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Katalog -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="katalog-grid">
        @foreach($alat as $item)
            <div class="item-alat bg-white rounded-[2rem] border border-slate-200 p-6 flex flex-col group transition-all" 
                 data-nama="{{ strtolower($item->nama) }}" 
                 data-kategori="{{ $item->kategori->nama }}">
                
                <div class="h-40 bg-slate-50 rounded-3xl mb-4 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform shadow-inner">
                    {{ $item->emoji }}
                </div>
                
                <p class="text-[10px] font-black text-emerald-600 uppercase mb-1 tracking-widest">{{ $item->kategori->nama }}</p>
                <h3 class="text-xl font-extrabold text-slate-900 mb-4 tracking-tight">{{ $item->nama }}</h3>
                
                <div class="mt-auto pt-4 border-t border-slate-50 flex justify-between items-end mb-6">
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase mb-1 leading-none">Biaya / Hari</p>
                        <p class="text-lg font-black text-slate-900 leading-none">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold">Stok: {{ $item->stok }}</p>
                </div>

                <button type="button" onclick="window.bukaModalSewa(this)" 
                        data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-emoji="{{ $item->emoji }}" data-harga="{{ $item->harga }}"
                        class="w-full bg-slate-900 text-white py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-xl active:scale-95">
                    sewa Sekarang
                </button>
            </div>
        @endforeach
    </div>
</div>

<script>
    window.currentKat = 'Semua';

    window.setKategori = function(kat, btn) {
        window.currentKat = kat;

        document.querySelectorAll('.btn-kat').forEach(b => {
            b.classList.remove('bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-lg');
            b.classList.add('bg-white', 'text-slate-500', 'border-slate-200');
        });

        btn.classList.add('bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-lg');
        btn.classList.remove('bg-white', 'text-slate-500', 'border-slate-200');

 
        window.filterAlat();
    };

    window.filterAlat = function() {
        const cari = document.getElementById('pencarian-alat').value.toLowerCase();
        const items = document.querySelectorAll('.item-alat');

        items.forEach(item => {
            const nama = item.getAttribute('data-nama');
            const kat = item.getAttribute('data-kategori');
            
            const matchSearch = nama.includes(cari);
            const matchKat = (window.currentKat === 'Semua' || kat === window.currentKat);

            if (matchSearch && matchKat) {
                item.style.display = 'flex';
                item.classList.add('animate-fade-in');
            } else {
                item.style.display = 'none';
                item.classList.remove('animate-fade-in');
            }
        });
    };
</script>