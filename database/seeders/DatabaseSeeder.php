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
        $this->call(AdminsTableSeeder::class);
        $this->call(AdminsRolesTableSeeder::class);
        $this->call(AgamaTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(TahunAjaranTableSeeder::class);
        $this->call(JenisKelaminTableSeeder::class);
        $this->call(PekerjaanOrangTuaTableSeeder::class);
    }
}
