<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $alat = Alat::with('kategori')->get();
        $kategori = Kategori::all();
        $peminjaman = Peminjaman::with('alat')->orderBy('created_at', 'desc')->get();
        
        return view('admin.index', compact('alat', 'kategori', 'peminjaman'));
    }

    public function simpanAlat(Request $request)
    {
        $validated = $request->validate([
            'nama',
            'kategori_id',
            'harga',
            'stok',
            'emoji'
        ], [
            'nama.required' => 'Nama alat harus diisi',
            'kategori_id.required' => 'Kategori harus dipilih',
            'kategori_id.exists' => 'Kategori tidak ditemukan',
            'harga.required' => 'Harga harus diisi',
            'harga.min' => 'Harga tidak boleh negatif',
            'stok.required' => 'Stok harus diisi',
            'stok.min' => 'Stok tidak boleh negatif',
            'emoji.required' => 'Emoji harus diisi'
        ]);

        Alat::create($validated);

        return redirect()->route('admin.index')->with('sukses', 'Alat berhasil ditambahkan!');
    }

    public function updateAlat(Request $request, Alat $alat)
    {
        $validated = $request->validate([
            'nama' ,
            'kategori_id',
            'harga',
            'stok',
            'emoji'
        ], [
            'nama.required' => 'Nama alat harus diisi',
            'kategori_id.required' => 'Kategori harus dipilih',
            'kategori_id.exists' => 'Kategori tidak ditemukan',
            'harga.required' => 'Harga harus diisi',
            'harga.min' => 'Harga tidak boleh negatif',
            'stok.required' => 'Stok harus diisi',
            'stok.min' => 'Stok tidak boleh negatif',
            'emoji.required' => 'Emoji harus diisi'
        ]);

        $alat->update($validated);

        return redirect()->route('admin.index')->with('sukses', 'Alat berhasil diperbarui!');
    }

    public function hapusAlat(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('admin.index')->with('sukses', 'Alat berhasil dihapus!');
    }

    public function updateStatusPeminjaman(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Dipinjam,Selesai'
        ], [
            'status.required' => 'Status harus diisi',
            'status.in' => 'Status tidak valid'
        ]);

        $peminjaman->update($validated);

        return redirect()->route('admin.index')->with('sukses', 'Status peminjaman berhasil diperbarui!');
    }
}