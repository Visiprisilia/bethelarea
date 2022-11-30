<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Models\Realisasi\KasMasuk;
use App\Http\Controllers\Controller;

class LaporanPKController extends Controller
{
    public function laporanpengkomp()
    {
        $kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
		$kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        // $kasmasuk = KasMasuk::join("murid","kas_masuk.kasir","=","murid.nomor_induk")->get();
        // $bbpendapatan = ProgramKerja::orderBy('created_at','desc')->get();
        $laporanpk= KasMasuk::join("kas_keluar","kas_masuk.no_bukti","=","kas_keluar.no_bukti")->get();
        return view('laporan/laporanpengkomp', ['laporanpk'=>$laporanpk,'kaskeluar'=>$kaskeluar,'kasmasuk'=>$kasmasuk]);
    }
    public function cetaklaporanpengkomp()
    {
        $kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
		$kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        // $kasmasuk = KasMasuk::join("murid","kas_masuk.kasir","=","murid.nomor_induk")->get();
        // $bbpendapatan = ProgramKerja::orderBy('created_at','desc')->get();
        $laporanpk= KasMasuk::join("kas_keluar","kas_masuk.no_bukti","=","kas_keluar.no_bukti")->get();
        return view('laporan/cetaklaporanpengkomp', ['laporanpk'=>$laporanpk,'kaskeluar'=>$kaskeluar,'kasmasuk'=>$kasmasuk]);
    }
}