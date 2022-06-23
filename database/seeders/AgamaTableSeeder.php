<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgamaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('agama')->delete();
        
        \DB::table('agama')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_agama' => 'Islam',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:35:24',
                'updated_at' => '2022-05-25 03:35:24',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama_agama' => 'Kristen Protestan',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:35:35',
                'updated_at' => '2022-05-25 03:35:35',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}