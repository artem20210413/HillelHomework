<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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

        $response = $service->show();
        $response['successMessage'] = session('successMessage');

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
        session()->flash('successMessage', "Successfully create");

        return redirect('list-categories');
    }

    public function updateShow(Categor $category, CategoriesService $service)
    {

        return view('pages.update-categories', $service->updateShow($category));
    }

    public function update($id, CategoryRequest $request, CategoriesService $service)
    {
        $name = $request->name;
        $service->update($id, $name);
        session()->flash('successMessage', "Successfully update id: $id");

        return redirect('list-categories');
    }


    public function delete(Categor $categor, CategoriesService $service)
    {
        $service->delete($categor);
        session()->flash('successMessage', "Successfully delete");

        return redirect('list-categories');
    }
}
