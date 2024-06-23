<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentistryStudent extends Model
{
    protected $table = 'dentistrystudents';

    protected $fillable = [
        'user_type', 'name', 'username', 'password', 
     ];

}

