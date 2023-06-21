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

class SekolahRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("sekolah") ?? null;
		return [
            "nama_sekolah"=>[
				"string",
				"unique:sekolah,nama_sekolah,".$id.",id,deleted_at,NULL",
				"required"
			],
			"alamat_sekolah"=>[
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
			"akreditasi"=>[
				"string",
				"required"
			],
            "tahun_akre"=>[
				"numeric",
				"required"
			],
			"telp_sekolah"=>[
				"string",
				"required"
			],
			"email_sekolah"=>[
				"required"
			],
			"logo_sekolah"=>[
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
            "nama_sekolah"=>"Nama Sekolah",
            "alamat_sekolah"=>"Alamat Sekolah",
            "kel_desa"=>"Kelurahan/Desa",
            "kecamatan"=>"Kecamatan",
            "kab_kota"=>"Kabupaten/Kota",
            "provinsi"=>"Provinsi",
            "akreditasi"=>"Akreditasi",
            "tahun_akre"=>"Tahun Akreditasi",
            "telp_sekolah"=>"Telepon Sekolah",
            "email_sekolah"=>"Email Sekolah",
            "logo_sekolah"=>"Logo Sekolah",
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
