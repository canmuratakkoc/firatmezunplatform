<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;

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

Route::get('/giris', [UserController::class, 'kontrol']);
Route::get('/', [PagesController::class, 'kontrol']);
Route::post('/', [UserController::class, 'kullanici']);
Route::post('/', [UserController::class, 'kullanici']);
Route::post('/kayit', [UserController::class, 'kullanici']);

Route::get('/kayit', function () {
    return view('user.uye');
});

Route::get('/profil/{id}', function ($id) {
    return view('feed.profil')->withTitle($id);
});
