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

use App\Http\Controllers\QuadraticController;

Route::get('/', [QuadraticController::class, 'index'])->name('quadratic.index');
Route::get('/history', [QuadraticController::class, 'history'])->name('quadratic.history');
Route::post('/solve', [QuadraticController::class, 'solve'])->name('quadratic.solve');
Route::delete('/history/{id}', [QuadraticController::class, 'destroy'])->name('quadratic.destroy');
