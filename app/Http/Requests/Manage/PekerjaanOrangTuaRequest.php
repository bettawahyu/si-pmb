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

class PekerjaanOrangTuaRequest extends FormRequest
{
    public function rules()
    {
        return [
            "jenis_pekerjaan"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "jenis_pekerjaan"=>"Jenis Pekerjaan"
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
