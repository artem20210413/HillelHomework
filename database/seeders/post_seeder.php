<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class post_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= config('const.countPosts '); $i++) {
            $post = new Post();
            $post->category_id = rand(1, config('const.countCategories') - 1);
            $post->header = "header post_$i";
            $post->comment = "comment post_$i";
            $post->save();
        }
    }
}
