<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $alat = Alat::with('kategori')->get();
        $kategori = Kategori::all();
        $peminjaman = Peminjaman::with('alat')->orderBy('created_at', 'desc')->get();
        
        return view('warga.index', compact('alat', 'kategori', 'peminjaman'));
    }

    public function simpanPeminjaman(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam',
            'rt_peminjam',
            'alat_id',
            'tanggal_pinjam',
            'durasi'
        ], [
            'nama_peminjam.required' => 'Nama peminjam harus diisi',
            'rt_peminjam.required' => 'RT peminjam harus diisi',
            'alat_id.required' => 'Alat harus dipilih',
            'alat_id.exists' => 'Alat tidak ditemukan',
            'tanggal_pinjam.required' => 'Tanggal pinjam harus diisi',
            'tanggal_pinjam.date' => 'Format tanggal tidak valid',
            'durasi.required' => 'Durasi harus diisi',
            'durasi.min' => 'Durasi minimal 1 hari'
        ]);

        $alat = Alat::findOrFail($validated['alat_id']);
        $validated['total'] = $alat->harga * $validated['durasi'];
        $validated['status'] = 'Pending';

        Peminjaman::create($validated);

        return redirect()->route('warga.index')->with('sukses', 'Peminjaman berhasil diajukan!');
    }
}