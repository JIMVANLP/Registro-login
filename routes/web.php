<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function(){
    Route::view('/admin', 'auth.admin')->name('inicio.admin');
});
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::post('/login-two-factor/{user}','App\Http\Controllers\Auth\LoginController@login2FA')->name('login.2fa');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

