<?php

namespace App\Models;

use App\Models\Paper;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['title_en', 'title_ar'];

    // Relations {
        public function papers()
        {
            return $this->hasManyThrough(Paper::class, School::class);
        }

        public function schools()
        {
            return $this->hasMany(School::class);
        }
    // }
}