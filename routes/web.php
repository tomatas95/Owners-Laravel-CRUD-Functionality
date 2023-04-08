<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarImageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OwnerController;
use App\Models\CarImage;

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
//
// Route::middleware(['auth', 'super.permissions'])->group(function () {
//     Route::resource('owners', OwnerController::class)->except(['create', 'edit', 'update']);
//     Route::resource('cars', CarController::class)->except(['create', 'edit', 'update']);
//     Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');
//     Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::resource('owners', OwnerController::class)->only(['create']);
//     Route::resource('cars', CarController::class)->only(['create']);
// });

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class);

Route::post('/owners/search', [OwnerController::class, 'search'])->name('owners.search');
Route::post('/cars/search', [CarController::class, 'search'])->name('cars.search');
Route::get('/', function(){
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/setLanguage/{language}', [LanguageController::class,'setLanguage'])->name('setLanguage');
Route::delete('/carImages/{id}', [CarImageController::class, 'destroy'])->name('carImages.destroy');
