<?php


namespace App\Services\Middleware;


use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class RedirectService
{

    public function __construct()
    {
    }

    public function redirect(Request $request, string $country)
    {
//        $userAgent = $request->header('User-Agent');

        //https://github.com/jenssegers/agent
        //composer require jenssegers/agent
        $agent = new Agent();
//        $browser = $agent->browser();
//        $version = $agent->version($browser);
        $platform = $agent->platform();

        if ($platform === 'Apple' && $country === 'USA') {
            return 'https://www.amazon.com/';
        } else if ($platform === 'Linux' && $country === 'UK') {
            return 'https://www.moyo.co.za/';
        } else if ($platform === 'Windows' && $country === 'India') {
            return 'https://www.alibaba.com/';
        } else if ($country === 'Ukraine') {
            return 'https://rozetka.com.ua/ua/';
        } else {
            return 'https://atb.ua/';
        }


    }
}
