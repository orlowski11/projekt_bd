<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\usercontroller::class, 'search']);
Route::get('/users/{slug}', [App\Http\Controllers\usercontroller::class, 'show'])->name('user');

Route::get('/film', [App\Http\Controllers\filmcontroller::class, 'search']);
Route::get('/film/{slug}', [App\Http\Controllers\filmcontroller::class, 'show'])->name('film');

Route::get('/adminpanel', [App\Http\Controllers\admincontroller::class, 'show']);
