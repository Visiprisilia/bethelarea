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
Route::get('/bethelarea', [DashboardController::class,'dashboard']);
Route::get('/periode', [PeriodeController::class,'periode']);
Route::get('/user', [UserController::class,'user']);
Route::get('/coa', [CoaController::class,'coa']);
Route::get('/unit', [UnitController::class,'unit']);
