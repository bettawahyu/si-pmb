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

class DiterimaRequest extends FormRequest
{
    public function rules()
    {
        return [
            "siswa_yang_diterima"=>[
				"array",
				"required"
			],
			"tanggal_daftar_ulang"=>[
				'date_format:"'.config('dokre_config.table_date_format').'"',
				"required"
			],
			"batas_daftar_ulang"=>[
				'date_format:"'.config('dokre_config.table_date_format').'"',
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "siswa_yang_diterima"=>"Siswa Yang Diterima",
			"tanggal_daftar_ulang"=>"Tanggal Daftar Ulang",
			"batas_daftar_ulang"=>"Batas Daftar Ulang"
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
