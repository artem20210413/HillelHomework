<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use App\Models\Categor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoriesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show(CategoriesService $service)
    {
        return view('pages.list-categories', $service->show());
    }

    public function createShow(CategoriesService $service)
    {

        return view('pages.create-categories');
    }

    public function create(Request $request, CategoriesService $service)
    {
        $name = $request->name;

        $service->create($name);

        return redirect('list-categories');
    }

    public function updateShow(Categor $category, CategoriesService $service)
    {

        return view('pages.update-categories', $service->updateShow($category));
    }

    public function update($id, Request $request, CategoriesService $service)
    {
        $name = $request->name;

        $service->update($id, $name);

        return redirect('list-categories');
    }


    public function delete(Categor $categor, CategoriesService $service)
    {
        $service->delete($categor);

        return redirect('list-categories');
    }
}
