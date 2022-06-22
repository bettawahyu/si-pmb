<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
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
				'date_format:"'.config('admiko_config.table_date_format').'"',
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
			"nama_orang_tua"=>[
				"string",
				"required"
			],
			"pekerjaan_orang_tua"=>[
				"required"
			],
			"nomor_telp"=>[
				"string",
				"required"
			],
			"kelas"=>[
				"required"
			],
			"tahun_ajaran"=>[
				"required"
			]
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
			"nama_orang_tua"=>"Nama Orang Tua",
			"pekerjaan_orang_tua"=>"Pekerjaan Orang Tua",
			"nomor_telp"=>"Nomor Telp.",
			"kelas"=>"Kelas",
			"tahun_ajaran"=>"Tahun Ajaran"
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