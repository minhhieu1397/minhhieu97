<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
    	return view('users.login');
    }

    public function postLogin(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admins.index');
            } else {
                return redirect()->route('timesheets.index');
            }
        } else {
            return redirect()->route('users.login')->withErrors([
                'errorLogin' => 'Username or password incorrect'
            ]);
        }
    }

    public function logout() 
    {
        Auth::logout();

        return redirect()->route('users.login');
    }
}
