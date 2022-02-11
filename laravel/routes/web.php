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

Route::get('welcome', [\App\Http\Controllers\Controller::class, 'index'])->name("welcome");

//Route::any('admin', [\App\Http\Controllers\Controller::class, 'admin'])->name("admin");

Route::any('sonuc', [\App\Http\Controllers\Controller::class, 'sonuc'])->name("sonuc");
