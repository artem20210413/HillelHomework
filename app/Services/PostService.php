<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Teg;

class PostService
{
    public function show()
    {
        $posts = Post::with('category')->with('teg')->get();

        return ['posts' => $posts];
    }

    public function createShow()
    {
        $posts = new Post();
        $tags = Teg::all();

        return ['posts' => $posts, 'tags' => $tags];
    }

}
