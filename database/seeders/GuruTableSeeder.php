<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            'name'              => 'Bambang Santoso',
            'tempat_lahir'      => 'Lumajang',
            'tanggal_lahir'     => '1976-05-09',
            'jenis_kelamin'     => 'Laki-Laki',
            'guru_mapel'        => 'Matematika',
            'alamat'			=> 'Jl. Kawi',
            'nomor_telepon'		=> '085233651889',
            'email'             => 'bambang@gmail.com',
            'password'	        => bcrypt('bambang123'),
            'remember_token'	=> NULL,
        ]);

        Guru::create([
            'name'              => 'Rahma Widiyanti',
            'tempat_lahir'      => 'Malang',
            'tanggal_lahir'     => '1982-11-20',
            'jenis_kelamin'     => 'Perempuan',
            'guru_mapel'        => 'Bahasa Indonesia',
            'alamat'			=> 'Jl. Semeru',
            'nomor_telepon'		=> '081744563221',
            'email'             => 'rahma@gmail.com',
            'password'	        => bcrypt('rahma123'),
            'remember_token'	=> NULL,
        ]);
    }
}
