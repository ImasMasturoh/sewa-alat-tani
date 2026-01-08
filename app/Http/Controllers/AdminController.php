<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nama'        => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'emoji'       => 'required|string|max:10',
        ], [
            'nama.required'        => 'Nama alat harus diisi',
            'kategori_id.required' => 'Kategori harus dipilih',
            'kategori_id.exists'   => 'Kategori tidak ditemukan',
            'harga.required'       => 'Harga harus diisi',
            'harga.min'            => 'Harga tidak boleh negatif',
            'stok.required'        => 'Stok harus diisi',
            'stok.min'             => 'Stok tidak boleh negatif',
            'emoji.required'       => 'Emoji harus diisi',
        ]);

        Alat::create($validated);

        return redirect()
            ->route('admin.index')
            ->with('sukses', 'Alat berhasil ditambahkan!');
    }

    public function updateAlat(Request $request, Alat $alat)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'emoji'       => 'required|string|max:10',
        ]);

        $alat->update($validated);

        return redirect()
            ->route('admin.index')
            ->with('sukses', 'Alat berhasil diperbarui!');
    }

    public function hapusAlat(Alat $alat)
    {
        $alat->delete();

        return redirect()
            ->route('admin.index')
            ->with('sukses', 'Alat berhasil dihapus!');
    }

    public function updateStatusPeminjaman(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Dipinjam,Selesai',
        ]);

        DB::transaction(function () use ($validated, $peminjaman) {
            $statusLama = $peminjaman->status;
            $statusBaru = $validated['status'];
            $alat = $peminjaman->alat;
            if ($statusLama === 'Pending' && $statusBaru === 'Dipinjam') {
                if ($alat->stok < 1) {
                    abort(400, 'Stok alat habis');
                }
                $alat->decrement('stok');
            }
            if ($statusLama === 'Dipinjam' && $statusBaru === 'Selesai') {
                $alat->increment('stok');
            }

            $peminjaman->update([
                'status' => $statusBaru
            ]);
        });

        return redirect()
            ->route('admin.index')
            ->with('sukses', 'Status peminjaman berhasil diperbarui!');
    }
}
