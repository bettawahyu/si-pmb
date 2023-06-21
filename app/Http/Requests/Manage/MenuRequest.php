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

class MenuRequest extends FormRequest
{
    public function rules()
    {
        return [
            "nama_menu"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nama_menu"=>"Nama Menu",
            "slug"=>"Slug",
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
