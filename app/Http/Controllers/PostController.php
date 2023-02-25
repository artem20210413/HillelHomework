<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Images;
use App\Models\Post;
use App\Models\User;
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
//        $post = Post::find(1);
//        $images = new Images();
//        $images->url = 'urlAddressPost';
//        $post->images()->save($images);
//
//        $user = User::find(1);
//        $images = new Images();
//        $images->url = 'urlAddressUser';
//        $user->images()->save($images);


//        $post = Post::find(1);
//        $user = User::find(1);
//        dd($post->images()->first()->toArray(), $user->images->toArray());
//
//dd('success');

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
