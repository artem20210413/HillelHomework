<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'hillel',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


//Capsule::schema()->dropAllTables();
//
//
//Capsule::schema()->create('category', function ($table) {
//    $table->id();
//    $table->string('name',100);
//    $table->tinyInteger('active')->default(1);
//    $table->timestamps();
//});
//
//Capsule::schema()->create('post', function ($table) {
//    $table->id();
//    $table->unsignedBigInteger('category_id');
//    $table->string('header',191);
//    $table->string('comment',1000);
//    $table->timestamps();
//
//
//    $table->foreign('category_id')
//        ->references('id')
//        ->on('category')
//        ->onDelete('restrict');
//});
//
//
//
//Capsule::schema()->create('tag', function ($table) {
//    $table->id();
//    $table->string('name',191);
//    $table->timestamps();
//});
//
//Capsule::schema()->create('post_tag', function ($table) {
//    $table->id();
//    $table->unsignedBigInteger('category_id');
//    $table->unsignedBigInteger('tag_id');
//    $table->timestamps();
//
//
//    $table->foreign('category_id')
//        ->references('id')
//        ->on('category')
//        ->onDelete('restrict');
//
//    $table->foreign('tag_id')
//        ->references('id')
//        ->on('tag')
//        ->onDelete('restrict');
//});





