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

class DokumenRequest extends FormRequest
{
    public function rules()
    {
        return [
            "id_pendaftar"=>[
				"array",
				"required"
			],

            "id.pendaftar.*"=>[
                "required",
            ],

            "id_unggah"=>[
				"array",
				"required"
			],

            "id_unggah.*"=>[
				"required"
			],
            "dokumen"=>[
				"array",
				// "max:4112",
				// "file_extension:jpg,jpeg,png,pdf",
				// "mimes:jpg,jpeg,png,pdf",
				"required"
            ],
            // "dokumen"=>[
            //     "array",
            //     "required",
            // ],

            "dokumen.*"=>[
                "required",
            ]
        ];
    }
    public function attributes()
    {
        return [
            "id_pendaftar" => "ID Pendaftar",
            "id_unggah" => "ID Unggah",
            "dokumen"=>"Nama Dokumen"
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
