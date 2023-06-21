<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SekolahTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sekolah')->delete();
        
        \DB::table('sekolah')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_sekolah' => 'TK Tunas Bahagia',
                'alamat_sekolah' => 'Jl. Raya Mojokumpul No. 90',
                'kel_desa' => 'Mojokumpul',
                'kecamatan' => 'Kemlagi',
                'kab_kota' => 'Mojokerto',
                'provinsi' => 'Jawa Timur',
                'akreditasi' => 'A',
                'tahun_akre' => 2021,
                'telp_sekolah' => '0321-551122',
                'email_sekolah' => 'tktunasbahagiamjk@gmail.com',
                'website_sekolah' => 'https://www.tktunasbahagiamjk.sch.id',
                'logo_sekolah' => 'lotus-with-hands-gf46915943_640.png',
                'created_at' => '2022-07-27 10:58:37',
                'updated_at' => '2023-04-05 13:16:41',
                'deleted_at' => NULL,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}