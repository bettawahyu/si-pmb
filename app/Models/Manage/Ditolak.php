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
use App\Http\Controllers\Traits\Manage\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Manage\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Manage\AdmikoMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ditolak extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait,SoftDeletes;

    public $table = 'ditolak';
    
    
	const PERUBAHAN_STATUS_CONS = ["diterimacdg"=>"Diterima Cadangan","bersyaratcdg"=>"Diterima dengan Syarat Cadangan","ditimbangcdg"=>"Diterima dengan Pertimbangan Cadangan"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"perubahan_status",
    ];
    public function siswa_yang_ditolak_many()
    {
        return $this->belongsToMany(Pendaftar::class, 'ditolak_siswa_yang_ditolak_many', 'parent_id', 'selected_id');
    }
}