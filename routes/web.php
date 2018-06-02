<?php

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

Route::post('usuarios/updateStatus', 'UsuarioCtrl@updateStatus');
Route::resource('usuarios', 'UsuarioCtrl');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::prefix('auth')->group(function () {
    Route::post('/', ['uses' => 'AuthCtrl@login']);
    Route::get('home', ['middleware' => 'auth', 'uses' => 'AuthCtrl@home'])->name('auth.home');
    Route::get('logout', ['uses' => 'AuthCtrl@logout'])->name('logout');
});
