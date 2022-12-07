<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesarKas;
use App\Models\Periode\Periode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanKasController extends Controller
{
    public function laporankas()
    {
        $laporankas = Periode::orderBy('created_at','desc')->get();       
        return view('laporan/laporankas', ['laporankas'=>$laporankas ]);
    }
    public function viewlk(Request $request)
    {
        $id=$request->id;
        $periode = Periode::orderBy('created_at','desc')->get();
        $laporankas = BukuBesarKas::orderBy('tgl','desc')->where('periode',$id)->get();  
        $tambah = BukuBesarKas::where('periode',$id)->sum('bertambah');
        $kurang = BukuBesarKas::where('periode',$id)->sum('berkurang');
        $totalkas = $tambah-$kurang;
        return view('laporan/viewlk', ['laporankas'=>$laporankas,'tambah'=>$tambah,'kurang'=>$kurang,'totalkas'=>$totalkas,'periode'=>$periode]);
    }
    public function cetaklaporankas()
    {
        $laporankas = Periode::orderBy('created_at','desc')->get();       
        return view('laporan/cetaklaporankas', ['laporankas'=>$laporankas ]);
    }
    public function viewcetaklk(Request $request)
    {
        $id=$request->id;
        $periode = Periode::orderBy('created_at','desc')->get();
        $laporankas = BukuBesarKas::orderBy('tgl','desc')->where('periode',$id)->get();  
        $tambah = BukuBesarKas::where('periode',$id)->sum('bertambah');
        $kurang = BukuBesarKas::where('periode',$id)->sum('berkurang');
        $totalkas = $tambah-$kurang;
        return view('laporan/viewcetaklk', ['laporankas'=>$laporankas,'tambah'=>$tambah,'kurang'=>$kurang,'totalkas'=>$totalkas,'periode'=>$periode]);
    }
}