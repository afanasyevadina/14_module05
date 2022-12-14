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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::post('/application', [\App\Http\Controllers\ApplicationController::class, 'store'])->name('application');

Route::get('/joblist', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('joblist');
Route::get('/joblist/create', [\App\Http\Controllers\Admin\JobController::class, 'create'])->name('joblist.create');
Route::post('/joblist/create', [\App\Http\Controllers\Admin\JobController::class, 'store'])->name('joblist.create');
