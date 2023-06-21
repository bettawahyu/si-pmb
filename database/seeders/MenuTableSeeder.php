<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu')->delete();
        
        \DB::table('menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_menu' => 'Beranda',
                'slug' => 'home',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:19:17',
                'deleted_at' => NULL,
                'updated_at' => '2022-07-27 14:16:31',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_menu' => 'Program Studi',
                'slug' => 'program-studi',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:24:11',
                'deleted_at' => NULL,
                'updated_at' => '2022-07-27 14:16:40',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_menu' => 'Kenapa Pilih Kami ?',
                'slug' => 'kenapa-kami',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:24:50',
                'deleted_at' => NULL,
                'updated_at' => '2023-04-05 11:29:52',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_menu' => 'Hubungi Kami',
                'slug' => 'hubungi',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 12:55:29',
                'deleted_at' => NULL,
                'updated_at' => '2022-07-27 14:16:57',
            ),
        ));
        
        
    }
}