<?php
declare(strict_types=1);


use Artem\HillelHomework\Blog;
use Artem\HillelHomework\User;

require_once __DIR__ . "./vendor/autoload.php";

$user1 = User::find(1);
$user1->name = 'Artem';
$user1->email = 'artem@gmail.com';
$user1->save();
$user1->delete();

$userNew = new User();
$userNew->name = 'newArtem';
$userNew->email = 'new.artem@gmail.com';
$userNew->save();
$userNew->delete();

$blog1 = Blog::find(1);
$blog1->article_name = 'article_1';
$blog1->save();

$blog1 = new Blog();
$blog1->article_name = 'article_2';
$blog1->save();




