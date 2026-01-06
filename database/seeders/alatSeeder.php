<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alat;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        $alat = [
            [
                'nama' => 'Kubota G1000',
                'kategori_id' => 1,
                'harga' => 150000,
                'stok' => 3,
                'emoji' => '🚜'
            ],
            [
                'nama' => 'Kultivator Firman',
                'kategori_id' => 1,
                'harga' => 80000,
                'stok' => 5,
                'emoji' => '⛏️'
            ],
            [
                'nama' => 'Honda Alkon 3\'',
                'kategori_id' => 2,
                'harga' => 50000,
                'stok' => 10,
                'emoji' => '💧'
            ],
            [
                'nama' => 'Sprinkler Set Pro',
                'kategori_id' => 2,
                'harga' => 25000,
                'stok' => 15,
                'emoji' => '💦'
            ],
            [
                'nama' => 'Rice Transplanter',
                'kategori_id' => 3,
                'harga' => 200000,
                'stok' => 2,
                'emoji' => '🌱'
            ],
            [
                'nama' => 'Yanmar Combine',
                'kategori_id' => 5,
                'harga' => 350000,
                'stok' => 2,
                'emoji' => '🌾'
            ]
        ];

        foreach ($alat as $dataAlat) {
            Alat::create($dataAlat);
        }
    }
}