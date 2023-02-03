<?php
declare(strict_types=1);



//require_once __DIR__ . "./../vendor/autoload.php"; public
use Artem\HillelHomework\c;

require_once __DIR__ . "./vendor/autoload.php";

try {
    $c = new c();

} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}


