<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengguna\LoginController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\periode\PeriodeController;
use App\Http\Controllers\pengguna\UserController;
use App\Http\Controllers\coa\CoaController;
use App\Http\Controllers\pegawai\PegawaiController;
use App\Http\Controllers\murid\MuridController;
use App\Http\Controllers\yayasan\KebijakanController;
use App\Http\Controllers\programkerja\ProgramKerjaController;
use App\Http\Controllers\programkerja\EvaluasiController;
use App\Http\Controllers\unit\UnitController;
use App\Http\Controllers\subunit\SubUnitController;
use App\Http\Controllers\realisasi\KasMasukController;
use App\Http\Controllers\realisasi\KasKeluarController;
use App\Http\Controllers\realisasi\KasBonController;
use App\Http\Controllers\bukubesar\BukuBesarKasController;
use App\Http\Controllers\bukubesar\BukuBesarAnggaranPendapatanController;
use App\Http\Controllers\bukubesar\BukuBesarAnggaranBiayaController;
use App\Http\Controllers\laporan\LaporanKasController;
use App\Http\Controllers\laporan\LaporanPAController;
use App\Http\Controllers\laporan\LaporanPKController;
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

//kebijakan
Route::get('/kebijakan', [KebijakanController::class,'kebijakan']);
Route::get('/tambahkebijakan', [KebijakanController::class,'tambahkebijakan']);
Route::post('/simpankebijakan', [KebijakanController::class,'simpankebijakan']);
Route::get('/editkebijakan/{kode_kebijakan}', [KebijakanController::class,'editkebijakan']);
Route::post('/updatekebijakan/{kode_kebijakan}', [KebijakanController::class,'updatekebijakan']);
Route::get('/hapuskebijakan/{kode_kebijakan}', [KebijakanController::class,'hapuskebijakan']);
Route::get('/download/{kode_kebijakan}', [KebijakanController::class,'download']);
// unit -->
Route::get('/unit', [UnitController::class,'unit']);
Route::get('/tambahunit', [UnitController::class,'tambahunit']);
Route::post('/simpanunit', [UnitController::class,'simpanunit']);
Route::get('/editunit/{kode_unit}', [UnitController::class,'editunit']);
Route::post('/updateunit/{kode_unit}', [UnitController::class,'updateunit']);
Route::get('/hapusunit/{kode_unit}', [UnitController::class,'hapusunit']);

// sub unit -->
Route::get('/subunit', [SubUnitController::class,'subunit']);
Route::get('/tambahsubunit', [SubUnitController::class,'tambahsubunit']);
Route::post('/simpansubunit', [SubUnitController::class,'simpansubunit']);
Route::get('/editsubunit/{kode_subunit}', [SubUnitController::class,'editsubunit']);
Route::post('/updatesubunit/{kode_subunit}', [SubUnitController::class,'updatesubunit']);
Route::get('/hapussubunit/{kode_subunit}', [SubUnitController::class,'hapussubunit']);

// Periode -->
Route::get('/periode', [PeriodeController::class,'periode']);
Route::get('/tambahperiode', [PeriodeController::class,'tambahperiode']);
Route::post('/simpanperiode', [PeriodeController::class,'simpanperiode']);
Route::get('/editperiode/{kode_periode}', [PeriodeController::class,'editperiode']);
Route::post('/updateperiode/{kode_periode}', [PeriodeController::class,'updateperiode']);
Route::get('/hapusperiode/{kode_periode}', [PeriodeController::class,'hapusperiode']);

// pegawai -->
Route::get('/pegawai', [PegawaiController::class,'pegawai']);
Route::get('/tambahpegawai', [PegawaiController::class,'tambahpegawai']);
Route::post('/simpanpegawai', [PegawaiController::class,'simpanpegawai']);
Route::get('/editpegawai/{kode_pegawai}', [PegawaiController::class,'editpegawai']);
Route::post('/updatepegawai/{kode_pegawai}', [PegawaiController::class,'updatepegawai']);
Route::get('/hapuspegawai/{kode_pegawai}', [PegawaiController::class,'hapuspegawai']);

// murid -->
Route::get('/murid', [MuridController::class,'murid']);
Route::get('/tambahmurid', [MuridController::class,'tambahmurid']);
Route::post('/simpanmurid', [MuridController::class,'simpanmurid']);
Route::get('/editmurid/{nomor_induk}', [MuridController::class,'editmurid']);
Route::post('/updatemurid/{nomor_induk}', [MuridController::class,'updatemurid']);
Route::get('/hapusmurid/{nomor_induk}', [MuridController::class,'hapusmurid']);
Route::get('/cetakpdf', [MuridController::class,'cetakpdf']);

// coa -->
Route::get('/coa', [CoaController::class,'coa']);
Route::get('/tambahcoa', [CoaController::class,'tambahcoa']);
Route::post('/simpancoa', [CoaController::class,'simpancoa']);
Route::get('/editcoa/{kode_akun}', [CoaController::class,'editcoa']);
Route::post('/updatecoa/{kode_akun}', [CoaController::class,'updatecoa']);
Route::get('/hapuscoa/{kode_akun}', [CoaController::class,'hapuscoa']);

// user-->
Route::get('/user', [UserController::class,'user']);
Route::get('/tambahuser', [UserController::class,'tambahuser']);
Route::post('/simpanuser', [UserController::class,'simpanuser']);
Route::get('/edituser/{id}', [UserController::class,'edituser']);
Route::post('/updateuser/{id}', [UserController::class,'updateuser']);
Route::get('/hapususer/{id}', [UserController::class,'hapususer']);

