<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HobbyController;

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
    return 'connect api';
});

Route::get('/user', [UserController::class, 'list']);
Route::get('/user/info/{id}', [UserController::class, 'info']);
Route::post('/user/add', [UserController::class, 'add']);
Route::post('/user/edit', [UserController::class, 'edit']);
Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/register', [UserController::class, 'register']);
Route::get('/user/hobby/{id}', [UserController::class, 'hobby']);

Route::post('/hobby/add', [HobbyController::class, 'add']);
Route::get('/hobby/list', [HobbyController::class, 'list']);
Route::get('/hobby/list_active', [HobbyController::class, 'list_active']);
Route::get('/hobby/info/{id}', [HobbyController::class, 'info']);
Route::post('/hobby/edit', [HobbyController::class, 'edit']);
