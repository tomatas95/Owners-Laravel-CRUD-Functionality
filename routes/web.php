<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
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

Route::resource('/owners', OwnerController::class);
Route::post('/ownerss', [OwnerController::class, 'search'])->name('owners.search');

Route::resource('/cars', CarController::class);
Route::post('/carss', [CarController::class, 'search'])->name('cars.search');

// Route::get('/', function(){
//     return view('index');
// });