//Program Kerja
Route::get('/programkerja', [ProgramKerjaController::class,'programkerja']);
Route::get('/tambahprogramkerja', [ProgramKerjaController::class,'tambahprogramkerja']);
Route::post('/simpanprogramkerja', [ProgramKerjaController::class,'simpanprogramkerja']);
Route::get('/editprogramkerja/{kode_proker}', [ProgramKerjaController::class,'editprogramkerja']);
Route::post('/updateprogramkerja/{kode_proker}', [ProgramKerjaController::class,'updateprogramkerja']);
Route::get('/hapusprogramkerja/{kode_proker}', [ProgramKerjaController::class,'hapusprogramkerja']); 
Route::get('/lihatprogramkerja/{kode_proker}', [ProgramKerjaController::class,'lihatprogramkerja']); 
Route::get('/cetakprogramkerja', [ProgramKerjaController::class,'cetakprogramkerja']); 

//Evaluasi
Route::get('/evaluasi', [EvaluasiController::class,'evaluasi']);
Route::get('/tambahevaluasi', [EvaluasiController::class,'tambahevaluasi']);
Route::post('/simpanevaluasi', [EvaluasiController::class,'simpanevaluasi']);
Route::get('/editevaluasi/{kode_proker}', [EvaluasiController::class,'editevaluasi']);
Route::post('/updateevaluasi/{kode_proker}', [EvaluasiController::class,'updateevaluasi']);
Route::get('/hapusevaluasi/{kode_proker}', [EvaluasiController::class,'hapusevaluasi']); 
Route::get('/pilihprogramkerja', [EvaluasiController::class,'pilihprogramkerja']); 
Route::get('/akunbiaya', [EvaluasiController::class,'akunbiaya']); 

//Kas bon
Route::get('/kasbon', [KasBonController::class,'kasbon']);
Route::get('/tambahkasbon', [KasBonController::class,'tambahkasbon']);
Route::post('/simpankasbon', [KasBonController::class,'simpankasbon']);
Route::get('/editkasbon/{no_bukti}', [KasBonController::class,'editkasbon']);
Route::get('/lihatkasbon/{no_bukti}', [KasBonController::class,'lihatkasbon']);
Route::get('/cetakkasbon', [KasBonController::class,'cetakkasbon']);
Route::post('/updatekasbon/{no_bukti}', [KasBonController::class,'updatekasbon']);
Route::get('/hapuskasbon/{no_bukti}', [KasBonController::class,'hapuskasbon']);    

//Kas Masuk
Route::get('/kasmasuk', [KasMasukController::class,'kasmasuk']);
Route::get('/tambahkasmasuk', [KasMasukController::class,'tambahkasmasuk']);
Route::post('/simpankasmasuk', [KasMasukController::class,'simpankasmasuk']);
Route::get('/editkasmasuk/{no_bukti}', [KasMasukController::class,'editkasmasuk']);
Route::get('/lihatkasmasuk/{no_bukti}', [KasMasukController::class,'lihatkasmasuk']);
Route::get('/cetakkasmasuk', [KasMasukController::class,'cetakkasmasuk']);
Route::post('/updatekasmasuk/{no_bukti}', [KasMasukController::class,'updatekasmasuk']);
Route::get('/hapuskasmasuk/{no_bukti}', [KasMasukController::class,'hapuskasmasuk']); 

//Kas Keluar
Route::get('/kaskeluar', [KasKeluarController::class,'kaskeluar']);
Route::get('/tambahkaskeluar', [KasKeluarController::class,'tambahkaskeluar']);
Route::post('/simpankaskeluar', [KasKeluarController::class,'simpankaskeluar']);
Route::get('/editkaskeluar/{no_bukti}', [KasKeluarController::class,'editkaskeluar']);
Route::get('/lihatkaskeluar/{no_bukti}', [KasKeluarController::class,'lihatkaskeluar']);
Route::get('/cetakkaskeluar', [KasKeluarController::class,'cetakkaskeluar']);
Route::post('/updatekaskeluar/{no_bukti}', [KasKeluarController::class,'updatekaskeluar']);
Route::get('/hapuskaskeluar/{no_bukti}', [KasKeluarController::class,'hapuskaskeluar']);

//Buku Besar Kas
Route::get('/bukubesarkas', [BukuBesarKasController::class,'bukubesarkas']);

//Buku Besar Anggaran Pendapatan
Route::get('/bukubesaranggaranpendapatan', [BukuBesarAnggaranPendapatanController::class,'bukubesaranggaranpendapatan']);

//Buku Besar Anggaran Biaya
Route::get('/bukubesaranggaranbiaya', [BukuBesarAnggaranBiayaController::class,'bukubesaranggaranbiaya']);

//Laporan Kas
Route::get('/laporankas', [LaporanKasController::class,'laporankas']);
Route::get('/cetaklaporankas', [LaporanKasController::class,'cetaklaporankas']);

//Laporan Posisi Anggaran
Route::get('/laporanposisianggaran', [LaporanPAController::class,'laporanposisianggaran']);
Route::get('/cetaklaporanposisianggaran', [LaporanPAController::class,'cetaklaporanposisianggaran']);


//Laporan Penghasilan Komprehensif
Route::get('/laporanpengkomp', [LaporanPKController::class,'laporanpengkomp']);
Route::get('/cetaklaporanpengkomp', [LaporanPKController::class,'cetaklaporanpengkomp']);

});