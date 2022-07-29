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

class MenuRequest extends FormRequest
{
    public function rules()
    {
        return [
            "nama_menu"=>[
				"string",
				"required"
			],
            "slug"=>[
				"string",
				"required"
			],
            "aktif"=>[
				"numeric",
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "nama_menu"=>"Nama Menu",
            "slug"=>"Slug",
            "aktif"=>"Aktif",
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
