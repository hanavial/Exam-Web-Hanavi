<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;

class InformasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informasi::create([
            'judul'             => 'Pengumuman Rapat Wali Murid',
            'detail_info'		=> 'Pengumuman untuk rapat wali murid terkait pembagian rapot dan informasi lainnya',
            'foto'              => NULL,
        ]);

        Informasi::create([
            'judul'             => 'Seminar Bahaya Narkoba',
            'detail_info'		=> 'Seminar ini akan diselenggarakan disekolah untuk mengedukasi kepada siswa bahaya dari penggunaan narkoba',
            'foto'              => NULL,
        ]);

        Informasi::create([
            'judul'             => 'Lomba Karya Tulis Ilmiah Dinas Kabupaten',
            'detail_info'		=> 'Lomba ini akan diselenggarakan oleh Dinas Kabupaten. Pendaftaran dibuka mulai 2 Januari 2023',
            'foto'              => NULL,
        ]);
    }
}
