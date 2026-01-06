<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Pengolahan Tanah',
            'Irigasi & Pompa',
            'Penanaman',
            'Pemeliharaan',
            'Panen',
            'Pasca Panen'
        ];

        foreach ($kategori as $namaKategori) {
            Kategori::create([
                'nama' => $namaKategori
            ]);
        }
    }
}
