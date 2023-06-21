<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Manage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manage\Pendaftar;
use Carbon\Carbon;
use App\Http\Controllers\Traits\Manage\DokreFileUploadTrait;
use App\Http\Controllers\Traits\Manage\DokreAuditableTrait;
use App\Http\Controllers\Traits\Manage\DokreMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diterima extends Model
{
    use DokreFileUploadTrait,DokreAuditableTrait,DokreMultiTenantModeTrait,SoftDeletes;

    public $table = 'diterima';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"tanggal_daftar_ulang",
		"batas_daftar_ulang",
    ];
    public function siswa_yang_diterima_many()
    {
        return $this->belongsToMany(Pendaftar::class, 'diterima_siswa_yang_diterima_many', 'parent_id', 'selected_id')->withPivot('dokre_order');
    }
	public function getTanggalDaftarUlangAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('dokre_config.table_date_format')) : null;
    }
    public function setTanggalDaftarUlangAttribute($value)
    {
        $this->attributes['tanggal_daftar_ulang'] = $value ? Carbon::createFromFormat(config('dokre_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getBatasDaftarUlangAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('dokre_config.table_date_format')) : null;
    }
    public function setBatasDaftarUlangAttribute($value)
    {
        $this->attributes['batas_daftar_ulang'] = $value ? Carbon::createFromFormat(config('dokre_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
