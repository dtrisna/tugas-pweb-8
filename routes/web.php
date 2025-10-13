<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuDBHelperController;
use App\Http\Controllers\qb\MenuQueryBuilderController;

Route::get('/', function () {
    return view('home');
});

Route::resource('menu', MenuController::class);
Route::resource('transaksi', TransaksiController::class);
Route::view('/home', 'home')->name('home');
Route::get('/menu/dbhelper/show', [MenuDBHelperController::class, 'index'])->name('dbhelper.index');
Route::post('/menu/dbhelper', [MenuDBHelperController::class, 'store'])->name('dbhelper.store');
Route::put('/menu/dbhelper/{id}', [MenuDBHelperController::class, 'update'])->name('dbhelper.update');
Route::delete('/menu/dbhelper/{id}', [MenuDBHelperController::class, 'destroy'])->name('dbhelper.destroy');
Route::get('/menu/dbhelper/create', [MenuDBHelperController::class, 'create'])->name('dbhelper.create');
Route::get('/menu/dbhelper/manage', [MenuDBHelperController::class, 'manage'])->name('dbhelper.manage');
Route::get('/menu/dbhelper/{id}/edit', [MenuDBHelperController::class, 'edit'])->name('dbhelper.edit');


//query builder
Route::get('/menu/querybuilder/manage', [MenuQueryBuilderController::class, 'manage'])->name('querybuilder.manage');
Route::post('/menu/querybuilder', [MenuQueryBuilderController::class, 'store'])->name('querybuilder.store');
Route::get('/menu/querybuilder/{id}/edit', [MenuQueryBuilderController::class, 'edit'])->name('querybuilder.edit');
Route::put('/menu/querybuilder/{id}', [MenuQueryBuilderController::class, 'update'])->name('querybuilder.update');
Route::delete('/menu/querybuilder/{id}', [MenuQueryBuilderController::class, 'destroy'])->name('querybuilder.destroy');