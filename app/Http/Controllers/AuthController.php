<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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

    public function handleRegistration(RegistrationRequest $request, AuthService $service)
    {
        $credentials = $request->only('userName', 'email', 'password');
        return $service->handleRegistration($credentials);
    }

    public function handleLogin(LoginRequest $request, AuthService $service)
    {
        $credentials = $request->only('email', 'password');
        return $service->handleLogin($credentials);
    }

    public function logout(AuthService $service)
    {
        return $service->logout();
    }


}
