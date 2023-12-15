<?php

use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
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
})->name('home');
Route::prefix('/rombel')->name('rombel.')->group(function() {
    Route::get('/create', [RombelController::class, 'create'])->name('create');
    Route::post('/store', [RombelController::class, 'store'])->name('store');
    Route::get('/', [RombelController::class, 'index'])->name('index');
    Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
    Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
});

// Route::prefix('/siswa')->name('siswa.')->group(function() {
//     Route::get('/create', [SiswaController::class, 'create'])->name('create');
//     Route::post('/store', [SiswaController::class, 'store'])->name('store');
//     Route::get('/', [SiswaController::class, 'index'])->name('index');
//     Route::get('/{id}', [SiswaController::class, 'edit'])->name('edit');
//     Route::patch('/{id}', [SiswaController::class, 'update'])->name('update');
//     Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('delete');
// });