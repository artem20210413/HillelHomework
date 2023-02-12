<?php

namespace App\Http\Controllers;

use App\Models\Teg;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TegController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show()
    {
        $tags = Teg::all();

        return view('pages.list-tags', ['tags' => $tags]);
    }

    public function createShow()
    {

        return view('pages.create-teg');
    }

    public function create(Request $request)
    {
        $teg = new Teg();
        $teg->name = $request->name;
        $teg->save();

        return redirect('list-tags');
    }

    public function updateShow(Teg $teg)
    {

        return view('pages.update-teg', ['teg' => $teg]);
    }

    public function update(Teg $teg, Request $request)
    {
        $teg->name = $request->name;
        $teg->save();

        return redirect('list-tags');
    }

    public function delete(Teg $teg)
    {
        $teg->delete();

        return redirect('list-tags');
    }

}
