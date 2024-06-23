<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Patient;
use App\Models\DentistryStudent;

class AuthController extends Controller
{
    public function index(){
        return view('users.accounts.login');
    }

    public function login(Request $request){
        $validate = $request->validate([
            'user_type' => 'required|in:admin,patient,dentistrystudent',
            'username'=>'required|min:5|max:15',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('username', 'password');
        $userType = $request->input('user_type');

        if (Auth::attempt($credentials)) {
            $request->session()->put('user_type', $userType);

            if ($userType === 'admin') {
                return redirect()->route('patientlist');
            } elseif ($userType === 'patient') {
                return redirect()->route('appointment');
            } elseif ($userType === 'dentistrystudent') {
                return redirect()->route('communityforum');
            } else {
                return redirect()->route('landingpage');
            }
        } else {
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function registration(){
        return view('users.accounts.registration');
    }
    
    public function signup(Request $request){
        $validate = $request->validate([
            'user_type' => 'required|in:admin,patient,dentistrystudent',
            'name' => 'required|string|max:255',
            'username'=>'required|min:5|max:15',
            'password' => 'required|string|min:8',
        ]);
        
        $validate['password'] = Hash::make($validate['password']);

        $user = User::create([
            'user_type' => $request->input('user_type'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($request->input('user_type') === 'patient') {
            Patient::create([
                'user_id' => $user->id,
                'user_type' => $user->user_type,
                'name' => $user->name,
                'username' => $user->username,
                'password' => $user->password,
                
            ]);
        } elseif ($request->input('user_type') === 'dentistrystudent') {
            DentistryStudent::create([
                'user_id' => $user->id,
                'user_type' => $user->user_type,
                'name' => $user->name,
                'username' => $user->username,
                'password' => $user->password,
            ]);
        }

        if ($user === 'patient') {
            return redirect()->route('appointment');
        } elseif ($user === 'dentistrystudent') {
            return redirect()->route('communityforum');
        } else {
            return redirect()->route('landingpage');
        }
    }
}

