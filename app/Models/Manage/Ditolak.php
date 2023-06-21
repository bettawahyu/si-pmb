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
use App\Http\Controllers\Traits\Manage\DokreFileUploadTrait;
use App\Http\Controllers\Traits\Manage\DokreAuditableTrait;
use App\Http\Controllers\Traits\Manage\DokreMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ditolak extends Model
{
    use DokreFileUploadTrait,DokreAuditableTrait,DokreMultiTenantModeTrait,SoftDeletes;

    public $table = 'ditolak';


	const STATUS_PENOLAKAN_CONS = ["kurang"=>"Dokumen Tidak Lengkap","absah"=>"Kurang Memenuhi Syarat","kuota"=>"Kuota Penuh"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"status_penolakan",
    ];
    public function siswa_yang_ditolak_many()
    {
        return $this->belongsToMany(Pendaftar::class, 'ditolak_siswa_yang_ditolak_many', 'parent_id', 'selected_id');
    }
}
