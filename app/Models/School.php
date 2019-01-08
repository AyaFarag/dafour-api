<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Paper;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['location_id', 'title_en', 'title_ar'];

    // Relations {
        public function papers()
        {
            return $this->hasMany(Paper::class);
        }

        public function location()
        {
            return $this->belongsTo(Location::class);
        }
    // }
}
