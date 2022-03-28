<?php

use App\Http\Controllers\CarModelController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/saved-cars', [App\Http\Controllers\HomeController::class, 'savedCars'])->name('cars.saved');
Route::post('/cars', [CarModelController::class, 'store'])->name('cars.store');
Route::post('/save-car', [CarModelController::class, 'saveCarToUser'])->name('cars.save-to-user');
Route::delete('/unsave-car/{id}', [CarModelController::class, 'unsaveCarFromUser'])->name('cars.destroy-saved');
Route::get('/cars', [CarModelController::class, 'index'])->name('cars.index');
Route::put('/cars/{id}', [CarModelController::class, 'update'])->name('cars.update');
