<?php

namespace App;

use Example\Psr4AutoloaderClass;

require_once "autoloader.php";

$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('App\\', '././src');