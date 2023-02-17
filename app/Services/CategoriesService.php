<?php

namespace App\Services;

use App\Models\Categor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoriesService
{
    public function show()
    {
        $category = Categor::all();

        return ['category' => $category];
    }

    public function create(string $name)
    {
        try {
            $category = new Categor();
            $category->name = $name;
            $category->save();

            return true;
        } catch (\Exception $e) {

            return false;
        }
    }

    public function updateShow(Categor $category)
    {
        return ['category' => $category];
    }

    public function update($id, $name)
    {
        $category = Categor::find($id);
        $category->name = $name;
        $category->save();

    }

    public function delete(Categor $categor)
    {
        $categor->delete();

    }
}
