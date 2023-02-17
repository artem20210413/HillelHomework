<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CategoriesController;
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


Route::get('login', [LoginService::class, 'show'])->name('login');


Route::get('list-categories', [CategoriesController::class, 'show']);
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
