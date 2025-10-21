<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;


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

Route::get('/', [CarController::class, 'index']);
Route::get('/cars', [CarController::class, 'index'])->name('cars');
Route::get('/manufacturers', [ManufacturerController::class, 'index']);
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/show/{id}', [CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::post('/cars/{id}/edit', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{id}', [CarController::class, 'delete'])->name('cars.delete');
Route::get('/manufacturers/create', [ManufacturerController::class, 'create'])->name('manufacturers.create');
Route::post('/manufacturers/create', [ManufacturerController::class, 'store'])->name('manufacturers.store');