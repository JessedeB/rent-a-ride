<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

//The login view
Route::view('login', 'auth.login')->name('login');

//Assign blade templates without needing a controller
Route::view('/', 'index')->name('index');

//Assign routes ONLY when a user is logged in
Route::middleware('auth')->group(function() {
    Route::view('home', 'home');
});
