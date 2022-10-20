<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\periode\PeriodeController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\coa\CoaController;
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
// Dashboard -->
Route::get('/bethelarea', [DashboardController::class,'dashboard']);
// Periode -->
Route::get('/periode', [PeriodeController::class,'periode']);
// user-->
Route::get('/user', [UserController::class,'user']);
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