<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show(PostService $service)
    {
        $response = $service->show();

        return view('pages.list-posts', $response);
    }

    public function createShow(PostService $service)
    {
        $response = $service->createShow();

        return view('pages.create-update-posts', $response);
    }

}
