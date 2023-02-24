<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthService
{


    public function handleLogin($credentials)
    {
        if (Auth::attempt($credentials)) {
            return redirect()->intended('administrator')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function handleRegistration($credentials)
    {
        $user = new User();
        $user->userName = $credentials->userName;
        $user->email = $credentials->email;
        $user->setPasswordAttribute($credentials->password);
        $user->save();

        return redirect('logout')->withSuccess('Registered');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('login');
    }

}
