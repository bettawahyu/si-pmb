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

class DitolakRequest extends FormRequest
{
    public function rules()
    {
        return [
            "siswa_yang_ditolak"=>[
				"array",
				"required"
			],
			"perubahan_status"=>[
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "siswa_yang_ditolak"=>"Siswa Yang Ditolak",
			"perubahan_status"=>"Perubahan Status"
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