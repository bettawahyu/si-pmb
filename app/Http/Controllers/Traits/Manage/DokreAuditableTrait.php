<?php
/** Helper trait for auditable logs. **/

/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Http\Controllers\Traits\Manage;

use App\Models\Manage\Admins\DokreAuditable;
use Illuminate\Database\Eloquent\Model;

trait DokreAuditableTrait
{
    public static function bootDokreAuditableTrait()
    {
        static::created(function (Model $model) {
            $model->dokreSaveAuditable('created', $model);
        });

        static::updated(function (Model $model) {
            $model->dokreSaveAuditable('updated', $model);
        });

        static::deleting(function (Model $model) {
            $model->dokreSaveAuditable('deleted', $model);
            if (!method_exists($model, 'runSoftDelete')) {
                $model->dokreDeleteCascadeLog(get_class($model), [$model->id]);
            }
        });
    }

    protected function dokreSaveAuditable($action, $model)
    {

        DokreAuditable::create([
            'action'   => $action,
            'row_id' => $model->id ?? null,
            'model'    => get_class($model) ?? null,
            'user_id'  => auth()->id() ?? null,
            'info'     => $model ?? null,
            'url'     => url()->current() ?? null,
            'ip'       => request()->ip() ?? null,
        ]);
    }

    protected function dokreDeleteCascadeLog($modelPath, $deleteId)
    {
        if (property_exists(app($modelPath), 'dokreCascadeDelete')) {
            $cascade = $modelPath::$dokreCascadeDelete;
            foreach ($cascade as $key_id => $modelArray) {
                foreach ($modelArray as $model) {
                    $getModel = app($modelPath . '\\' . $model);
                    if (property_exists($getModel, 'dokreCascadeDelete')) {
                        $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                        if (count($deleteIdArray) > 0) {
                            $this->dokreDeleteCascadeLog($modelPath . '\\' . $model, $deleteIdArray);
                        }
                    }
                    $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->get();
                    foreach($deleteIdArray as $singleId){
                        $this->dokreSaveAuditable('deleted', $getModel::find($singleId->id));
                    }
                }
            }
        }
    }
}
