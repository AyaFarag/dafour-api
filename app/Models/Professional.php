<?php

namespace App\Models;

use App\Models\Paper;
use App\Models\Payout;
use App\Notifications\Professional\ResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Professional extends Authenticatable implements CanResetPasswordContract
{
    use Notifiable, CanResetPassword, SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'degree', 'email', 'password', 'phone', 'country'];

    protected $guarded = ['confirmed','confirmation_code'];

    protected $hidden = ['password', 'remember_token','confirmation_code'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    // Relations {
        public function payouts()
        {
            return $this->hasMany(Payout::class);
        }

        public function papers()
        {
            return $this->belongsToMany(Paper::class, 'professional_paper')->withTimestamps();
        }
    // }
    
    // Accessors {
        public function getFullNameAttribute()
        {
            $name  = "";
            $name .= ucfirst($this->first_name) . " ";
            $name .= $this->middle_name != null ? ucfirst($this->middle_name[0]) . ". " : "";
            $name .= ucfirst($this->last_name);

            return $name;
        }
    // }
    
    // Mutators {
        public function setPasswordAttribute($password)
        {
            if (password_needs_rehash($password,PASSWORD_DEFAULT)) {
                $this->attributes['password'] = bcrypt($password);
            }else{
                $this->attributes['password'] =  $password;
            }
        }
    // }
}