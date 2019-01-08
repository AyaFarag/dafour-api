<?php

namespace App\Models;

use App\Models\Download;
use App\Models\Plan;
use App\Notifications\Student\ResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable implements CanResetPasswordContract
{
    use Notifiable, CanResetPassword, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'email', 'password', 'phone', 'country',];

    protected $guarded = ['confirmed','confirmation_code'];

    protected $hidden = ['password', 'remember_token','confirmation_code'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    // Relations {
        public function downloads()
        {
            return $this->hasMany(Download::class);
        }

        public function plans()
        {
            return $this->belongsToMany(Plan::class)->withPivot('start_date', 'end_date')->withTimestamps();
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
