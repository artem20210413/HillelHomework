<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AdministratorService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login()
    {
        return view('pages.auth.login', []);
    }

    public function registration()
    {
        return view('pages.auth.registration', []);
    }

    public function handleRegistration(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'email' => 'required',
            'password' => 'required', // 6<
        ]);
        $userName = $request->userName;
        $email = $request->email;
        $password = $request->password;

        $user = new User();
        $user->userName = $userName;
        $user->email = $email;
        $user->setPasswordAttribute($password);
        $user->save();

        return redirect('logout')->withSuccess('Registered');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required', // 6<
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('administrator')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('login');

    }


}
