<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Manage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Manage\TahunAjaran;
use App\Http\Controllers\Traits\Manage\DokreFileUploadTrait;
use App\Http\Controllers\Traits\Manage\DokreAuditableTrait;
use App\Http\Controllers\Traits\Manage\DokreMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah extends Model
{
    use DokreFileUploadTrait,DokreAuditableTrait,DokreMultiTenantModeTrait,SoftDeletes;

    public $table = 'sekolah';

    static $dokre_file_info = [
		"logo_sekolah"=>[
			"original"=>["action"=>"resize","width"=>512,"height"=>512,"folder"=>"upload/logo/"]
		]
	];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        "nama_sekolah",
        "alamat_sekolah",
        "kel_desa",
        "kecamatan",
        "kab_kota",
        "provinsi",
        "akreditasi",
        "tahun_akre",
        "telp_sekolah",
        "email_sekolah",
        "website_sekolah",
        "logo_sekolah",
    ];
	public function setLogoSekolahAttribute()
    {
        if (request()->hasFile('logo_sekolah')) {
            $this->attributes['logo_sekolah'] = $this->imageUpload(request()->file("logo_sekolah"), Sekolah::$dokre_file_info["logo_sekolah"], $this->getOriginal('logo_sekolah'));
        }
    }
    public function setLogoSekolahDokreDeleteAttribute($value)
    {
        if (!request()->hasFile('logo_sekolah') && $value == 1) {
            $this->attributes['logo_sekolah'] = $this->imageUpload('', Sekolah::$dokre_file_info["logo_sekolah"], $this->getOriginal('logo_sekolah'), $value);
        }
    }
}
