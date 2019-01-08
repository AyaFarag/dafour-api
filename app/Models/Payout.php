<?php

namespace App\Models;

use App\Models\Professional;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $fillable = ['professional_id', 'status', 'comment', 'transaction_time'];

    // Relations {
        public function professional()
        {
            return $this->belongsTo(Professional::cass);
        }
    // }
}
