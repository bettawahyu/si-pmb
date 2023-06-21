<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
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
use App\Http\Controllers\Traits\Manage\DokreFileUploadTrait;
use App\Http\Controllers\Traits\Manage\DokreAuditableTrait;
use App\Http\Controllers\Traits\Manage\DokreMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftar extends Model
{
    use DokreFileUploadTrait,DokreAuditableTrait,DokreMultiTenantModeTrait,SoftDeletes;

    public $table = 'pendaftar';


    static $dokre_file_info = [
		"foto_pendaftar"=>[
			"original"=>["action"=>"resize","width"=>1024,"height"=>768,"folder"=>"upload/pendaftar/"]
		]
	];

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
        "kel_desa",
        "kecamatan",
        "kab_kota",
        "provinsi",
        "asal_sekolah",
		"nama_ayah",
		"pekerjaan_ayah",
        "nama_ibu",
		"pekerjaan_ibu",
		"nomor_telp",
		"kelas",
		"tahun_ajaran",
        "foto_pendaftar"
    ];
    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('dokre_config.table_date_format')) : null;
    }
    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = $value ? Carbon::createFromFormat(config('dokre_config.table_date_format'), $value)->format('Y-m-d') : null;
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
    public function unggahan()
    {
        return $this->hasMany(Dokumen::class);
    }
    public function setFotoPendaftarAttribute()
    {
        if (request()->hasFile('foto_pendaftar')) {
            $this->attributes['foto_pendaftar'] = $this->imageUpload(request()->file("foto_pendaftar"), Pendaftar::$dokre_file_info["foto_pendaftar"], $this->getOriginal('foto_pendaftar'));
        }
    }
    public function setFotoPendaftarDokreDeleteAttribute($value)
    {
        if (!request()->hasFile('foto_pendaftar') && $value == 1) {
            $this->attributes['foto_pendaftar'] = $this->imageUpload('', Pendaftar::$dokre_file_info["foto_pendaftar"], $this->getOriginal('foto_pendaftar'), $value);
        }
    }
}
