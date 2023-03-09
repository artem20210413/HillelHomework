<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

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
        $user->userName = $credentials['userName'];
        $user->email = $credentials['email'];
        $user->setPasswordAttribute($credentials['password']);
        $user->save();

        return redirect(route('logout'))->with('errorLogin', 'Registered');
    }

    public function oauth($email, $name, $password): bool
    {
        if ($user = User::where('email', $email)->first()) {
            Auth::login($user);
        } else {
            $user = new User();
            $user->email = $email;
            $user->user_name = $name;
            $user->setPasswordAttribute($password);
            $user->save();
            Auth::login($user);
        }

        return true;
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect(route('login'));
    }

}
