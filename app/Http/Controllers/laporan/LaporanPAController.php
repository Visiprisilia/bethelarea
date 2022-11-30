<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Models\Realisasi\KasMasuk;
use App\Models\ProgramKerja\ProgramKerja;
use App\Http\Controllers\Controller;

class LaporanPAController extends Controller
{
    public function laporanposisianggaran()
    {
        $kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
		$kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        $laporanpa = KasMasuk::join("kas_keluar","kas_masuk.no_bukti","=","kas_keluar.no_bukti")->get();
        return view('laporan/laporanposisianggaran', ['laporanpa'=>$laporanpa,'kaskeluar'=>$kaskeluar,'kasmasuk'=>$kasmasuk]);
    }
    public function cetaklaporanposisianggaran()
    {
        $kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
		$kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        $laporanpa = KasMasuk::join("kas_keluar","kas_masuk.no_bukti","=","kas_keluar.no_bukti")->get();
        return view('laporan/cetaklaporanposisianggaran', ['laporanpa'=>$laporanpa,'kaskeluar'=>$kaskeluar,'kasmasuk'=>$kasmasuk]);
    }
}
// SELECT a.kode_akun, a.jumlah, "" as 'anggaran' 
// FROM akuns a 
// UNION ALL SELECT kk.akun, "", kk.jumlah 
// FROM kas_keluar kk;

// kode akun, nama akun, tanggal pencatatan, nama akun, anggaran, realisasi