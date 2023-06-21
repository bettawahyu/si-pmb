<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnggahDokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('unggah_dokumen')->delete();
        
        \DB::table('unggah_dokumen')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_dokumen' => 'Kartu Keluarga',
                'status_aktif' => 'aktif',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:00:19',
                'updated_at' => '2023-06-21 13:26:15',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama_dokumen' => 'Akta Lahir',
                'status_aktif' => 'aktif',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:00:29',
                'updated_at' => '2023-06-21 13:26:08',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
            'nama_dokumen' => 'KTP Orang Tua (Ayah/Ibu)',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:00:51',
                'updated_at' => '2022-07-27 11:00:51',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nama_dokumen' => 'Ijazah',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:01:02',
                'updated_at' => '2023-06-21 13:24:03',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nama_dokumen' => 'SKL',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:01:11',
                'updated_at' => '2022-07-27 11:01:11',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nama_dokumen' => 'KIS',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2022-07-27 11:01:20',
                'updated_at' => '2022-07-27 11:01:20',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nama_dokumen' => 'KTP Anak',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-06-07 18:16:23',
                'updated_at' => '2023-06-07 18:16:23',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nama_dokumen' => 'Pas Photo',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-06-07 18:16:38',
                'updated_at' => '2023-06-07 18:16:38',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nama_dokumen' => 'Surat Keterangan Sehat',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-06-07 18:16:54',
                'updated_at' => '2023-06-07 18:16:54',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nama_dokumen' => 'KIP',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-06-07 18:17:07',
                'updated_at' => '2023-06-07 18:17:07',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nama_dokumen' => 'Sertifikat',
                'status_aktif' => 'nonaktif',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-06-07 18:17:16',
                'updated_at' => '2023-06-07 18:17:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}