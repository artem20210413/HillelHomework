<?php


namespace App\Services\Middleware;


use App\Facades\LocationFacade;
use Illuminate\Http\Request;

class InfoByRequestService
{


    public function __construct(public RedirectService $redirectService, public SaveInfoUserService $saveInfoUserService)
    {
    }

    public function info(Request $request)
    {
        $ip = LocationFacade::getIp($request);
        $country = LocationFacade::getCountry($request);
        $redirect = $this->redirectService->redirect($request, $country);
        $this->saveInfoUserService->save($ip, $country, $redirect);

        return redirect($redirect);
    }

}
