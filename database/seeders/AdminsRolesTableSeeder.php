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
                'title' => 'User',
                'created_at' => '2022-05-25 03:32:05',
                'updated_at' => '2022-05-25 03:32:05',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}