<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(){
        return view('users.appointment.appointment');
    }

    
}
