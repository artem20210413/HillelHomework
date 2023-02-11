<?php

namespace App\Http\Controllers;


use App\Models\Categor;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(){


        $c = new Categor();

        $c->name = "ff";
        $c->save();


        dd(Categor::all()->toArray());
    }
}
