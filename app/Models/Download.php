<?php

namespace App\Models;

use App\Models\Paper;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = ['student_id', 'paper_id'];

    // Relations {
        public function student()
        {
            return $this->belongsTo(Student::class);
        }

        public function paper()
        {
            return $this->belongsTo(Paper::class);
        }
    // }
}
