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
use App\Http\Controllers\programkerja\AmandemenController;
use App\Http\Controllers\programkerja\EvaluasiController;
use App\Http\Controllers\unit\UnitController;
use App\Http\Controllers\sumber\SumberController;
use App\Http\Controllers\subunit\SubUnitController;
use App\Http\Controllers\realisasi\KasMasukController;
use App\Http\Controllers\realisasi\KasKeluarController;
use App\Http\Controllers\realisasi\KasBonController;
use App\Http\Controllers\realisasi\TagihanController;
use App\Http\Controllers\realisasi\KategoriTagihanMuridController;
use App\Http\Controllers\bukubesar\BukuBesarKasController;
use App\Http\Controllers\bukubesar\BukuBesarAnggaranPendapatanController;
use App\Http\Controllers\bukubesar\BukuBesarAnggaranController;
use App\Http\Controllers\bukubesar\BukuBesarAnggaranBiayaController;
use App\Http\Controllers\laporan\LaporanKasController;
use App\Http\Controllers\laporan\LaporanPAController;
use App\Http\Controllers\laporan\LaporanPKController;
use App\Http\Controllers\realisasi\PembayaranController;

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
Route::get('/home', [DashboardController::class,'home']);

//Kebijakan
Route::get('/kebijakans', [KebijakanController::class,'kebijakan']);
Route::get('/tambahkebijakan', [KebijakanController::class,'tambahkebijakan']);
Route::post('/simpankebijakan', [KebijakanController::class,'simpankebijakan']);
Route::get('/editkebijakan/{kode_kebijakan}', [KebijakanController::class,'editkebijakan']);
Route::post('/updatekebijakan/{kode_kebijakan}', [KebijakanController::class,'updatekebijakan']);
Route::get('/hapuskebijakan/{kode_kebijakan}', [KebijakanController::class,'hapuskebijakan']);
Route::get('/download/{kode_kebijakan}', [KebijakanController::class,'download']);

