<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;

class MateriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materi::create([
            'nama'              => 'Sistem Persamaan Linear',
            'mapel'             => 'Matematika',
            'kelas'             => '10',
            'keterangan'		=> 'Sistem persamaan linear adalah persamaan-persamaan linear yang dikorelasikan untuk membentuk suatu sistem. Sistem persamaannya bisa terdiri dari satu variabel, dua variabel atau lebih.',
            'file'              => NULL,
        ]);

        Materi::create([
            'nama'              => 'Persamaan Trigonometri',
            'mapel'             => 'Matematika',
            'kelas'             => '11',
            'keterangan'		=> 'Persamaan trigonometri adalah persamaan yang mengandung perbandingan antara sudut trigonometri dalam bentuk x. Penyelesaian persamaan ini dengan cara mencari seluruh nilai sudut-sudut x, sehingga persamaan tersebut bernilai benar untuk daerah asal tertentu.',
            'file'              => NULL,
        ]);

        Materi::create([
            'nama'              => 'Vektor',
            'mapel'             => 'Matematika',
            'kelas'             => '12',
            'keterangan'		=> 'Vektor merupakan sebuah besaran yang memiliki arah. Vektor digambarkan sebagai panah dengan yang menunjukan arah vektor dan panjang garisnya disebut besar vektor.',
            'file'              => NULL,
        ]);

        Materi::create([
            'nama'              => 'Laporan Hasil Observasi',
            'mapel'             => 'Bahasa Indonesia',
            'kelas'             => '10',
            'keterangan'		=> 'Teks hasil observasi adalah tulisan yang berkaitan dengan berbagai macam proses biologis dan psikologis dari suatu fenomena yang diamati. Teks hasil observasi adalah teks yang menyajikan informasi hasil analisis yang telah tersistematis berdasarkan sudut pandang keilmuan.',
            'file'              => NULL,
        ]);

        Materi::create([
            'nama'              => 'Teks cerita pendek',
            'mapel'             => 'Bahasa Indonesia',
            'kelas'             => '11',
            'keterangan'		=> 'Cerita pendek merupakan salah satu teks fiksi. Cerpen adalah cerita narasi fiktif yang relatif pendek sehingga dapat selesai dibaca dalam sekali duduk. Dalam cerita pendek dikisahkan sepenggal kehidupan tokoh yang penuh pertikaian, peristiwa yang mengharukan atau menyenangkan, dan mengandung kesan yang tidak mudah dilupakan.',
            'file'              => NULL,
        ]);

        Materi::create([
            'nama'              => 'Teks cerita pendek',
            'mapel'             => 'Bahasa Indonesia',
            'kelas'             => '12',
            'keterangan'		=> 'Surat lamaran pekerjaan adalah surat yang berisi permohonan untuk bekerja di suatu lembaga. Pada umumnya surat ini memiliki bagian-bagian yang berisi identitas diri, jasa yang dapat diberikan, pendidikan, kecakapan/keahlian, serta pengalaman.',
            'file'              => NULL,
        ]);
    }
}
