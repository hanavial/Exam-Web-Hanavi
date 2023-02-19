<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class FasilitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fasilitas::create([
            'nama'              => 'Peralatan Olahraga',
            'kategori'          => 'Sarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Komputer',
            'kategori'          => 'Sarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Buku Pembelajaran',
            'kategori'          => 'Sarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Alat Laboraturium Kimia',
            'kategori'          => 'Sarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Lapangan Olahraga',
            'kategori'          => 'Prasarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Gedung Sekolah',
            'kategori'          => 'Prasarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Ruang Kelas',
            'kategori'          => 'Prasarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Musholla',
            'kategori'          => 'Prasarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Laboraturium Komputer',
            'kategori'          => 'Prasarana',
        ]);

        Fasilitas::create([
            'nama'              => 'Laboraturium Kimia',
            'kategori'          => 'Prasarana',
        ]);
    }
}
