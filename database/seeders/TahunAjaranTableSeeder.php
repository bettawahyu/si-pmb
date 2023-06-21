<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TahunAjaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tahun_ajaran')->delete();
        
        \DB::table('tahun_ajaran')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tahun_ajaran' => '2021/2022',
                'status_aktif' => 'non-aktif',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:36:49',
                'updated_at' => '2022-05-25 06:50:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'tahun_ajaran' => '2022/2023',
                'status_aktif' => 'non-aktif',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:37:01',
                'updated_at' => '2023-04-05 11:29:07',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'tahun_ajaran' => '2023/2024',
                'status_aktif' => 'aktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 11:26:31',
                'updated_at' => '2023-04-05 11:26:31',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}