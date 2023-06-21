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
        $this->call(AdminsRolesPermissionTableSeeder::class);
        $this->call(AgamaTableSeeder::class);
        $this->call(JenisKelaminTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(PekerjaanOrangTuaTableSeeder::class);
        $this->call(PendaftarTableSeeder::class);
        $this->call(SekolahTableSeeder::class);
        $this->call(TahunAjaranTableSeeder::class);
        $this->call(UnggahDokumenTableSeeder::class);
    }
}
