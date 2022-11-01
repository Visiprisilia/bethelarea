<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengguna\LoginController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\periode\PeriodeController;
use App\Http\Controllers\pengguna\UserController;
use App\Http\Controllers\coa\CoaController;
use App\Http\Controllers\pegawai\PegawaiController;
use App\Http\Controllers\pengajuan\PengajuanController;
use App\Http\Controllers\unit\UnitController;
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
// Login-->
Route::get('/bethelarea', function (){
    return view('pengguna/login');
})->name('login');

Route::get('/registrasi', [LoginController::class,'registrasi']);
Route::post('/simpanregistrasi', [LoginController::class,'simpanregistrasi']);
Route::post('/postlogin', [LoginController::class,'postlogin']);
Route::get('/logout', [LoginController::class,'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:super admin']], function(){
// Dashboard -->
Route::get('/dashboard', [DashboardController::class,'dashboard']);
// Periode -->
Route::get('/periode', [PeriodeController::class,'periode']);
Route::get('/tambahperiode', [PeriodeController::class,'tambahperiode']);
Route::post('/simpanperiode', [PeriodeController::class,'simpanperiode']);
Route::get('/editperiode/{kode_periode}', [PeriodeController::class,'editperiode']);
Route::post('/updateperiode/{kode_periode}', [PeriodeController::class,'updateperiode']);
Route::get('/hapusperiode/{kode_periode}', [PeriodeController::class,'hapusperiode']);
// user-->
Route::get('/user', [UserController::class,'user']);
// profile-->
Route::get('/editprofile/{id}', [UserController::class,'editprofile']);
// coa -->
Route::get('/coa', [CoaController::class,'coa']);
Route::get('/tambahcoa', [CoaController::class,'tambahcoa']);
Route::post('/simpancoa', [CoaController::class,'simpancoa']);
Route::get('/editcoa/{kode_akun}', [CoaController::class,'editcoa']);
Route::post('/updatecoa/{kode_akun}', [CoaController::class,'updatecoa']);
Route::get('/hapuscoa/{kode_akun}', [CoaController::class,'hapuscoa']);
// unit -->
Route::get('/unit', [UnitController::class,'unit']);
Route::get('/tambahunit', [UnitController::class,'tambahunit']);
Route::post('/simpanunit', [UnitController::class,'simpanunit']);
Route::get('/editunit/{kode_unit}', [UnitController::class,'editunit']);
Route::post('/updateunit/{kode_unit}', [UnitController::class,'updateunit']);
Route::get('/hapusunit/{kode_unit}', [UnitController::class,'hapusunit']);
// pegawai -->
Route::get('/pegawai', [PegawaiController::class,'pegawai']);
Route::get('/tambahpegawai', [PegawaiController::class,'tambahpegawai']);
Route::post('/simpanpegawai', [PegawaiController::class,'simpanpegawai']);
Route::get('/editpegawai/{kode_pegawai}', [PegawaiController::class,'editpegawai']);
Route::post('/updatepegawai/{kode_pegawai}', [PegawaiController::class,'updatepegawai']);
Route::get('/hapuspegawai/{kode_pegawai}', [PegawaiController::class,'hapuspegawai']);
});
Route::group(['middleware' => ['auth', 'ceklevel:super admin,pegawai']], function(){
Route::get('/dashboard', [DashboardController::class,'dashboard']);
//pengajuan
Route::get('/pengajuan', [PengajuanController::class,'pengajuan']);
Route::get('/tambahpengajuan', [PengajuanController::class,'tambahpengajuan']);
Route::post('/simpanpengajuan', [PengajuanController::class,'simpanpengajuan']);
Route::get('/editpengajuan/{kode_pengajuan}', [PengajuanController::class,'editpengajuan']);
Route::post('/updatepengajuan/{kode_pengajuan}', [PengajuanController::class,'updatepengajuan']);
Route::get('/hapuspengajuan/{kode_pengajuan}', [PengajuanController::class,'hapuspengajuan']);

});