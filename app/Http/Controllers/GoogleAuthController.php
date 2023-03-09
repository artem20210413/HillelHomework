<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use App\Services\GoogleOauthService;
use Google\Client;
use Google\Service\Oauth2;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class GoogleAuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function auth(Request $request)
    {
        if ((new GoogleOauthService())->getUserInfo($request)) {

            return redirect(route('admin'));
        }

        return redirect(route('login'))->with('errorLogin', 'Login details are not valid');;
    }

}
