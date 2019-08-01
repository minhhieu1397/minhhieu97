<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
    	return view('users.login');
    }

    public function postlogin(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');

    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    		if (Auth::user()->role == 'admin') {
    			return redirect()->route('users.index');
    		}
    	} else {
            $errors = new MessageBag(['errorlogin' => 'email or password is incorrect']);
            return redirect()->route('users.login')->withErrors($errors);
        } 
    }

    public function index()
    {
    	return view('users.view');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        
    }
}
