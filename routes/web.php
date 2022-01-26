<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Assign blade templates without needing a controller
Route::view('/', 'site.index')->name('index');
Route::view('about', 'site.about')->name('about');
Route::view('services', 'site.services')->name('services');
Route::view('pricing', 'site.pricing')->name('pricing');
Route::view('cars', 'site.cars')->name('cars');
Route::view('car-single', 'site.car-single')->name('car-single');
Route::view('blog', 'site.blog')->name('blog');
Route::view('blog-single', 'site.blog-single')->name('blog-single');
Route::view('contact', 'site.contact')->name('contact');

//Assign routes ONLY when a user is logged in
Route::middleware('auth')->group(function() {
    Route::view('home', 'dashboard.home')->name('home');

    //Example pages
    Route::view('cards', 'dashboard.examples.cards')->name('cards');
    Route::view('buttons', 'dashboard.examples.buttons')->name('buttons');
    Route::view('forms', 'dashboard.examples.forms')->name('forms');
    Route::view('icons', 'dashboard.examples.icons')->name('icons');
    Route::view('profile', 'dashboard.examples.profile')->name('profile');
    Route::view('tables', 'dashboard.examples.tables')->name('tables');

    //Roles & permissions
   Route::resource('roles', App\Http\Controllers\RoleController::class);
   Route::post('roles/{role}/{user_id}', [\App\Http\Controllers\RoleController::class, 'unassignRole'])->name('role.unassign');
});

