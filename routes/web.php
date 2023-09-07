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

Route::get('/usjs', [App\Http\Controllers\UsjController::class, 'index'])->name('usjs');
Route::post('/usj', [App\Http\Controllers\UsjController::class, 'store'])->name('usj');
Route::delete('/usj/{usj}', [App\Http\Controllers\UsjController::class, 'destroy'])->name('usj/{usj}');