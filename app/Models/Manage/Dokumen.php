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
use App\Models\Manage\Pendaftar;
use App\Models\Manage\UnggahDokumen;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use DokreFileUploadTrait,DokreAuditableTrait,SoftDeletes;

    public $table = 'dokumen_pendaftar';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"id_pendaftar",
        "id_unggah",
        "dokumen",
    ];

    public function no_pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar');
    }

	public function dok_unggah()
    {
        return $this->belongsTo(UnggahDokumen::class, 'id_unggah');
    }

    public function setDokumenAttribute($value)

    {

        $this->attributes['dokumen'] = json_encode($value);

    }

}
