<?php
/** Dokre global search configuration**/



/**IMPORTANT: this page will be overwritten and any change will be lost!!
 ** use dokre_global_search_custom.php to add your models into global search!!
 **/
return [
    [
        'name' => 'Agama',
        'route_id' => 'agama',
        'model' => 'Agama',
        'fields' => [
            ["field"=>"nama_agama","show"=>1]
        ]
    ],
    [
        'name' => 'Jenis Kelamin',
        'route_id' => 'jenis_kelamin',
        'model' => 'JenisKelamin',
        'fields' => [
            ["field"=>"jenis_kelamin","show"=>1]
        ]
    ],
    [
        'name' => 'Kelas',
        'route_id' => 'kelas',
        'model' => 'Kelas',
        'fields' => [
            ["field"=>"nama_kelas","show"=>1],
			["field"=>"kapasitas","show"=>1]
        ]
    ],
    [
        'name' => 'Pekerjaan Orang Tua',
        'route_id' => 'pekerjaan_orang_tua',
        'model' => 'PekerjaanOrangTua',
        'fields' => [
            ["field"=>"jenis_pekerjaan","show"=>1]
        ]
    ],
    [
        'name' => 'Unggah Dokumen',
        'route_id' => 'unggah_dokumen',
        'model' => 'UnggahDokumen',
        'fields' => [
            ["field"=>"nama_dokumen","show"=>1]
        ]
    ],
];
