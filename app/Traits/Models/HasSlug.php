<?php
declare(strict_types = 1);

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    protected static function bootHasSlug()
    {
        static::creating(function (Model $model) {
            if ($model->slug) {
                $model->slug = $model->slug;
            } else {
                $newSlug = str($model->{self::slugFrom()})->slug();

                $countRowsWithSlug = self::query()
                    ->where('slug', 'like', "$newSlug%")
                    ->count();

                if ($countRowsWithSlug) {
                    $newSlug = $newSlug->append("-$countRowsWithSlug");
                }

                $model->slug = $newSlug;
            }

        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }
}
