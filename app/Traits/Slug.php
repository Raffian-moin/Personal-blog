<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Slug
{
    public static function bootSlug()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            $model->slug =  $model->generateSlug($model);
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            $model->slug =  $model->generateSlug($model);
        });


    }

    public function generateSlug($model)
    {
        $slug =  Str::slug($model->name, '-');
        $SimilarSlugsModel = $model::where('slug', 'like', '%' . $slug . '%')->get('slug');

        if ($SimilarSlugsModel) {
            $count = 0;

            foreach ($SimilarSlugsModel as $slugModel) {
                $lastDashPosition = strrpos($slugModel->slug, '-');
                $stringBeforeLastDash = substr($slugModel->slug, 0, $lastDashPosition);
                $stringAfterLastDash = substr($slugModel->slug, $lastDashPosition);
                
                if ($slugModel->slug === $slug || (preg_match('/[0-9]/', $stringAfterLastDash) && $stringBeforeLastDash === $slug)) {
                    $count++;
                }
            }

            if ($count > 0) {
                $slug .= '-' . $count;
            }

        }

        return $slug;
    }
}
