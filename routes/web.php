<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuDBHelperController;
use App\Http\Controllers\qb\MenuQueryBuilderController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('login.login');
});

// Route::resource('menu', MenuController::class);
use App\Http\Controllers\MenuKopiController;

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::resource('transaksi', TransaksiController::class);
Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::view('/home', 'home')->name('home');
Route::get('/menu/dbhelper/show', [MenuDBHelperController::class, 'index'])->name('dbhelper.index');
Route::post('/menu/dbhelper', [MenuDBHelperController::class, 'store'])->name('dbhelper.store');
Route::put('/menu/dbhelper/{id}', [MenuDBHelperController::class, 'update'])->name('dbhelper.update');
Route::delete('/menu/dbhelper/{id}', [MenuDBHelperController::class, 'destroy'])->name('dbhelper.destroy');
Route::get('/menu/dbhelper/create', [MenuDBHelperController::class, 'create'])->name('dbhelper.create');
Route::get('/menu/dbhelper/manage', [MenuDBHelperController::class, 'manage'])->name('dbhelper.manage');
Route::get('/menu/dbhelper/{id}/edit', [MenuDBHelperController::class, 'edit'])->name('dbhelper.edit');

Route::get('/menu/querybuilder/manage', [MenuQueryBuilderController::class, 'manage'])->name('querybuilder.manage');
Route::post('/menu/querybuilder', [MenuQueryBuilderController::class, 'store'])->name('querybuilder.store');
Route::get('/menu/querybuilder/{id}/edit', [MenuQueryBuilderController::class, 'edit'])->name('querybuilder.edit');
Route::put('/menu/querybuilder/{id}', [MenuQueryBuilderController::class, 'update'])->name('querybuilder.update');
Route::delete('/menu/querybuilder/{id}', [MenuQueryBuilderController::class, 'destroy'])->name('querybuilder.destroy');




Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::get('/home', [LoginController::class, 'home'])->name('home');

Route::get('/logout', function () {
    session()->forget('login');
    return redirect()->route('login.form');
})->name('logout');
