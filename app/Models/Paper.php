<?php

namespace App\Models;

use App\Models\Download;
use App\Models\Keyword;
use App\Models\Professional;
use App\Models\Reference;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paper extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'abstract', 'file', 'publication_date', 'school_id'];

    // Relations {
        public function downloads()
        {
            return $this->hasMany(Download::class);
        }

        public function keywords()
        {
            return $this->belongsToMany(Keyword::class, 'paper_keyword')->withTimestamps();
        }

        public function references()
        {
            return $this->hasMany(Reference::class);
        }

        public function professionals()
        {
            return $this->belongsToMany(Professional::class, 'professional_paper')->withTimestamps();
        }

        public function school()
        {
            return $this->belongsTo(School::class);
        }

        public function location()
        {
            return $this->school->location;
        }
    // }
}
