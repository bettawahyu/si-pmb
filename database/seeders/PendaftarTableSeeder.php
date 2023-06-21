<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendaftarTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pendaftar')->delete();
        
        \DB::table('pendaftar')->insert(array (
            0 => 
            array (
                'id' => 1,
                'no_pendaftaran' => 'PSB-23001',
                'nama_siswa' => 'Bayu Ramadhani',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2017-04-05',
                'agama' => 1,
                'jenis_kelamin' => 1,
                'alamat' => 'Jl. Sultan Hamid  No. 80',
                'kel_desa' => 'Wandanpuro',
                'kecamatan' => 'Bululawang',
                'asal_sekolah' => 'TK ReaReo',
                'nama_ayah' => 'Hadi Kusumo',
                'pekerjaan_ayah' => 1,
                'nama_ibu' => 'Sulastri',
                'pekerjaan_ibu' => 3,
                'nomor_telp' => '0879222685565',
                'email' => NULL,
                'kelas' => 1,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'foto_1.png',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => 1,
                'created_at' => '2023-04-05 11:25:40',
                'updated_at' => '2023-04-12 16:08:04',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'no_pendaftaran' => 'PSB-23002',
                'nama_siswa' => 'Candra Kirana',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2017-04-20',
                'agama' => 1,
                'jenis_kelamin' => 2,
                'alamat' => 'Jl. Cut Nyak Dien No. 17',
                'kel_desa' => 'Tlogowaru',
                'kecamatan' => 'Kedungkandang',
                'asal_sekolah' => 'TK Riwa Riwi',
                'nama_ayah' => 'Handoko',
                'pekerjaan_ayah' => 2,
                'nama_ibu' => 'Sumaiyah',
                'pekerjaan_ibu' => 3,
                'nomor_telp' => '081366000265',
                'email' => NULL,
                'kelas' => 1,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'fotoce.png',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 14:42:53',
                'updated_at' => '2023-04-05 14:42:53',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'no_pendaftaran' => 'PSB-23003',
                'nama_siswa' => 'Liga Indonesia',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2017-08-23',
                'agama' => 1,
                'jenis_kelamin' => 1,
                'alamat' => 'Jl. Tangkuban Perahu No. 17 RT.009 RW.002',
                'kel_desa' => 'Sumbersari',
                'kecamatan' => 'Lowokwaru',
                'asal_sekolah' => 'TK Bal Balan',
                'nama_ayah' => 'Agus Prayitno',
                'pekerjaan_ayah' => 1,
                'nama_ibu' => 'Putri Lestari',
                'pekerjaan_ibu' => 2,
                'nomor_telp' => '08125656563',
                'email' => NULL,
                'kelas' => 2,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'foto_2.png',
                'created_by' => 1,
                'updated_by' => NULL,
                'deleted_by' => 1,
                'created_at' => '2023-04-05 14:44:16',
                'updated_at' => '2023-04-05 14:44:38',
                'deleted_at' => '2023-04-05 14:44:38',
            ),
            3 => 
            array (
                'id' => 4,
                'no_pendaftaran' => 'PSB-23003',
                'nama_siswa' => 'Liga Aan Sanjaya',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2017-10-27',
                'agama' => 1,
                'jenis_kelamin' => 1,
                'alamat' => 'Jl. Kyai Malik Dalam No. 10',
                'kel_desa' => 'Kedungkandang',
                'kecamatan' => 'Kedungkandang',
                'asal_sekolah' => 'TK Antah Berantah',
                'nama_ayah' => 'Aji Subagyo',
                'pekerjaan_ayah' => 1,
                'nama_ibu' => 'Dewi Lakarsantri',
                'pekerjaan_ibu' => 3,
                'nomor_telp' => '08799222335',
                'email' => NULL,
                'kelas' => 2,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'foto_4.png',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-04-05 14:47:37',
                'updated_at' => '2023-04-12 16:06:44',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'no_pendaftaran' => 'PSB-23005',
                'nama_siswa' => 'Dian Afrianti',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2018-05-16',
                'agama' => 7,
                'jenis_kelamin' => 2,
                'alamat' => 'Jl. Jembawan X no. 13',
                'kel_desa' => 'Mangliawan',
                'kecamatan' => 'Pakis',
                'asal_sekolah' => 'TK ReaReo',
                'nama_ayah' => 'Sarwuni',
                'pekerjaan_ayah' => 3,
                'nama_ibu' => 'Satriani',
                'pekerjaan_ibu' => 2,
                'nomor_telp' => '0815683165579',
                'email' => 'dian@dian.com',
                'kelas' => 1,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'noimage.png',
                'created_by' => NULL,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => NULL,
                'updated_at' => '2023-05-31 11:00:40',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'no_pendaftaran' => 'PSB-23006',
                'nama_siswa' => 'Johan',
                'tempat_lahir' => NULL,
                'tanggal_lahir' => NULL,
                'agama' => NULL,
                'jenis_kelamin' => NULL,
                'alamat' => 'Jl. Semeru No. 19',
                'kel_desa' => NULL,
                'kecamatan' => NULL,
                'asal_sekolah' => NULL,
                'nama_ayah' => NULL,
                'pekerjaan_ayah' => NULL,
                'nama_ibu' => NULL,
                'pekerjaan_ibu' => NULL,
                'nomor_telp' => '081333225556',
                'email' => 'ujicoba@gmail.com',
                'kelas' => 1,
                'tahun_ajaran' => NULL,
                'foto_pendaftar' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'no_pendaftaran' => 'PSB-23007',
                'nama_siswa' => 'Handayani',
                'tempat_lahir' => NULL,
                'tanggal_lahir' => NULL,
                'agama' => NULL,
                'jenis_kelamin' => NULL,
                'alamat' => 'Jl. Ahmad Yani No. 90',
                'kel_desa' => NULL,
                'kecamatan' => NULL,
                'asal_sekolah' => NULL,
                'nama_ayah' => NULL,
                'pekerjaan_ayah' => NULL,
                'nama_ibu' => NULL,
                'pekerjaan_ibu' => NULL,
                'nomor_telp' => '08256558555',
                'email' => 'handayani@gmail.com',
                'kelas' => 2,
                'tahun_ajaran' => NULL,
                'foto_pendaftar' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'no_pendaftaran' => 'PSB-23008',
                'nama_siswa' => 'Sapto Wardoyo',
                'tempat_lahir' => NULL,
                'tanggal_lahir' => NULL,
                'agama' => NULL,
                'jenis_kelamin' => NULL,
                'alamat' => 'Jl. Sultan Agung',
                'kel_desa' => NULL,
                'kecamatan' => NULL,
                'asal_sekolah' => NULL,
                'nama_ayah' => NULL,
                'pekerjaan_ayah' => NULL,
                'nama_ibu' => NULL,
                'pekerjaan_ibu' => NULL,
                'nomor_telp' => '089225885555',
                'email' => 'sapto@gmail.com',
                'kelas' => 2,
                'tahun_ajaran' => NULL,
                'foto_pendaftar' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'no_pendaftaran' => 'PSB-23009',
                'nama_siswa' => 'Markonah',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2017-04-17',
                'agama' => 7,
                'jenis_kelamin' => 2,
                'alamat' => 'Jl. Surabaya Timur gang 17',
                'kel_desa' => 'Kedungkandang',
                'kecamatan' => 'Kedungkandang',
                'asal_sekolah' => 'PAUD Satap',
                'nama_ayah' => 'Sarwo',
                'pekerjaan_ayah' => 1,
                'nama_ibu' => 'Sukiyem',
                'pekerjaan_ibu' => 1,
                'nomor_telp' => '085935822222',
                'email' => 'markonah@gmail.com',
                'kelas' => 1,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'noimage_2.png',
                'created_by' => NULL,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => NULL,
                'updated_at' => '2023-06-20 17:32:57',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'no_pendaftaran' => 'PSB-23010',
                'nama_siswa' => 'Agustina Satriawati',
                'tempat_lahir' => 'Mojokerto',
                'tanggal_lahir' => '2018-05-29',
                'agama' => 1,
                'jenis_kelamin' => 2,
                'alamat' => 'Jl. Kembang Sepatu Gang 17A No.19',
                'kel_desa' => 'Sawoo',
                'kecamatan' => 'Jetis',
                'asal_sekolah' => 'PAUD Ganda',
                'nama_ayah' => 'Sutrisno',
                'pekerjaan_ayah' => 2,
                'nama_ibu' => 'Sulastri',
                'pekerjaan_ibu' => 3,
                'nomor_telp' => '98222333222',
                'email' => 'agustina@gmail.com',
                'kelas' => 2,
                'tahun_ajaran' => 3,
                'foto_pendaftar' => 'noimage_1.png',
                'created_by' => NULL,
                'updated_by' => 9,
                'deleted_by' => NULL,
                'created_at' => NULL,
                'updated_at' => '2023-06-07 18:00:21',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}