<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Manage;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Manage\DokreFileUploadTrait;
use App\Http\Controllers\Traits\Manage\DokreAuditableTrait;
use App\Http\Controllers\Traits\Manage\DokreMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjaran extends Model
{
    use DokreFileUploadTrait,DokreAuditableTrait,DokreMultiTenantModeTrait,SoftDeletes;

    public $table = 'tahun_ajaran';


	const STATUS_AKTIF_CONS = ["non-aktif"=>"Non Aktif","aktif"=>"Aktif"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"tahun_ajaran",
		"status_aktif",
    ];

}
