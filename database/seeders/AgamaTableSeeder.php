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
                'created_at' => '2023-04-05 11:16:31',
                'updated_at' => '2023-04-05 11:16:31',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama_agama' => 'Kristen Protestan',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:16:40',
                'updated_at' => '2023-04-05 11:16:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nama_agama' => 'Kristen Katolik',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:16:52',
                'updated_at' => '2023-04-05 11:16:52',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nama_agama' => 'Hindu',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:16:57',
                'updated_at' => '2023-04-05 11:16:57',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nama_agama' => 'Budha',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:17:06',
                'updated_at' => '2023-04-05 11:17:06',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nama_agama' => 'Konghucu',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:17:12',
                'updated_at' => '2023-04-05 11:17:12',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nama_agama' => 'Aliran Kepercayaan',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:17:23',
                'updated_at' => '2023-04-05 11:17:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}