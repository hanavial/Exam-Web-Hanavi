<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'nama'              => 'Pondok Ramadhan',
            'tanggal_event'     => '2023-04-07',
            'keterangan'		=> 'Kegiatan Pondok Ramadhan yang dilakukan secara rutin setiap tahun',
        ]);

        Event::create([
            'nama'              => 'Ujian Semester',
            'tanggal_event'     => '2023-06-05',
            'keterangan'		=> 'Ujian Akhir Semester sebelum pergantian tahun ajaran',
        ]);
    }
}
