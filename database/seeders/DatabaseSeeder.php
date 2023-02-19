<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(GuruTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(MateriTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(FasilitasTableSeeder::class);
        $this->call(InformasiTableSeeder::class);
    }
}
