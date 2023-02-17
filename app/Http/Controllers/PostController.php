<?php

namespace App\Http\Controllers;

use App\Http\Requests\TegRequest;
use App\Models\Teg;
use App\Services\TegService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show()
    {

        return view('pages.list-posts', []);
    }


}
