<?php

namespace App\Http\Controllers;

use App\Models\Teg;
use App\Services\TegService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TegController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show(TegService $service)
    {
        return $service->show();
    }

    public function createShow()
    {

        return view('pages.create-teg');
    }


    public function create(Request $request, TegService $service)
    {

        return $service->create($request);
    }


    public function updateShow(Teg $teg, TegService $service)
    {

        return $service->updateShow($teg);
    }

    public function update(Teg $teg, Request $request, TegService $service)
    {

        return $service->update($teg, $request);
    }

    public function delete(Teg $teg, TegService $service)
    {

        return $service->delete($teg);
    }

}
