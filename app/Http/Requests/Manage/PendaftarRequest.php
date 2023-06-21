<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Manage;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class PendaftarRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("pendaftar") ?? null;
		return [
            "no_pendaftaran"=>[
				"string",
				"unique:pendaftar,no_pendaftaran,".$id.",id,deleted_at,NULL",
				"required"
			],
			"nama_siswa"=>[
				"string",
				"required"
			],
			"tempat_lahir"=>[
				"string",
				"required"
			],
			"tanggal_lahir"=>[
				'date_format:"'.config('dokre_config.table_date_format').'"',
				"required"
			],
			"agama"=>[
				"required"
			],
			"jenis_kelamin"=>[
				"required"
			],
			"alamat"=>[
				"required"
			],
            "kel_desa"=>[
                "required"
            ],
            "kecamatan"=>[
                "required"
            ],
            "kab_kota"=>[
                "nullable"
            ],
            "provinsi"=>[
                "nullable"
            ],
			"nama_ayah"=>[
				"string",
				"required"
			],
			"pekerjaan_ayah"=>[
				"required"
			],
            "nama_ibu"=>[
				"string",
				"required"
			],
			"pekerjaan_ibu"=>[
				"required"
			],
			"nomor_telp"=>[
				"numeric",
				"required"
			],
			"kelas"=>[
				"required"
			],
			"tahun_ajaran"=>[
				"required"
            ],
            "foto_pendaftar"=>[
				"image",
				"file_extension:jpg,png,jpeg",
				"mimes:jpg,png,jpeg",
				"nullable"
			],
        ];
    }
    public function attributes()
    {
        return [
            "no_pendaftaran"=>"No. Pendaftaran",
			"nama_siswa"=>"Nama Siswa",
			"tempat_lahir"=>"Tempat Lahir",
			"tanggal_lahir"=>"Tanggal Lahir",
			"agama"=>"Agama",
			"jenis_kelamin"=>"Jenis Kelamin",
			"alamat"=>"Alamat",
            "kel_desa"=>"Kelurahan/Desa",
            "kecamatan"=>"Kecamatan",
            "kab_kota"=>"Kabupaten/Kota",
            "provinsi"=>"Provinsi",
            "asal_sekolah"=>"Asal Sekolah",
			"nama_ayah"=>"Nama Ayah",
			"pekerjaan_ayah"=>"Pekerjaan Ayah",
            "nama_ibu"=>"Nama Ibu",
			"pekerjaan_ibu"=>"Pekerjaan Ibu",
			"nomor_telp"=>"Nomor Telp.",
			"kelas"=>"Kelas",
			"tahun_ajaran"=>"Tahun Ajaran",
            "foto_pendaftar"=>"Foto Siswa"
        ];
    }

    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}
