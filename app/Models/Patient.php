<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $table = 'patients';

    protected $fillable = [
        'user_type', 'name', 'username', 'password', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

