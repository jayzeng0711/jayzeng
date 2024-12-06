<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return '<h1>About Page</h1>';
})->name('aaa');

Route::get('contact', function () {
    return '<h1>Contact Page</h1>';
});


Route::get('contact/{id}', function ($id) {
    return $id;
})->name('edit-contact');

Route::post('/home', [HomeController::class, 'index']);