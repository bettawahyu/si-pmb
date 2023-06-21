<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsRolesPermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins_roles_permission')->delete();
        
        \DB::table('admins_roles_permission')->insert(array (
            0 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'permission' => 'diterima_deny',
            ),
            1 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'permission' => 'ditolak_deny',
            ),
            2 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'permission' => 'sekolah_deny',
            ),
            3 => 
            array (
                'id' => 11,
                'role_id' => 2,
                'permission' => 'pendaftar_allow',
            ),
            4 => 
            array (
                'id' => 12,
                'role_id' => 2,
                'permission' => 'diterima_allow',
            ),
            5 => 
            array (
                'id' => 13,
                'role_id' => 2,
                'permission' => 'ditolak_allow',
            ),
            6 => 
            array (
                'id' => 14,
                'role_id' => 2,
                'permission' => 'sekolah_deny',
            ),
            7 => 
            array (
                'id' => 15,
                'role_id' => 2,
                'permission' => 'agama_deny',
            ),
            8 => 
            array (
                'id' => 16,
                'role_id' => 2,
                'permission' => 'jenis_kelamin_deny',
            ),
            9 => 
            array (
                'id' => 17,
                'role_id' => 2,
                'permission' => 'kelas_deny',
            ),
            10 => 
            array (
                'id' => 18,
                'role_id' => 2,
                'permission' => 'pekerjaan_orang_tua_deny',
            ),
            11 => 
            array (
                'id' => 19,
                'role_id' => 2,
                'permission' => 'tahun_ajaran_deny',
            ),
            12 => 
            array (
                'id' => 20,
                'role_id' => 2,
                'permission' => 'unggah_dokumen_deny',
            ),
            13 => 
            array (
                'id' => 21,
                'role_id' => 3,
                'permission' => 'menu_deny',
            ),
            14 => 
            array (
                'id' => 22,
                'role_id' => 3,
                'permission' => 'frontpage_deny',
            ),
            15 => 
            array (
                'id' => 23,
                'role_id' => 3,
                'permission' => 'footer_deny',
            ),
            16 => 
            array (
                'id' => 24,
                'role_id' => 3,
                'permission' => 'pendaftar_edit',
            ),
            17 => 
            array (
                'id' => 31,
                'role_id' => 3,
                'permission' => 'agama_deny',
            ),
            18 => 
            array (
                'id' => 32,
                'role_id' => 3,
                'permission' => 'jenis_kelamin_deny',
            ),
            19 => 
            array (
                'id' => 33,
                'role_id' => 3,
                'permission' => 'kelas_deny',
            ),
            20 => 
            array (
                'id' => 34,
                'role_id' => 3,
                'permission' => 'pekerjaan_orang_tua_deny',
            ),
            21 => 
            array (
                'id' => 35,
                'role_id' => 3,
                'permission' => 'tahun_ajaran_deny',
            ),
            22 => 
            array (
                'id' => 36,
                'role_id' => 3,
                'permission' => 'unggah_dokumen_deny',
            ),
        ));
        
        
    }
}