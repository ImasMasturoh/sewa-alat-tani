@extends('layouts.app')

@section('title', 'TaniSewa - Dashboard Admin')

@section('content')
<div class="space-y-4 animate-fade-in">
    
    <div id="tab-dashboard" class="tab-content space-y-8 active">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Halo, Admin Desa!</h2>
            <p class="text-slate-500 font-medium text-sm">Berikut adalah ringkasan performa TaniSewa hari ini.</p>
        </div>
        @include('admin.partials.dashboard')
    </div>

    <div id="tab-data-alat" class="tab-content hidden space-y-6">
        @include('admin.partials.data-alat')
    </div>

    <div id="tab-data-pinjam" class="tab-content hidden space-y-6">
        @include('admin.partials.data-pinjam')
    </div>
</div>
@endsection

@push('scripts')
<script>
    /**
     * FUNGSI PINDAH TAB
     * Memastikan konten muncul dan sidebar berubah warna
     */
    function pindahTab(namaTab) {
        // Sembunyikan semua tab
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('active');
        });

        // Tampilkan tab yang dipilih
        const target = document.getElementById('tab-' + namaTab);
        if (target) {
            target.classList.remove('hidden');
            target.classList.add('active');
        }

        // Reset semua tombol navigasi di sidebar
        document.querySelectorAll('.nav-item').forEach(btn => {
            btn.classList.remove('bg-emerald-50', 'text-emerald-600', 'shadow-sm', 'border', 'border-emerald-100');
            btn.classList.add('text-slate-400');
        });

        // Cari tombol yang diklik berdasarkan teks atau logika sidebar
        // Catatan: Karena sidebar menggunakan tombol onclick, 
        // pastikan tombol di sidebar memiliki ID nav-dashboard, nav-data-alat, dst.
        const btnAktif = document.getElementById('nav-' + namaTab);
        if (btnAktif) {
            btnAktif.classList.add('bg-emerald-50', 'text-emerald-600', 'shadow-sm', 'border', 'border-emerald-100');
            btnAktif.classList.remove('text-slate-400');
        }

        // Tutup sidebar jika di mobile
        if (window.innerWidth < 1024 && window.closeSidebar) {
            window.closeSidebar();
        }
    }

    /**
     * LOGIKA MODAL (Sinkron dengan Layout Utama)
     */
    function prepareTambah() {
        const title = document.getElementById('modalTitle'); // ID dari revisi modal sebelumnya
        const form = document.getElementById('formAlat'); // ID dari revisi modal sebelumnya
        const method = document.getElementById('methodField');

        if (form) {
            title.innerText = 'Tambah Inventaris Baru';
            form.action = "{{ route('admin.alat.simpan') }}";
            method.innerHTML = '';
            form.reset();
            openModal('modalAlat'); // Memanggil fungsi global di app.blade.php
        }
    }

    function prepareEdit(btn) {
        const title = document.getElementById('modalTitle');
        const form = document.getElementById('formAlat');
        const method = document.getElementById('methodField');
        
        title.innerText = 'Edit Inventaris Alat';
        form.action = `/admin/alat/${btn.dataset.id}`;
        method.innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('inputNama').value = btn.dataset.nama;
        document.getElementById('inputHarga').value = btn.dataset.harga;
        document.getElementById('inputStok').value = btn.dataset.stok;
        document.getElementById('inputEmoji').value = btn.dataset.emoji;
        document.getElementById('inputKategori').value = btn.dataset.kategori;
        
        openModal('modalAlat');
    }

    function konfirmasiHapus(id, nama) {
        if (confirm(`Apakah Anda yakin ingin menghapus alat: ${nama}?`)) {
            document.getElementById(`form-hapus-${id}`).submit();
        }
    }

    // Set tab default saat pertama dimuat
    document.addEventListener('DOMContentLoaded', () => {
        pindahTab('dashboard');
    });
</script>
@endpush