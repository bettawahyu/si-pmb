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
// use App\Http\Controllers\Traits\Manage\AdmikoMultiTenantModeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,SoftDeletes;

    public $table = 'menu';

    const AKTIF_CONS = ["1"=>"Aktif","0"=>"Non Aktif"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nama_menu",
        "slug",
        "aktif",
    ];

}
