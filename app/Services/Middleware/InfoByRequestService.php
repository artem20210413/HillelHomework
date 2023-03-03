<?php


namespace App\Services\Middleware;


use App\Facades\LocationFacade;
use Illuminate\Http\Request;

class InfoByRequestService
{


    public function __construct()
    {
    }

    public function info(Request $request)
    {
        $ip = LocationFacade::getIp($request);
        $country = LocationFacade::getCountry($request);
        $redirectService = new RedirectService();
        $redirect = $redirectService->redirect($request, $country);
        $saveInfoUser = new SaveInfoUserService();
        $saveInfoUser->save($ip, $country, $redirect);

        return redirect($redirect);
    }

}
