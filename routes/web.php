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
use App\Http\Controllers\bukubesar\BukuBesarAnggaranController;
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



// Dashboard -->
Route::get('/dashboard', [DashboardController::class,'dashboard']);
//kebijakan
Route::get('/kebijakans', [KebijakanController::class,'kebijakan']);
Route::get('/tambahkebijakan', [KebijakanController::class,'tambahkebijakan'])->middleware(['ceklevel:super admin, yayasan']);
Route::post('/simpankebijakan', [KebijakanController::class,'simpankebijakan'])->middleware(['auth', 'ceklevel:super admin, yayasan']);
Route::get('/editkebijakan/{kode_kebijakan}', [KebijakanController::class,'editkebijakan'])->middleware(['auth', 'ceklevel:super admin, yayasan']);
Route::post('/updatekebijakan/{kode_kebijakan}', [KebijakanController::class,'updatekebijakan'])->middleware(['auth', 'ceklevel:super admin, yayasan']);
Route::get('/hapuskebijakan/{kode_kebijakan}', [KebijakanController::class,'hapuskebijakan'])->middleware(['auth', 'ceklevel:super admin, yayasan']);
Route::get('/download/{kode_kebijakan}', [KebijakanController::class,'download']);

// unit -->
Route::get('/unit', [UnitController::class,'unit']);
Route::get('/tambahunit', [UnitController::class,'tambahunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/simpanunit', [UnitController::class,'simpanunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/editunit/{kode_unit}', [UnitController::class,'editunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/updateunit/{kode_unit}', [UnitController::class,'updateunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/hapusunit/{kode_unit}', [UnitController::class,'hapusunit'])->middleware(['auth', 'ceklevel:super admin, unit']);

// sub unit -->
Route::get('/subunit', [SubUnitController::class,'subunit']);
Route::get('/tambahsubunit', [SubUnitController::class,'tambahsubunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/simpansubunit', [SubUnitController::class,'simpansubunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/editsubunit/{kode_subunit}', [SubUnitController::class,'editsubunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/updatesubunit/{kode_subunit}', [SubUnitController::class,'updatesubunit'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/hapussubunit/{kode_subunit}', [SubUnitController::class,'hapussubunit'])->middleware(['auth', 'ceklevel:super admin, unit']);

// Periode -->
Route::get('/periode', [PeriodeController::class,'periode']);
Route::get('/tambahperiode', [PeriodeController::class,'tambahperiode'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/simpanperiode', [PeriodeController::class,'simpanperiode'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/editperiode/{kode_periode}', [PeriodeController::class,'editperiode'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/updateperiode/{kode_periode}', [PeriodeController::class,'updateperiode'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/hapusperiode/{kode_periode}', [PeriodeController::class,'hapusperiode'])->middleware(['auth', 'ceklevel:super admin, unit']);
// pegawai -->
Route::get('/pegawai', [PegawaiController::class,'pegawai']);
Route::get('/tambahpegawai', [PegawaiController::class,'tambahpegawai'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/simpanpegawai', [PegawaiController::class,'simpanpegawai'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/editpegawai/{kode_pegawai}', [PegawaiController::class,'editpegawai'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/updatepegawai/{kode_pegawai}', [PegawaiController::class,'updatepegawai'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/hapuspegawai/{kode_pegawai}', [PegawaiController::class,'hapuspegawai'])->middleware(['auth', 'ceklevel:super admin, unit']);

// murid -->
Route::get('/murid', [MuridController::class,'murid']);
Route::get('/tambahmurid', [MuridController::class,'tambahmurid'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/simpanmurid', [MuridController::class,'simpanmurid'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/editmurid/{nomor_induk}', [MuridController::class,'editmurid'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/updatemurid/{nomor_induk}', [MuridController::class,'updatemurid'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/hapusmurid/{nomor_induk}', [MuridController::class,'hapusmurid'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/cetakpdf', [MuridController::class,'cetakpdf'])->middleware(['auth', 'ceklevel:super admin, unit']);

// coa -->
Route::get('/coa', [CoaController::class,'coa']);
Route::get('/tambahcoa', [CoaController::class,'tambahcoa'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/simpancoa', [CoaController::class,'simpancoa'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/editcoa/{kode_akun}', [CoaController::class,'editcoa'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::post('/updatecoa/{kode_akun}', [CoaController::class,'updatecoa'])->middleware(['auth', 'ceklevel:super admin, unit']);
Route::get('/hapuscoa/{kode_akun}', [CoaController::class,'hapuscoa'])->middleware(['auth', 'ceklevel:super admin, unit']);

// user-->
Route::get('/user', [UserController::class,'user'])->middleware('auth', 'ceklevel:super admin');
Route::get('/tambahuser', [UserController::class,'tambahuser'])->middleware('auth', 'ceklevel:super admin');
Route::post('/simpanuser', [UserController::class,'simpanuser'])->middleware('auth', 'ceklevel:super admin');
Route::get('/edituser/{id}', [UserController::class,'edituser'])->middleware('auth', 'ceklevel:super admin');
Route::post('/updateuser/{id}', [UserController::class,'updateuser'])->middleware('auth', 'ceklevel:super admin');
Route::get('/hapususer/{id}', [UserController::class,'hapususer'])->middleware('auth', 'ceklevel:super admin');

//Program Kerja
Route::get('/programkerja', [ProgramKerjaController::class,'programkerja']);
Route::get('/viewprogramkerja', [ProgramKerjaController::class,'viewprogramkerja']);
Route::get('/tambahprogramkerja', [ProgramKerjaController::class,'tambahprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanprogramkerja', [ProgramKerjaController::class,'simpanprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::get('/editprogramkerja/{kode_proker}', [ProgramKerjaController::class,'editprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::post('/updateprogramkerja/{kode_proker}', [ProgramKerjaController::class,'updateprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapusprogramkerja/{kode_proker}', [ProgramKerjaController::class,'hapusprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatproker/{kode_proker}', [ProgramKerjaController::class,'lihatproker']);
Route::get('/cetakprogramkerja', [ProgramKerjaController::class,'cetakprogramkerja']);
Route::get('/viewcetakprogramkerja', [ProgramKerjaController::class,'viewcetakprogramkerja']);
//lihat di table akuns
Route::get('/lihatprogramkerja/{kode_proker}', [ProgramKerjaController::class,'lihatprogramkerja'])->middleware('auth', 'ceklevel:unit');

//Evaluasi
Route::get('/evaluasi', [EvaluasiController::class,'evaluasi']);
Route::get('/tambahevaluasi', [EvaluasiController::class,'tambahevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanevaluasi', [EvaluasiController::class,'simpanevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/editevaluasi/{kode_evaluasi}', [EvaluasiController::class,'editevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::post('/updateevaluasi/{kode_evaluasi}', [EvaluasiController::class,'updateevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapusevaluasi/{kode_evaluasi}', [EvaluasiController::class,'hapusevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihprogramkerja', [EvaluasiController::class,'pilihprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::get('/akunbiaya', [EvaluasiController::class,'akunbiaya'])->middleware('auth', 'ceklevel:unit');

//Kas bon
Route::get('/kasbon', [KasBonController::class,'kasbon']);
Route::get('/tambahkasbon', [KasBonController::class,'tambahkasbon'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankasbon', [KasBonController::class,'simpankasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/editkasbon/{no_buktibon}', [KasBonController::class,'editkasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatkasbon/{no_buktibon}', [KasBonController::class,'lihatkasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkasbon', [KasBonController::class,'cetakkasbon'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatekasbon/{no_buktibon}', [KasBonController::class,'updatekasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapuskasbon/{no_buktibon}', [KasBonController::class,'hapuskasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihprokerbon', [KasBonController::class,'pilihprokerbon'])->middleware('auth', 'ceklevel:unit');


//Kas Masuk
Route::get('/kasmasuk', [KasMasukController::class,'kasmasuk']);
Route::get('/tambahkasmasuk', [KasMasukController::class,'tambahkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankasmasuk', [KasMasukController::class,'simpankasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/editkasmasuk/{no_bukti}', [KasMasukController::class,'editkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatkasmasuk/{no_bukti}', [KasMasukController::class,'lihatkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkasmasuk/{no_bukti}', [KasMasukController::class,'cetakkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatekasmasuk/{no_bukti}', [KasMasukController::class,'updatekasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapuskasmasuk/{no_bukti}', [KasMasukController::class,'hapuskasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/sumberkasmasuk', [KasMasukController::class,'sumberkasmasuk']);

//Kas Keluar
Route::get('/kaskeluar', [KasKeluarController::class,'kaskeluar']);
Route::get('/tambahkaskeluar', [KasKeluarController::class,'tambahkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankaskeluar', [KasKeluarController::class,'simpankaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/editkaskeluar/{no_bukti}', [KasKeluarController::class,'editkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatkaskeluar/{no_bukti}', [KasKeluarController::class,'lihatkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkaskeluar/{no_bukti}', [KasKeluarController::class,'cetakkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatekaskeluar/{no_bukti}', [KasKeluarController::class,'updatekaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapuskaskeluar/{no_bukti}', [KasKeluarController::class,'hapuskaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihproker', [KasKeluarController::class,'pilihproker'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihbon', [KasKeluarController::class,'pilihbon'])->middleware('auth', 'ceklevel:unit'); 

//Buku Besar Kas
Route::get('/bukubesarkas', [BukuBesarKasController::class,'bukubesarkas']);
Route::get('/kas', [BukuBesarKasController::class,'kas']);
Route::get('/lihatkas/{no_bukti}', [BukuBesarKasController::class,'lihatkas'])->middleware('auth', 'ceklevel:unit');

//Buku Besar Anggaran 
Route::get('/bukubesaranggaran', [BukuBesarAnggaranController::class,'bukubesaranggaran']);
Route::get('/anggaran', [BukuBesarAnggaranController::class,'anggaran']);


//Buku Besar Anggaran Pendapatan
Route::get('/bukubesaranggaranpendapatan', [BukuBesarAnggaranPendapatanController::class,'bukubesaranggaranpendapatan']);

//Buku Besar Anggaran Biaya
Route::get('/bukubesaranggaranbiaya', [BukuBesarAnggaranBiayaController::class,'bukubesaranggaranbiaya']);

//Laporan Kas
Route::get('/laporankas', [LaporanKasController::class,'laporankas']);
Route::get('/viewlk', [LaporanKasController::class,'viewlk']);
Route::get('/cetaklaporankas', [LaporanKasController::class,'cetaklaporankas']);
Route::get('/viewcetaklk', [LaporanKasController::class,'viewcetaklk']);

//Laporan Posisi Anggaran
Route::get('/laporanposisianggaran', [LaporanPAController::class,'laporanposisianggaran']);
Route::get('/viewlpa', [LaporanPAController::class,'viewlpa']);
Route::get('/cetaklaporanposisianggaran', [LaporanPAController::class,'cetaklaporanposisianggaran']);
Route::get('/viewcetaklpa', [LaporanPAController::class,'viewcetaklpa']);


//Laporan Penghasilan Komprehensif
Route::get('/laporanpengkomp', [LaporanPKController::class,'laporanpengkomp']);
Route::get('/viewlpk', [LaporanPKController::class,'viewlpk']);
Route::get('/cetaklaporanpengkomp', [LaporanPKController::class,'cetaklaporanpengkomp']);
Route::get('/viewcetaklpk', [LaporanPKController::class,'viewcetaklpk']);

Route::view("noaccess", "noaccess");
