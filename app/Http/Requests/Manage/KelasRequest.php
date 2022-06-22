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

class KelasRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("kelas") ?? null;
		return [
            "nama_kelas"=>[
				"string",
				"unique:kelas,nama_kelas,".$id.",id,deleted_at,NULL",
				"required"
			],
			"kapasitas"=>[
				"integer",
				"required",
				"min:0",
				"max:30"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nama_kelas"=>"Nama Kelas",
			"kapasitas"=>"Kapasitas"
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