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

class TahunAjaranRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("tahun_ajaran") ?? null;
		return [
            "tahun_ajaran"=>[
				"string",
				"unique:tahun_ajaran,tahun_ajaran,".$id.",id,deleted_at,NULL",
				"required"
			],
			"status_aktif"=>[
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "tahun_ajaran"=>"Tahun Ajaran",
			"status_aktif"=>"Status Aktif"
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
