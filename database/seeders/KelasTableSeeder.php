<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kelas')->delete();
        
        \DB::table('kelas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_kelas' => 'TK-A',
                'kapasitas' => 30,
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:36:04',
                'updated_at' => '2022-05-25 03:36:04',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama_kelas' => 'TK-B',
                'kapasitas' => 30,
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:36:12',
                'updated_at' => '2022-05-25 03:36:12',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}