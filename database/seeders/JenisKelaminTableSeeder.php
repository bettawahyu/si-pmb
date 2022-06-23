<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisKelaminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_kelamin')->delete();
        
        \DB::table('jenis_kelamin')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jenis_kelamin' => 'Laki-laki',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:35:44',
                'updated_at' => '2022-05-25 03:35:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'jenis_kelamin' => 'Perempuan',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:35:50',
                'updated_at' => '2022-05-25 03:35:50',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}