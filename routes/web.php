<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PembeliController;
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
Route::get('/', [GroupController::class,'index'])->name('group.index');
Route::get('/pembeli', [PembeliController::class,'index'])->name('barang.index');
Route::get('/mahasiswa', [MahasiswaController::class,'index'])->name('mahasiswa.index');

