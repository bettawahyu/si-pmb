<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins_roles')->delete();
        
        \DB::table('admins_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Developer',
                'created_at' => '2022-05-25 03:32:05',
                'updated_at' => '2022-05-25 03:32:05',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Operator',
                'created_at' => '2022-05-25 03:32:05',
                'updated_at' => '2022-07-27 10:53:31',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Pendaftar',
                'created_at' => '2022-07-27 10:53:05',
                'updated_at' => '2022-07-27 10:53:42',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}