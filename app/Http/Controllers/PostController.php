<?php

namespace App\Http\Controllers;

use App\Facades\LocationFacade;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\LocationInterface;
use App\Services\PostService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Gate;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show(PostService $service, Request $request)
    {
//        dd(LocationFacade::getCountry($request), LocationFacade::getCity($request), LocationFacade::getPostalCode($request));
        $response = $service->show();
        $response['successMessage'] = session('successMessage');

        return view('pages.list-posts', $response);
    }

    public function createShow(PostService $service)
    {
        $response = $service->createShow();
        return view('pages.create-update-post', $response);
    }

    public function create(PostRequest $request, PostService $service)
    {
        $category_id = $request->category_id;
        $header = $request->header;
        $comment = $request->comment;
        $tags = $request->tags;
        $service->create($category_id, $header, $comment, $tags);

        return redirect(route('list-posts'));
    }

    public function updateShow(Post $post, PostService $service)
    {
        $response = Gate::inspect('view', $post);
        if (!$response->allowed())
            return redirect(route('list-posts'));
        $response = $service->updateShow($post);
        return view('pages.create-update-post', $response);
    }

    public function update(Post $post, PostRequest $request, PostService $service)
    {
        $category_id = $request->category_id;
        $header = $request->header;
        $comment = $request->comment;
        $tags = $request->tags;
        $service->update($post, $category_id, $header, $comment, $tags);

        return redirect(route('list-posts'));
    }

    public function delete(Post $post, PostService $service)
    {
        $service->delete($post);
        return redirect(route('list-posts'));
    }

}
