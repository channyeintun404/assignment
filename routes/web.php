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

Route::get('/home', [App\Http\Controllers\MasterController::class, 'index'])->name('home');
Route::post('/masters/store', [App\Http\Controllers\MasterController::class, 'store'])->name('store');
Route::post('/masters/update',  [App\Http\Controllers\MasterController::class, 'update'])->name('update');
Route::post('/masters/destory', [App\Http\Controllers\MasterController::class, 'destroy'])->name('delete');

Route::resource('master', '\App\Http\Controllers\MasterController');
