<?php
declare(strict_types=1);


use Artem\HillelHomework\User;

require_once __DIR__ . "./vendor/autoload.php";

try {


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




} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}


