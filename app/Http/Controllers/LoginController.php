<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('home');
        } 
        return to_route('login.view');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $credentials = Arr::only($data, ['email', 'password']);
        if(Auth::attempt($credentials, $data['remember']??false)) {
            return redirect()->route('home');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login.view');
    }
}
