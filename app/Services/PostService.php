<?php

namespace App\Services;

use App\Models\Categor;
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
        $post = new Post();
        $tags = Teg::all();
        $category = Categor::all();

        return ['post' => $post, 'tags' => $tags, 'category' => $category];
    }

    public function create($category_id, $header, $comment, $tags)
    {
        $post = new Post();
        $post->category_id = $category_id;
        $post->header = $header;
        $post->comment = $comment;
        $post->save();

        if ($tags != []) {
            foreach ($tags as $kay => $el) {
                $post->teg()->attach(Teg::find($kay));
            }
        }
        $post->save();
    }

    public function update($post, $category_id, $header, $comment, $tags)
    {
        $post->category_id = $category_id;
        $post->header = $header;
        $post->comment = $comment;
        $post->save();

        foreach ($post->teg as $el) {
            $post->teg()->detach($el);
        }

        if ($tags != []) {
            foreach ($tags as $kay => $el) {
                $post->teg()->attach(Teg::find($kay));
            }
        }
        $post->save();
    }

    public function updateShow(Post $post)
    {
        $tags = Teg::all();
        $category = Categor::all();

        return ['post' => $post, 'tags' => $tags, 'category' => $category];
    }

    public function delete(Post $post)
    {
        foreach ($post->teg as $el) {
            $post->teg()->detach($el);
        }
        $post->delete();
    }


}
