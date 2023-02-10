<?php
//declare(strict_types=1);

require_once "./vendor/autoload.php";
require_once "./db_config.php";

use App\Model\Categor;
use App\Model\Post;
use App\Model\Teg;


const countCategories = 5;
const countPosts = 10;
const countTegs = 5;

for ($i = 1; $i <= countCategories; $i++) {
    $category = new Categor();
    $category->name = "category_$i";
    $category->save();
}


$category = Categor::find(rand(1, countCategories - 1));
$category->name = "{$category->name}_update";
$category->save();

$category = Categor::find(countCategories);
$category->delete();

for ($i = 1; $i <= countPosts; $i++) {
    $post = new Post();
    $post->category_id = rand(1, countCategories - 1);
    $post->header = "header post_$i";
    $post->comment = "comment post_$i";
    $post->save();
}

$post = Post::find(rand(1, countCategories - 1));
$post->category_id = rand(1, countCategories - 1);
$post->header = "header post_$i";
$post->comment = "comment post_$i";

$post = Post::find(countPosts);
$post->delete();


for ($i = 1; $i <= countTegs; $i++) {
    $teg = new Teg();
    $teg->name = "teg_$i";
    $teg->save();
}

foreach (Post::all() as $el) {
    var_dump($el->teg()->count());
    for ($i = 1; $i <= 3; $i++) {
        $teg = Teg::find(rand(1, countTegs));
        $el->teg()->attach($teg);
    }
    var_dump($el->teg()->count());
}









