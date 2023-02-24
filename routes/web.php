<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TegController;
use App\Services\LoginService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/registration', [AuthController::class, 'registration']);
    Route::post('/login', [AuthController::class, 'handleLogin']);
    Route::post('/registration', [AuthController::class, 'handleRegistration']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('admin', [AdministratorController::class, 'show'])->name('admin');

    Route::group(['prefix' => 'admin/'], function () {
        Route::get('create-categories', [CategoriesController::class, 'createShow']);
        Route::post('create-categories', [CategoriesController::class, 'create']);
        Route::get('update-categories/{category}', [CategoriesController::class, 'updateShow']);
        Route::post('update-categories/{id}', [CategoriesController::class, 'update']);
        Route::post('delete-categories/{category}', [CategoriesController::class, 'delete']);

        Route::get('create-teg', [TegController::class, 'createShow']);
        Route::post('create-teg', [TegController::class, 'create']);
        Route::get('update-teg/{teg}', [TegController::class, 'updateShow']);
        Route::post('update-teg/{teg}', [TegController::class, 'update']);
        Route::post('delete-teg/{teg}', [TegController::class, 'delete']);

        Route::get('create-post', [PostController::class, 'createShow']);
        Route::post('create-post', [PostController::class, 'create']);
        Route::get('update-post/{post}', [PostController::class, 'updateShow']);
        Route::post('update-post/{post}', [PostController::class, 'update']);
        Route::post('delete-post/{post}', [PostController::class, 'delete']);
    });
});

Route::get('list-categories', [CategoriesController::class, 'show'])->name('list-categories');
Route::get('list-tags', [TegController::class, 'show'])->name('list-tags');
Route::get('list-posts', [PostController::class, 'show'])->name('list-posts');



//Route::resources([
//    'categories' => CategoriesController::class,
//]);





