<?php

namespace App\Models;

use App\Models\Paper;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = ['paper_id', 'title', 'link'];

    // Relations {
        public function paper()
        {
            return $this->belongsTo(Paper::class);
        }
    // }
}
