<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public static function boot()
    {
        static::deleting(function($model){
            if ($model->image && file_exists(storage_path("app/public/{$model->getOriginal('image')}"))) {
                Storage::delete('public/' . $model->getOriginal('image'));
            }
        });
    }

    // Accessors {
        public function getImageAttribute($image)
        {
            return asset('storage/' . $image);
        }
    // }
}
