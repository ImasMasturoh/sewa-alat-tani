@extends('layouts.app')
@section('content')
    <div id="tab-dashboard" class="tab-content space-y-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight">Halo, Warga Desa Karangrejo!</h2>
                <p class="text-slate-500 font-medium text-sm">Selamat datang di portal TaniSewa terbuka untuk warga desa Karangrejo.</p>
            </div>
            
            <div class="flex gap-3">
                <div class="bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-3">
                    <div class="bg-emerald-50 p-2.5 rounded-xl text-emerald-500">
                        <i data-lucide="award" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Sewa Musim Ini</p>
                        <p class="text-xl font-black text-slate-900 leading-none">{{ $peminjaman->count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-3">
                    <div class="bg-orange-50 p-2.5 rounded-xl text-orange-500">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Sewa Aktif</p>
                        <p class="text-xl font-black text-slate-900 leading-none">{{ $peminjaman->where('status', 'Dipinjam')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative bg-[#0f172a] rounded-[2rem] p-8 md:p-10 overflow-hidden shadow-2xl">
            <div class="relative z-10 max-w-xl">
                <span class="inline-block bg-[#10b981]/20 text-[#10b981] px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-widest mb-4 border border-[#10b981]/20">Portal Terbuka</span>
                <h3 class="text-3xl md:text-4xl font-black text-white leading-tight mb-4">Pinjam Alat Tani<br><span class="text-[#10b981]">Siapa Saja Bisa</span></h3>
                <p class="text-slate-400 font-medium text-xs leading-relaxed mb-6 max-w-sm">Cukup masukkan Nama & RT lahan Anda, alat siap dipinjam dan diambil di gudang desa.</p>
                <button onclick="pindahTab('katalog')" class="bg-white text-slate-900 px-6 py-2.5 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-400 transition-all shadow-lg">Cari Alat Tani</button>
            </div>
            
            <div class="hidden lg:block absolute right-10 bottom-10 bg-white/5 backdrop-blur-md border border-white/10 p-5 rounded-3xl max-w-[240px]">
                <div class="flex items-start gap-3">
                    <div class="bg-emerald-500/20 p-1.5 rounded-lg text-emerald-400">
                        <i data-lucide="info" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <p class="text-white font-bold text-[11px] leading-relaxed">Prosedur Mudah & Transparan Bagi Warga</p>
                        <p class="text-[8px] font-black text-emerald-400 uppercase tracking-widest mt-2">Bumdes Karangrejo</p>
                    </div>
                </div>
            </div>
        </div>
        @include('warga.partials.aktivitas')
    </div>
    <div id="tab-katalog" class="tab-content hidden">@include('warga.partials.katalog')</div>
    <div id="tab-pinjaman" class="tab-content hidden">@include('warga.partials.pinjaman')</div>
    <div id="tab-riwayat" class="tab-content hidden">@include('warga.partials.riwayat')</div>
</div>
@endsection
@push('scripts')
<script>
    function pindahTab(namaTab) {
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
        });
        const targetTab = document.getElementById('tab-' + namaTab);
        if (targetTab) {
            targetTab.classList.remove('hidden');
        }
        document.querySelectorAll('.nav-item').forEach(btn => {
            btn.classList.remove('bg-emerald-50', 'text-emerald-600', 'shadow-sm', 'shadow-emerald-100/50');
            btn.classList.add('text-slate-400', 'hover:bg-slate-50');
        });
        const btnAktif = document.getElementById('nav-' + namaTab);
        if (btnAktif) {
            btnAktif.classList.add('bg-emerald-50', 'text-emerald-600', 'shadow-sm', 'shadow-emerald-100/50');
            btnAktif.classList.remove('text-slate-400', 'hover:bg-slate-50');
        }
    }
    document.addEventListener('DOMContentLoaded', () => {
        pindahTab('dashboard');
    });
</script>
@endpush