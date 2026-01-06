<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $peminjaman = [
            [
                'nama_peminjam' => 'Pak Mulyo',
                'rt_peminjam' => '04',
                'alat_id' => 1,
                'tanggal_pinjam' => '2026-01-05',
                'durasi' => 2,
                'total' => 300000,
                'status' => 'Selesai'
            ],
            [
                'nama_peminjam' => 'Bu Siti',
                'rt_peminjam' => '01',
                'alat_id' => 3,
                'tanggal_pinjam' => '2026-01-02',
                'durasi' => 1,
                'total' => 50000,
                'status' => 'Dipinjam'
            ]
        ];

        foreach ($peminjaman as $dataPeminjaman) {
            Peminjaman::create($dataPeminjaman);
        }
    }
}