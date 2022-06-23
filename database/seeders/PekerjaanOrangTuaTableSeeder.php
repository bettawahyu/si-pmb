<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PekerjaanOrangTuaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pekerjaan_orang_tua')->delete();
        
        \DB::table('pekerjaan_orang_tua')->insert(array (
            0 => 
            array (
                'id' => 1,
            'jenis_pekerjaan' => 'Aparatur Sipil Negara (ASN)',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:36:29',
                'updated_at' => '2022-05-25 03:36:29',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'jenis_pekerjaan' => 'Petani',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:36:34',
                'updated_at' => '2022-05-25 03:36:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'jenis_pekerjaan' => 'Wiraswasta',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-05-25 03:36:40',
                'updated_at' => '2022-05-25 03:36:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}