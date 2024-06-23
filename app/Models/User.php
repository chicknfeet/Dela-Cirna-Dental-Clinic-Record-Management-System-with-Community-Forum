<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
       'user_type', 'name', 'username', 'password', 
    ];

    public function getUserTypeAttribute($value){
        if ($value === 'admin') {
            return 'Admin';
        } elseif ($value === 'patient') {
            return 'Patient';
        } elseif ($value === 'dentistrystudent') {
            return 'Dentistry Student';
        } else {
            return 'Unknown';
        }
    }
}