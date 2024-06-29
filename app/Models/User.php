<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    protected $fillable = [
       'user_type', 'name', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function dentistryStudent()
    {
        return $this->hasOne(DentistryStudent::class);
    }
}