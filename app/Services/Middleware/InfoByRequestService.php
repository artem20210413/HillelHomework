<?php


namespace App\Services\Middleware;


use App\Facades\LocationFacade;
use Illuminate\Http\Request;

class InfoByRequestService
{

    public RedirectService $redirectService;
    public SaveInfoUserService $saveInfoUserService;

    public function __construct()
    {
        $this->redirectService = new RedirectService();
        $this->saveInfoUserService = new SaveInfoUserService();
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