//Unit -->
Route::get('/unit', [UnitController::class,'unit']);
Route::get('/tambahunit', [UnitController::class,'tambahunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/simpanunit', [UnitController::class,'simpanunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/editunit/{kode_unit}', [UnitController::class,'editunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/updateunit/{kode_unit}', [UnitController::class,'updateunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/hapusunit/{kode_unit}', [UnitController::class,'hapusunit'])->middleware(['auth', 'ceklevel:super admin']);

//Sub unit -->
Route::get('/subunit', [SubUnitController::class,'subunit']);
Route::get('/tambahsubunit', [SubUnitController::class,'tambahsubunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/simpansubunit', [SubUnitController::class,'simpansubunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/editsubunit/{kode_subunit}', [SubUnitController::class,'editsubunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/updatesubunit/{kode_subunit}', [SubUnitController::class,'updatesubunit'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/hapussubunit/{kode_subunit}', [SubUnitController::class,'hapussubunit'])->middleware(['auth', 'ceklevel:super admin']);

//Sumber -->
Route::get('/sumber', [SumberController::class,'sumber']);
Route::get('/tambahsumber', [SumberController::class,'tambahsumber'])->middleware(['auth', 'ceklevel:unit']);
Route::post('/simpansumber', [SumberController::class,'simpansumber'])->middleware(['auth', 'ceklevel:unit']);
Route::get('/editsumber/{id_sumber}', [SumberController::class,'editsumber'])->middleware(['auth', 'ceklevel:unit']);
Route::post('/updatesumber/{id_sumber}', [SumberController::class,'updatesumber'])->middleware(['auth', 'ceklevel:unit']);
Route::get('/hapussumber/{id_sumber}', [SumberController::class,'hapussumber'])->middleware(['auth', 'ceklevel:unit']);

//Kategori Tagihan -->
Route::get('/kategoritagihan', [KategoriTagihanMuridController::class,'kategoritagihan']);
Route::get('/tambahkategoritagihan', [KategoriTagihanMuridController::class,'tambahkategoritagihan'])->middleware(['auth', 'ceklevel:unit']);
Route::post('/simpankategoritagihan', [KategoriTagihanMuridController::class,'simpankategoritagihan'])->middleware(['auth', 'ceklevel:unit']);
Route::get('/editkategoritagihan/{id_kategoritagihan}', [KategoriTagihanMuridController::class,'editkategoritagihan'])->middleware(['auth', 'ceklevel:unit']);
Route::post('/updatekategoritagihan/{id_kategoritagihan}', [KategoriTagihanMuridController::class,'updatekategoritagihan'])->middleware(['auth', 'ceklevel:unit']);
Route::get('/hapuskategoritagihan/{id_kategoritagihan}', [KategoriTagihanMuridController::class,'hapuskategoritagihan'])->middleware(['auth', 'ceklevel:unit']);


//Periode -->
Route::get('/periode', [PeriodeController::class,'periode']);
Route::get('/tambahperiode', [PeriodeController::class,'tambahperiode'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/simpanperiode', [PeriodeController::class,'simpanperiode'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/editperiode/{kode_periode}', [PeriodeController::class,'editperiode'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/updateperiode/{kode_periode}', [PeriodeController::class,'updateperiode'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/hapusperiode/{kode_periode}', [PeriodeController::class,'hapusperiode'])->middleware(['auth', 'ceklevel:super admin']);

//Pegawai -->
Route::get('/pegawai', [PegawaiController::class,'pegawai']);
Route::get('/tambahpegawai', [PegawaiController::class,'tambahpegawai'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/simpanpegawai', [PegawaiController::class,'simpanpegawai'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/editpegawai/{kode_pegawai}', [PegawaiController::class,'editpegawai'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/updatepegawai/{kode_pegawai}', [PegawaiController::class,'updatepegawai'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/hapuspegawai/{kode_pegawai}', [PegawaiController::class,'hapuspegawai'])->middleware(['auth', 'ceklevel:super admin']);

//Murid -->
Route::get('/murid', [MuridController::class,'murid']);
Route::get('/tambahmurid', [MuridController::class,'tambahmurid'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/simpanmurid', [MuridController::class,'simpanmurid'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/editmurid/{nomor_induk}', [MuridController::class,'editmurid'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/updatemurid/{nomor_induk}', [MuridController::class,'updatemurid'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/hapusmurid/{nomor_induk}', [MuridController::class,'hapusmurid'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/cetakpdf', [MuridController::class,'cetakpdf'])->middleware(['auth', 'ceklevel:super admin']);

//COA -->
Route::get('/coa', [CoaController::class,'coa']);
Route::get('/tambahcoa', [CoaController::class,'tambahcoa'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/simpancoa', [CoaController::class,'simpancoa'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/editcoa/{kode_akun}', [CoaController::class,'editcoa'])->middleware(['auth', 'ceklevel:super admin']);
Route::post('/updatecoa/{kode_akun}', [CoaController::class,'updatecoa'])->middleware(['auth', 'ceklevel:super admin']);
Route::get('/hapuscoa/{kode_akun}', [CoaController::class,'hapuscoa'])->middleware(['auth', 'ceklevel:super admin']);

//User-->
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
Route::post('/konfirmasi/{kode_proker}', [ProgramKerjaController::class,'konfirmasi']);
Route::get('/cetakprogramkerja', [ProgramKerjaController::class,'cetakprogramkerja']);
Route::get('/cetakprogramkerjapendapatan', [ProgramKerjaController::class,'cetakprogramkerjapendapatan']);
Route::get('/viewcetakprogramkerja', [ProgramKerjaController::class,'viewcetakprogramkerja']);
Route::get('/viewcetakprogramkerjapendapatan', [ProgramKerjaController::class,'viewcetakprogramkerjapendapatan']);
//lihat di table akuns
Route::get('/lihatprogramkerja/{kode_proker}', [ProgramKerjaController::class,'lihatprogramkerja']);

//Evaluasi
Route::get('/evaluasi', [EvaluasiController::class,'evaluasi']);
Route::get('/viewevaluasi', [EvaluasiController::class,'viewevaluasi']);
Route::get('/tambahevaluasi', [EvaluasiController::class,'tambahevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanevaluasi', [EvaluasiController::class,'simpanevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/editevaluasi/{kode_evaluasi}', [EvaluasiController::class,'editevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::post('/updateevaluasi/{kode_evaluasi}', [EvaluasiController::class,'updateevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapusevaluasi/{kode_evaluasi}', [EvaluasiController::class,'hapusevaluasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihprogramkerja', [EvaluasiController::class,'pilihprogramkerja'])->middleware('auth', 'ceklevel:unit');
Route::get('/akunbiaya', [EvaluasiController::class,'akunbiaya'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakevaluasi', [EvaluasiController::class,'cetakevaluasi']);
Route::get('/viewcetakevaluasi', [EvaluasiController::class,'viewcetakevaluasi']);

//Amandemen
Route::get('/amandemen', [AmandemenController::class,'amandemen']);
Route::get('/tambahamandemen', [AmandemenController::class,'tambahamandemen'])->middleware('auth', 'ceklevel:unit');
Route::get('/ubahamandemen', [AmandemenController::class,'ubahamandemen'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanamandemen', [AmandemenController::class,'simpanamandemen'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpantambahamandemen', [AmandemenController::class,'simpantambahamandemen'])->middleware('auth', 'ceklevel:unit');
Route::post('/konfirmasiamandemen/{kode_prokeramandemen}', [AmandemenController::class,'konfirmasiamandemen']);
Route::get('/editamandemen/{kode_prokeramandemen}', [AmandemenController::class,'editamandemen']);
Route::post('/updateamandemen/{kode_prokeramandemen}', [AmandemenController::class,'updateamandemen']);
Route::get('/hapusamandemen/{kode_prokeramandemen}', [AmandemenController::class,'hapusamandemen']);
Route::get('/viewamandemen', [AmandemenController::class,'viewamandemen']);
Route::get('/pilihamandemen', [AmandemenController::class,'pilihamandemen']);
Route::get('/lihatamandemen/{kode_prokeramandemen}', [AmandemenController::class,'lihatamandemen']);
Route::get('/lihatamandemens/{kode_prokeramandemen}', [AmandemenController::class,'lihatamandemens']);
Route::get('/cetakamandemen', [AmandemenController::class,'cetakamandemen']);
Route::get('/viewcetakamandemen', [AmandemenController::class,'viewcetakamandemen']);

//Kas bon
Route::get('/kasbon', [KasBonController::class,'kasbon']);
Route::get('/tambahkasbon', [KasBonController::class,'tambahkasbon'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankasbon', [KasBonController::class,'simpankasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/editkasbon/{no_buktibon}', [KasBonController::class,'editkasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatkasbon/{no_buktibon}', [KasBonController::class,'lihatkasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkasbon', [KasBonController::class,'cetakkasbon'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatekasbon/{no_buktibon}', [KasBonController::class,'updatekasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapuskasbon/{no_buktibon}', [KasBonController::class,'hapuskasbon'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihprokerbon', [KasBonController::class,'pilihprokerbon'])->name('pilihprokerbon.index')->middleware('auth', 'ceklevel:unit');
Route::get('/pilihprokerbonakun/{kode_proker}', [KasBonController::class,'pilihprokerbonakun'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihprokerbonakuns', [KasBonController::class,'pilihprokerbonakuns'])->middleware('auth', 'ceklevel:unit');

//Kas Masuk
Route::get('/kasmasuk', [KasMasukController::class,'kasmasuk']);
Route::get('/tambahkasmasuk', [KasMasukController::class,'tambahkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/tambahkasmasukmurid', [KasMasukController::class,'tambahkasmasukmurid'])->middleware('auth', 'ceklevel:unit');
Route::get('/tambahmutasi', [KasMasukController::class,'tambahmutasi'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankasmasuk', [KasMasukController::class,'simpankasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankasmasukmurid', [KasMasukController::class,'simpankasmasukmurid'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanmutasi', [KasMasukController::class,'simpanmutasi'])->middleware('auth', 'ceklevel:unit');
Route::get('/editkasmasuk/{no_bukti}', [KasMasukController::class,'editkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatkasmasuk/{no_bukti}', [KasMasukController::class,'lihatkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkasmasuk/{no_bukti}', [KasMasukController::class,'cetakkasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatekasmasuk/{no_bukti}', [KasMasukController::class,'updatekasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapuskasmasuk/{no_bukti}', [KasMasukController::class,'hapuskasmasuk'])->middleware('auth', 'ceklevel:unit');
Route::get('/sumberkasmasuk', [KasMasukController::class,'sumberkasmasuk']);
Route::get('/pilihprokerkm', [KasMasukController::class,'pilihprokerkm'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkasmurid', [KasMasukController::class,'cetakkasmurid']);
Route::get('/cetakkasmurid', [KasMasukController::class,'cetakkasmurid']);
Route::get('/cetaksementara', [KasMasukController::class,'cetaksementara']);
Route::get('/cetakrekapan', [KasMasukController::class,'cetakrekapan']);
Route::get('/viewcetakrekapan', [KasMasukController::class,'viewcetakrekapan']);
Route::post('/filter', [KasMasukController::class,'filter'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanidsetoran/{no_bukti}', [KasMasukController::class,'simpanidsetoran'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpanstatus/{id_setoran}', [KasMasukController::class,'simpanstatus'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihmurid', [KasMasukController::class,'pilihmurid'])->name('pilihmurid.index')->middleware('auth', 'ceklevel:unit');
Route::get('/pilihtagihan/{nomor_induk}', [KasMasukController::class,'pilihtagihan'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihakunss', [KasMasukController::class,'pilihakunss'])->middleware('auth', 'ceklevel:unit');


//Kas Keluar
Route::get('/kaskeluar', [KasKeluarController::class,'kaskeluar']);
Route::get('/tambahkaskeluar', [KasKeluarController::class,'tambahkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/setoran', [KasKeluarController::class,'setoran'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpansetoran', [KasKeluarController::class,'simpansetoran'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpankaskeluar', [KasKeluarController::class,'simpankaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/editkaskeluar/{no_bukti}', [KasKeluarController::class,'editkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/lihatkaskeluar/{no_bukti}', [KasKeluarController::class,'lihatkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/cetakkaskeluar/{no_bukti}', [KasKeluarController::class,'cetakkaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatekaskeluar/{no_bukti}', [KasKeluarController::class,'updatekaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapuskaskeluar/{no_bukti}', [KasKeluarController::class,'hapuskaskeluar'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihproker', [KasKeluarController::class,'pilihproker'])->name('pilihproker.index')->middleware('auth', 'ceklevel:unit');
Route::get('/pilihakun/{kode_proker}', [KasKeluarController::class,'pilihakun'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihakuns', [KasKeluarController::class,'pilihakuns'])->middleware('auth', 'ceklevel:unit');
Route::get('/pilihbon', [KasKeluarController::class,'pilihbon'])->middleware('auth', 'ceklevel:unit'); 
Route::get('/downloadbkk/{no_bukti}', [KasKeluarController::class,'downloadbkk']);

//Pembayaran Murid
Route::get('/pembayaranmurid', [PembayaranController::class,'pembayaranmurid']);
Route::get('/viewpembayaranmurid', [PembayaranController::class,'viewpembayaranmurid']);
Route::get('/lihatpembayaranmurid/{nis_tagihan}', [PembayaranController::class,'lihatpembayaranmurid']);
Route::get('/lihatpembayaranmurids/{nis_tagihan}', [PembayaranController::class,'lihatpembayaranmurids']);

//Tagihan
Route::get('/tagihan', [TagihanController::class,'tagihan']);
Route::get('/viewtagihan', [TagihanController::class,'viewtagihan']);
Route::get('/tambahdaftartagihan', [TagihanController::class,'tambahdaftartagihan'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpandaftartagihan', [TagihanController::class,'simpandaftartagihan'])->middleware('auth', 'ceklevel:unit');
//rincian
Route::get('/lihattagihanmurid/{id_tagihan}', [TagihanController::class,'lihattagihanmurid']);
Route::get('/viewlihattagihanmurid/{id_tagihan}', [TagihanController::class,'viewlihattagihanmurid']);
Route::get('/tambahtagihanmurid/{id_tagihan}', [TagihanController::class,'tambahtagihanmurid'])->middleware('auth', 'ceklevel:unit');
Route::post('/simpantagihanmurid', [TagihanController::class,'simpantagihanmurid'])->middleware('auth', 'ceklevel:unit');
Route::get('/edittagihanmurid/{id_itemtagihan}', [TagihanController::class,'edittagihanmurid'])->middleware('auth', 'ceklevel:unit');
Route::post('/updatetagihanmurid/{id_itemtagihan}', [TagihanController::class,'updatetagihanmurid'])->middleware('auth', 'ceklevel:unit');
Route::get('/hapustagihanmurid/{id_itemtagihan}', [TagihanController::class,'hapustagihanmurid'])->middleware('auth', 'ceklevel:unit');

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
