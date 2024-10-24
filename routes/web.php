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

Route::get('/listado-de-servicios', function () {
    return view('welcome');
});
Route::get('/detalle-del-servicio', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('municipality')->group(function () {
    Route::get('/list', [App\Http\Controllers\MunicipalityController::class, 'list']);
});

Route::prefix('category')->group(function () {
    Route::get('/list', [App\Http\Controllers\CategoryController::class, 'list']);
});

Route::prefix('business')->group(function () {
    Route::get('/list', [App\Http\Controllers\BusinessController::class, 'list']);
});

Route::prefix('schedule')->group(function () {
    Route::get('/list', [App\Http\Controllers\ScheduleController::class, 'list']);
    Route::post('/store', [App\Http\Controllers\ScheduleController::class, 'store']);
});