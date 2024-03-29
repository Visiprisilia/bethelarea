<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\Laporan\LaporanPengKomp;
use App\Models\Periode\Periode;
use App\Models\Akuns;
use App\Models\Coa\Coa;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class LaporanPKController extends Controller
{
    public function laporanpengkomp()
    {
        $lappk = Periode::orderBy('created_at', 'desc')->get();
       
        return view('laporan/laporanpengkomp', ['lappk' => $lappk]);
    }
    public function viewlpk(Request $request)
    {
        $id = $request->id;
        $periode = Periode::orderBy('created_at', 'desc')->get();
        $lappk = LaporanPengKomp::where('periode', $id)->get();
        $pendapatan = LaporanPengKomp::where('akun', 'LIKE', '4%')->where('periode', $id)->where('realisasi','!=',0)->get();
        $biaya = LaporanPengKomp::where('akun', 'LIKE', '5%')->where('periode', $id)->where('realisasi','!=',0)->get();
        $totalpendap = LaporanPengKomp::where('akun', 'LIKE', '4%')->where('periode', $id)->sum('realisasi');
        $totalbiaya = LaporanPengKomp::where('akun', 'LIKE', '5%')->where('periode', $id)->sum('realisasi');
        $total = $totalpendap - $totalbiaya;
        
        return view('laporan/viewlpk', ['lappk' => $lappk,'periode'=>$periode,'biaya'=>$biaya,'pendapatan'=>$pendapatan,
        'totalpendap'=>$totalpendap, 'totalbiaya'=>$totalbiaya,'total'=>$total]);
    }
    public function cetaklaporanpengkomp()
    {
        $lappk = Periode::orderBy('created_at', 'desc')->get();
       
        return view('laporan/cetaklaporanpengkomp', ['lappk' => $lappk]);
    }
    public function viewcetaklpk(Request $request)
    {
        $tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
        $id = $request->id;
        $periode = Periode::orderBy('created_at', 'desc')->get();
        $lappk = LaporanPengKomp::where('periode', $id)->get();
        $pendapatan = LaporanPengKomp::where('akun', 'LIKE', '4%')->where('periode', $id)->where('realisasi','!=',0)->get();
        $biaya = LaporanPengKomp::where('akun', 'LIKE', '5%')->where('periode', $id)->where('realisasi','!=',0)->get();
        $totalpendap = LaporanPengKomp::where('akun', 'LIKE', '4%')->where('periode', $id)->sum('realisasi');
        $totalbiaya = LaporanPengKomp::where('akun', 'LIKE', '5%')->where('periode', $id)->sum('realisasi');
        $total = $totalpendap - $totalbiaya;
        
        return view('laporan/viewcetaklpk', ['lappk' => $lappk,'periode'=>$periode,'biaya'=>$biaya,'pendapatan'=>$pendapatan,
        'totalpendap'=>$totalpendap, 'totalbiaya'=>$totalbiaya,'total'=>$total,'tanggalhariini'=>$tanggalhariini]);
    }
    

}