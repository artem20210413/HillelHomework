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

Route::group(['middleware' => 'auth'], function () {
    Route::get('administrator', [AdministratorController::class, 'show']);
});


//Route::get('login', [LoginService::class, 'show'])->name('login');


//Route::resources([
//    'categories' => CategoriesController::class,
//]);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin']);

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('create-categories', [CategoriesController::class, 'createShow']);
Route::post('create-categories', [CategoriesController::class, 'create']);
Route::get('update-categories/{category}', [CategoriesController::class, 'updateShow']);
Route::post('update-categories/{id}', [CategoriesController::class, 'update']);
Route::post('delete-categories/{categor}', [CategoriesController::class, 'delete']);

Route::get('list-tags', [TegController::class, 'show']);
Route::get('create-teg', [TegController::class, 'createShow']);
Route::post('create-teg', [TegController::class, 'create']);
Route::get('update-teg/{teg}', [TegController::class, 'updateShow']);
Route::post('update-teg/{teg}', [TegController::class, 'update']);
Route::post('delete-teg/{teg}', [TegController::class, 'delete']);

Route::get('list-posts', [PostController::class, 'show']);
Route::get('create-post', [PostController::class, 'createShow']);
Route::post('create-post', [PostController::class, 'create']);
Route::get('update-post/{post}', [PostController::class, 'updateShow']);
Route::post('update-post/{post}', [PostController::class, 'update']);
Route::post('delete-post/{post}', [PostController::class, 'delete']);
