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
        return $service->show();
    }

    public function createShow(CategoriesService $service)
    {

        return $service->createShow();
    }

    public function create(Request $request, CategoriesService $service)
    {

        return $service->create($request);
    }

    public function updateShow(Categor $category, CategoriesService $service)
    {
        return $service->updateShow($category);
    }

    public function update($id, Request $request, CategoriesService $service)
    {

        return $service->update($id, $request);
    }


    public function delete(Categor $categor, CategoriesService $service)
    {

        return $service->delete($categor);
    }
}
