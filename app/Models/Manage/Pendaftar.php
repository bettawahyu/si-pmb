<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Manage;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Manage\Agama;
use App\Models\Manage\JenisKelamin;
use Illuminate\Support\Str;
use App\Models\Manage\PekerjaanOrangTua;
use App\Models\Manage\Kelas;
use App\Models\Manage\TahunAjaran;
use App\Http\Controllers\Traits\Manage\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Manage\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Manage\AdmikoMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftar extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait,SoftDeletes;

    public $table = 'pendaftar';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"no_pendaftaran",
		"nama_siswa",
		"tempat_lahir",
		"tanggal_lahir",
		"agama",
		"jenis_kelamin",
		"alamat",
		"nama_orang_tua",
		"pekerjaan_orang_tua",
		"nomor_telp",
		"kelas",
		"tahun_ajaran",
    ];
    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function agama_id()
    {
        return $this->belongsTo(Agama::class, 'agama');
    }
	public function jenis_kelamin_id()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin');
    }
	public function pekerjaan_orang_tua_id()
    {
        return $this->belongsTo(PekerjaanOrangTua::class, 'pekerjaan_orang_tua');
    }
	public function kelas_id()
    {
        return $this->belongsTo(Kelas::class, 'kelas');
    }
	public function tahun_ajaran_id()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran');
    }
}