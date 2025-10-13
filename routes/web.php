<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuDBHelperController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menu', MenuController::class);
Route::resource('transaksi', TransaksiController::class);
Route::view('/home', 'home')->name('home');
Route::get('/menu/dbhelper/show', [MenuDBHelperController::class, 'index'])->name('dbhelper.index');
Route::post('/menu/dbhelper', [MenuDBHelperController::class, 'store'])->name('dbhelper.store');
Route::put('/menu/dbhelper/{id}', [MenuDBHelperController::class, 'update'])->name('dbhelper.update');
Route::delete('/menu/dbhelper/{id}', [MenuDBHelperController::class, 'destroy'])->name('dbhelper.destroy');
