<?php

namespace App\Services;

use App\Models\Categor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CategoriesService
{
    public function show()
    {
        $category = Categor::all();

        return ['category' => $category];
    }

    public function create(string $name)
    {
        $category = new Categor();
        $category->name = $name;
        $category->save();
        session()->flash('successMessage', "Successfully create");
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
        session()->flash('successMessage', "Successfully update id: $id");
    }

    public function delete(Categor $categor)
    {
        $errors = 'Категорія пов`язана з постами: ';
        $isError = false;
        foreach ($categor->post()->get() as $el) {
            $isError = true;
            $errors .= "{$el->id}, ";
        }
        if ($isError) {
            Session()->flash('errorMessage', $errors);
        } else {
            $categor->delete();
            session()->flash('successMessage', "Successfully delete");
        }
    }
}
