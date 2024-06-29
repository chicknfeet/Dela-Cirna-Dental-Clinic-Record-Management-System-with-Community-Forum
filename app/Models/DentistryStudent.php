<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DentistryStudent extends Authenticatable
{
    protected $table = 'dentistrystudents';

    protected $fillable = [
        'user_type', 'name', 'username', 'password', 
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

