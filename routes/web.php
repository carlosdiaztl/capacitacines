<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::resource('/capacitaciones', App\Http\Controllers\CapacitacionController::class)->names('capacitaciones');
route::resource('/reservas', App\Http\Controllers\ReservaController::class)->names('reservas')->except('store');
Route::post('/capacitaciones/{capacitacion}', [App\Http\Controllers\ReservaController::class, 'store'])->name('reservas.store');
