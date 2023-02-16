<?php

namespace App\Services;

use App\Models\Categor;
use Illuminate\Http\Request;

class CategoriesService
{
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
