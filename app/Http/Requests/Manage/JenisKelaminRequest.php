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

class JenisKelaminRequest extends FormRequest
{
    public function rules()
    {
        return [
            "jenis_kelamin"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "jenis_kelamin"=>"Jenis Kelamin"
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