<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Dika Setyawan',
            'tempat_lahir'      => 'Malang',
            'tanggal_lahir'     => '2001-03-12',
            'jenis_kelamin'     => 'Laki-Laki',
            'kelas'             => '12',
            'alamat'			=> 'Jl. Malang',
            'nomor_telepon'		=> '082566884785',
            'email'             => 'dika@gmail.com',
            'password'	        => bcrypt('dika1234'),
            'remember_token'	=> NULL,
        ]);

        User::create([
            'name'              => 'Rina Maharani',
            'tempat_lahir'      => 'Blitar',
            'tanggal_lahir'     => '2002-08-27',
            'jenis_kelamin'     => 'Perempuan',
            'kelas'             => '11',
            'alamat'			=> 'Jl. Surabaya',
            'nomor_telepon'		=> '081457899633',
            'email'             => 'rina@gmail.com',
            'password'	        => bcrypt('rina1234'),
            'remember_token'	=> NULL,
        ]);

        User::create([
            'name'              => 'Kesya Indriani',
            'tempat_lahir'      => 'Tulungagung',
            'tanggal_lahir'     => '2003-12-07',
            'jenis_kelamin'     => 'Perempuan',
            'kelas'             => '10',
            'alamat'			=> 'Jl. Bondowoso',
            'nomor_telepon'		=> '085233417268',
            'email'             => 'kesya@gmail.com',
            'password'	        => bcrypt('kesya123'),
            'remember_token'	=> NULL,
        ]);
    }
}
