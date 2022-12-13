<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\BukuBesar\BukuBesarAnggaran;
use App\Models\Akuns;
use App\Http\Controllers\Controller;
use App\Models\Coa\Coa;

class BukuBesarAnggaranController extends Controller
{
    public function bukubesaranggaran()
    {
      
        $bbanggaran = Coa::orderBy('created_at', 'asc')->get();       
        $bbanggaran2 = Periode::orderBy('created_at', 'asc')->get();       
        return view('bukubesar/bukubesaranggaran', ['bbanggaran' => $bbanggaran, 'bbanggaran2'=>$bbanggaran2]);
    }

    public function anggaran(Request $request)
    {
        $jlh = 0;
        $id=$request->id;
        $bbanggaran = BukuBesarAnggaran::orderBy('tgl', 'asc')->where('akun',$id)->get();   
        $anggaran = BukuBesarAnggaran::where('akun',$id)->sum('anggaran');
        $realisasi = BukuBesarAnggaran::where('akun',$id)->sum('realisasi');
        $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
        $total = $anggaran - $realisasi;
        return view('bukubesar/anggaran', ['bbanggaran'=>$bbanggaran,'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo,
        'total'=>$total]);
    }
}
