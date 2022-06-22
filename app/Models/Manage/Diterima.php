<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Manage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manage\Pendaftar;
use Carbon\Carbon;
use App\Http\Controllers\Traits\Manage\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Manage\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Manage\AdmikoMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diterima extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait,SoftDeletes;

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
        return $this->belongsToMany(Pendaftar::class, 'diterima_siswa_yang_diterima_many', 'parent_id', 'selected_id')->withPivot('admiko_order');
    }
	public function getTanggalDaftarUlangAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setTanggalDaftarUlangAttribute($value)
    {
        $this->attributes['tanggal_daftar_ulang'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getBatasDaftarUlangAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setBatasDaftarUlangAttribute($value)
    {
        $this->attributes['batas_daftar_ulang'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}