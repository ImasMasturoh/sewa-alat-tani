@extends('layouts.app')

@section('title', 'TaniSewa - Dashboard Admin')

@section('content')
<div class="p-4 lg:p-8 space-y-4 animate-fade-in">
    <!-- TAB DASHBOARD -->
    <div id="tab-dashboard" class="tab-content space-y-8">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Halo, Admin Desa!</h2>
            <p class="text-slate-500 font-medium text-sm">Berikut adalah ringkasan performa TaniSewa hari ini.</p>
        </div>
        @include('admin.partials.dashboard')
    </div>

    <!-- TAB INVENTARIS -->
    <div id="tab-data-alat" class="tab-content hidden space-y-6">
        @include('admin.partials.data-alat')
    </div>

    <!-- TAB VERIFIKASI -->
    <div id="tab-data-pinjam" class="tab-content hidden space-y-6">
        @include('admin.partials.data-pinjam')
    </div>
</div>

<!-- MODAL CRUD -->
@include('admin.partials.modal-crud')
@endsection

@push('scripts')
<script>
    function pindahTab(namaTab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        const target = document.getElementById('tab-' + namaTab);
        if (target) target.classList.remove('hidden');

        document.querySelectorAll('.nav-item').forEach(btn => {
            btn.classList.remove('bg-emerald-50', 'text-emerald-600', 'shadow-sm', 'border', 'border-emerald-100');
            btn.classList.add('text-slate-400');
        });

        const btnAktif = document.getElementById('nav-' + namaTab);
        if (btnAktif) {
            btnAktif.classList.add('bg-emerald-50', 'text-emerald-600', 'shadow-sm', 'border', 'border-emerald-100');
            btnAktif.classList.remove('text-slate-400');
        }
    }


    function prepareTambah() {
        const modal = document.getElementById('modal-crud');
        const form = document.getElementById('form-alat');
        document.getElementById('modal-title').innerText = 'Tambah Inventaris Baru';
        document.getElementById('method-field').innerHTML = '';
        form.action = "{{ route('admin.alat.simpan') }}";
        form.reset();
        modal.classList.remove('hidden');
    }

    function prepareEdit(btn) {
        const modal = document.getElementById('modal-crud');
        const form = document.getElementById('form-alat');
        
        document.getElementById('modal-title').innerText = 'Edit Inventaris Alat';
        form.action = `/admin/alat/${btn.dataset.id}`;
        document.getElementById('method-field').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('input-nama').value = btn.dataset.nama;
        document.getElementById('input-harga').value = btn.dataset.harga;
        document.getElementById('input-stok').value = btn.dataset.stok;
        document.getElementById('input-emoji').value = btn.dataset.emoji;
        document.getElementById('input-kategori').value = btn.dataset.kategori;
        
        modal.classList.remove('hidden');
    }

    function tutupModal() {
        document.getElementById('modal-crud').classList.add('hidden');
    }

    function konfirmasiHapus(id, nama) {
        if (confirm(`Apakah Anda yakin ingin menghapus alat: ${nama}?`)) {
            document.getElementById(`form-hapus-${id}`).submit();
        }
    }

    document.addEventListener('DOMContentLoaded', () => pindahTab('dashboard'));
    window.onclick = function(event) {
        const modal = document.getElementById('modal-crud');
        if (event.target == modal) tutupModal();
    }
</script>
@endpush