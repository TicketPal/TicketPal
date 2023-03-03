<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
		if(Auth::check())
        {
            return redirect('dashboard');
        }
		
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function validate_registration(Request $request)
    {
        $request->validate([
            'username'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'username'  =>  $data['username'],
            'first_name'  =>  $data['first_name'],
            'last_name'  =>  $data['last_name'],
            'email' =>  $data['email'],
            'role' =>  $data['role'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }

    public function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect('dashboard');
    }
}
