<?php

namespace App\Traits;

trait Autofill
{
    public static function bootAutofill()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by') && in_array('created_by', $model->fillable)) {
                $model->created_by = auth()->user()->id;
            }
            if (!$model->isDirty('updated_by') && in_array('updated_by', $model->fillable)) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by') && in_array('updated_by', $model->fillable)) {
                $model->updated_by = auth()->user()->id;
            }
        });
    }
}
