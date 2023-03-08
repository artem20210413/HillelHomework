<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Google\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login()
    {
//dd(1);
        $client = new Client();
        $client->setClientId('546492761530-96b9cc8io884vp269ubvlqtleufri678.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://localhost/google-auth');

//        $client->setScopes(['https://www.googleapis.com/auth/gmail.readonly']);
        $client->addScope('email');
//        $client->addScope('profile');

        return view('pages.auth.login', ['client' => $client]);
    }

    public function registration()
    {
        return view('pages.auth.registration', []);
    }

    public function handleRegistration(RegistrationRequest $request, AuthService $service)
    {
        $credentials = $request->only('user_name', 'email', 'password');
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
