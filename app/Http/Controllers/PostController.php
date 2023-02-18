<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
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
        session()->flash('successMessage', "Successfully create");

        return redirect('list-posts');
    }

    public function updateShow(Post $post, PostService $service)
    {
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
        session()->flash('successMessage', "Successfully update id: $post->id");

        return redirect('list-posts');
    }

    public function delete(Post $post, PostService $service)
    {
        $service->delete($post);
        session()->flash('successMessage', "Successfully delete id: $post->id");

        return redirect('list-posts');
    }

}