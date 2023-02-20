<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('post', PostController::class);

Route::get('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/actionlogin', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

// google
Route::get('/auth/redirect', [AuthController::class,'redirectToProvider']);
Route::get('/auth/callback', [AuthController::class,'handleProviderCallback']);