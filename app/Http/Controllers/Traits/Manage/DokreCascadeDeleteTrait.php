<?php
/** Helper for cascade delete files or soft delete. **/

/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Http\Controllers\Traits\Manage;

use Illuminate\Database\Eloquent\Model;

trait DokreCascadeDeleteTrait
{
    public static function bootDokreCascadeDeleteTrait()
    {
        static::deleted(function (Model $model) {
            if (method_exists($model, 'runSoftDelete')) {
                $model->dokreDeleteCascade(get_class($model), [$model->id]);
            }
        });
    }

    protected function dokreDeleteCascade($modelPath, $deleteId)
    {
        if (property_exists(app($modelPath), 'dokreCascadeDelete')) {
            $cascade = $modelPath::$dokreCascadeDelete;
            foreach ($cascade as $key_id => $modelArray) {
                foreach ($modelArray as $model) {
                    $getModel = app($modelPath . '\\' . $model);
                    if (property_exists($getModel, 'dokreCascadeDelete')) {
                        $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                        if (count($deleteIdArray) > 0) {
                            $this->dokreDeleteCascade($modelPath . '\\' . $model, $deleteIdArray);
                        }
                    }
                    $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                    $getModel::destroy($deleteIdArray);
                }
            }
        }
    }

}
