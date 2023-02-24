<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoriesService;
use App\Models\Categor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoriesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show(CategoriesService $service)
    {
        $response = $service->show();
        $response['successMessage'] = session('successMessage');
        $response['errorMessage'] = session('errorMessage');

        return view('pages.list-categories', $response);
    }

    public function createShow(CategoriesService $service)
    {
        return view('pages.create-categories');
    }

    public function create(CategoryRequest $request, CategoriesService $service)
    {
        $name = $request->name;
        $service->create($name);

        return redirect(route('list-categories'));
    }

    public function updateShow(Categor $category, CategoriesService $service)
    {
        return view('pages.update-categories', $service->updateShow($category));
    }

    public function update($id, CategoryRequest $request, CategoriesService $service)
    {
        $name = $request->name;
        $service->update($id, $name);

        return redirect(route('list-categories'));
    }


    public function delete(Categor $category, CategoriesService $service)
    {
        $service->delete($category);

        return redirect(route('list-categories'));
    }
}
