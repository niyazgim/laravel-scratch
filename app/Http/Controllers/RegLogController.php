<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegLogController extends Controller
{
    public function create()
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => 2,
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials, true);
        return redirect(route('home'));
    }

    public function edit()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials, true))
            return back()->withInput()->withErrors(['email' => 'Invalid data']);
        return redirect(route('home'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

}
