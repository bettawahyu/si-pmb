<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Manage;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Manage\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Manage\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Manage\AdmikoMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnggahDokumen extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait,SoftDeletes;

    public $table = 'unggah_dokumen';
    
    
	const STATUS_AKTIF_CONS = ["aktif"=>"Aktif","nonaktif"=>"Non Aktif"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nama_dokumen",
		"status_aktif",
    ];
    
}