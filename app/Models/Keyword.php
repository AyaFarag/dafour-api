<?php

namespace App\Models;

use App\Models\Paper;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['title'];

    public $timestamps = false;

    // Relations {
        public function papers()
        {
            return $this->belongsToMany(Paper::class, 'paper_keyword')->withTimestamps();
        }
    // }
}
