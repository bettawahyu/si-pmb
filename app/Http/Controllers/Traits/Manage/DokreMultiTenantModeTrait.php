<?php
/** Helper trait for Multi-Tenancy functionality. **/

/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Http\Controllers\Traits\Manage;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait DokreMultiTenantModeTrait
{
    public static function bootDokreMultiTenantModeTrait()
    {
        static::creating(function (Model $model) {
            $model->created_by = auth()->id();
        });

        static::updating(function (Model $model) {
            $model->updated_by = auth()->id();
        });

        static::deleted(function (Model $model) {
            if (method_exists($model, 'runSoftDelete')) {
                $model->deleted_by = auth()->id();
                $model->saveQuietly();
                $model->dokreDeleteCascadeUpdate(get_class($model), [$model->id]);
            }
        });

        if(auth()->user()->role_id != 1){
            static::addGlobalScope('created_by', function (Builder $builder) {
                $builder->whereIn('created_by', auth()->user()->multi_tenancy_access->pluck('id'))->orWhereNull('created_by');
            });
        }
    }

    protected function dokreDeleteCascadeUpdate($modelPath, $deleteId)
    {
        if (property_exists(app($modelPath), 'dokreCascadeDelete')) {
            $cascade = $modelPath::$dokreCascadeDelete;
            foreach ($cascade as $key_id => $modelArray) {
                foreach ($modelArray as $model) {
                    $getModel = app($modelPath . '\\' . $model);
                    if (property_exists($getModel, 'dokreCascadeDelete')) {
                        $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                        if (count($deleteIdArray) > 0) {
                            $this->dokreDeleteCascadeUpdate($modelPath . '\\' . $model, $deleteIdArray);
                        }
                    }
                    $getModel::whereIn($key_id, $deleteId)->update(['deleted_by' => auth()->id()]);
                }
            }
        }
    }

}
