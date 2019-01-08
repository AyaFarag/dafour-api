<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title_en', 'title_ar', 'duration', 'price', 'description_en', 'description_ar'];

    // Relations {
        public function students()
        {
            return $this->belongsToMany(Student::class)->withPivot('start_date', 'end_date')->withTimestamps();
        }
    // }
}
