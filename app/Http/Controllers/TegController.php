<?php

namespace App\Http\Controllers;

use App\Http\Requests\TegRequest;
use App\Models\Teg;
use App\Services\TegService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TegController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show(TegService $service)
    {
        $response = $service->show();
        $response['successMessage'] = session('successMessage');
        $response['errorMessage'] = session('errorMessage');

        return view('pages.list-tags', $response);
    }

    public function createShow()
    {
        return view('pages.create-teg');
    }


    public function create(TegRequest $request, TegService $service)
    {
        $name = $request->name;
        $service->create($name);

        return redirect('list-tags');
    }


    public function updateShow(Teg $teg, TegService $service)
    {

        return view('pages.update-teg', $service->updateShow($teg));
    }

    public function update(Teg $teg, TegRequest $request, TegService $service)
    {
        $service->update($teg, $request);

        return redirect('list-tags');
    }

    public function delete(Teg $teg, TegService $service)
    {
        $service->delete($teg);

        return redirect('list-tags');
    }

}
