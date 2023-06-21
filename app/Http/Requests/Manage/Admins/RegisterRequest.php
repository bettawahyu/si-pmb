<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Manage\Admins;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        $id = $this->route("pendaftar") ?? null;
        return [
            "nama"=>[
				"string",
				"required"
			],
            "alamat"=>[
				"string",
				"required"
            ],
            "telepon"=>[
				"numeric",
				"required"
            ],
            "email"=>[
                "email",
                "unique:pendaftar,email,".$id.",id,deleted_at,NULL",
                'required'
            ],
            "password"=>[
				"string",
				"required"
            ],
            "confirm"=>[
				"string",
				"required"
            ],
            "kelas"=>[
				"required"
            ],

        ];
    }
    public function attributes()
    {
        return [
            "nama" => "Nama Siswa",
            "alamat" => "Alamat Siswa",
            "no_telp" => "Nomor Telepon",
            "email" => "Email Siswa",
            "password" => "Password",
            "confirm" => "Confirm Password",
            "kelas" => "Kelas Siswa",
        ];
    }
    public function authorize()
    {
        return true;
    }
}
