<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
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
Auth::routes();
Route::get('/', function () {
    return view('landing');
});
Route::get('/after-register', function () {
    return view('layouts.after-regis');
});
Route::get('/access-denied', function () {
    return view('layouts.accses-denied');
});
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::resource('guru', GuruController::class)->middleware('peran:admin-guru');
Route::resource('jadwal', JadwalController::class)->middleware('peran:guru-siswa');
Route::resource('kelas', KelasController::class)->middleware('peran:guru');
Route::resource('presensi', PresensiController::class)->middleware('peran:guru-siswa');
Route::resource('siswa', SiswaController::class)->middleware('peran:guru');
Route::resource('management', UsersController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');

Route::get('generate-pdf',[JadwalController::class,'generatePDF'])->middleware('auth');
Route::get('jadwalpdf',[JadwalController::class,'jadwalPDF'])->middleware('peran:admin-guru');
Route::get('presensipdf',[PresensiController::class,'presensiPDF'])->middleware('peran:admin-guru');
Route::get('siswa-excel',[SiswaController::class,'SiswaExcel'])->middleware('peran:admin-guru');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/api-siswa', [SiswaController::class, 'apiSiswa']);
Route::get('/api-detailSiswa/{id}', [SiswaController::class, 'apiDetailSiswa']);

