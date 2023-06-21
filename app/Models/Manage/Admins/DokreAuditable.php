<?php
/** Helper for auditable log. **/

/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Models\Manage\Admins;

use App\Models\Manage\Admins\Admins;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DokreAuditable extends Model
{
    public $table = 'dokre_auditable_logs';

    protected $fillable = [
        'action',
        'row_id',
        'model',
        'user_id',
        'info',
        'url',
        'ip',
    ];

    protected $casts = [
        'info' => 'collection',
    ];

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('dokre_config.table_date_time_format')) : null;
    }

    public function user_info()
    {
        return $this->belongsTo(Admins::class, 'user_id');
    }
    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->orWhere("action","like","%".$search."%")
                ->orWhere("row_id","like","%".$search."%")
                ->orWhere("model","like","%".$search."%")
                ->orWhereHas("user_info", function($q) use($search) { $q->where("name", "like", "%".$search."%")->orWhere("email", "like", "%".$search."%"); })
                //->orWhere("info","like","%".$search."%")
                ->orWhere("url","like","%".$search."%")
                ->orWhere("ip","like","%".$search."%");
        }
    }
}
