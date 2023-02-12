<?php

namespace App\Http\Controllers;

use App\Models\Categor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoriesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show(){


 $category = Categor::all();
// dd($category->toArray());
return view('pages.list-categories', ['category' => $category]);
    }
}
