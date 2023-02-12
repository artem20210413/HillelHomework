<?php

namespace App\Http\Controllers;

use App\Models\Categor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoriesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show()
    {
        $category = Categor::all();

        return view('pages.list-categories', ['category' => $category]);
    }

    public function createShow()
    {
        return view('pages.create-categories');
    }

    public function create(Request $request)
    {
        $category = new Categor();
        $category->name = $request->name;
        $category->save();

        return redirect('list-categories');
    }

    public function updateShow(Categor $category)
    {
        return view('pages.update-categories', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        $category = Categor::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect('list-categories');
    }





    public function delete(Categor $categor)
    {
        $categor->delete();

        return redirect('list-categories');
    }
}
