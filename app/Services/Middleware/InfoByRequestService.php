<?php


namespace App\Services\Middleware;


use App\Facades\LocationFacade;

class InfoByRequestService
{

    public function __construct(public RedirectService $redirectService, public SaveInfoUserService $saveInfoUserService)
    {
    }

    public function info($request)
    {
        $ip = LocationFacade::getRandomIp($request);
        $country = LocationFacade::getCountry($ip);
        $redirect = $this->redirectService->redirect($country);
        $this->saveInfoUserService->save($ip, $country, $redirect);

//        return redirect($redirect);
    }

}
