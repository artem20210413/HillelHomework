<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{


    public function handleLogin($credentials)
    {
        if (Auth::attempt($credentials)) {
            return redirect(route('admin'));
        }

        return redirect(route("login"))->with('errorLogin', 'Login details are not valid');
    }

    public function handleRegistration($credentials)
    {
        $user = new User();
        $user->user_name = $credentials->user_name;
        $user->email = $credentials->email;
        $user->setPasswordAttribute($credentials->password);
        $user->save();

        return redirect(route('logout'))->with('errorLogin', 'Registered');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect(route('login'));
    }

}
