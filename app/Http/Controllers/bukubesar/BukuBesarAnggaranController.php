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
    public function bukubesaranggaran(Request $request)
    {

        $bbanggaran = BukuBesarAnggaran::orderBy('tgl', 'asc')->get();
        $anggaran = BukuBesarAnggaran::sum('anggaran');
        $realisasi = BukuBesarAnggaran::sum('realisasi');
        $coa = Coa::orderBy('created_at', 'asc')->get();
        $periode = Periode::orderBy('created_at', 'asc')->get();
        $jlh = 0;      
           
        $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
        $total = ($anggaran - $realisasi);
        if($request->periode && $request->akun) {
            $bbanggaran = BukuBesarAnggaran::Where('periode', $request->periode)->Where('akun', $request->akun)->get();
            $anggaran = BukuBesarAnggaran::where('periode', $request->periode)->Where('akun', $request->akun)->sum('anggaran');
            $realisasi = BukuBesarAnggaran::where('periode', $request->periode)->Where('akun', $request->akun)->sum('realisasi');
            $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
            $total = ($anggaran - $realisasi);
        }
        // if ($request->akun !=null) {
        //     $bbanggaran = BukuBesarAnggaran::Where('akun', $request->akun)->get();
        //     $anggaran = BukuBesarAnggaran::where('akun', $request->akun)->sum('anggaran');
        //     $realisasi = BukuBesarAnggaran::where('akun', $request->akun)->sum('realisasi');
        //     $total = ($anggaran - $realisasi);
        // }
        // if ($request->periode !=null) {
        //     $bbanggaran = BukuBesarAnggaran::Where('periode', $request->periode)->get();
        //     $anggaran = BukuBesarAnggaran::where('periode', $request->periode)->sum('anggaran');
        //     $realisasi = BukuBesarAnggaran::where('periode', $request->periode)->sum('realisasi');
        //     $total = ($anggaran - $realisasi);
        // }
        return view('bukubesar/bukubesaranggaran', ['bbanggaran'=>$bbanggaran, 'periode' => $periode, 'coa' => $coa, 'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo,'total'=>$total]);
    }
   
}

















// public function anggaran(Request $request)
// {

//     $bbanggaran = BukuBesarAnggaran::orderBy('tgl', 'asc')->get();
//     $anggaran = BukuBesarAnggaran::sum('anggaran');
//     $realisasi = BukuBesarAnggaran::sum('realisasi');
//     $coa = Coa::orderBy('created_at', 'asc')->get();
//     $periode = Periode::orderBy('created_at', 'asc')->get();
//     $jlh = 0;      
       
//     $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
//     $total = ($anggaran - $realisasi);
//     if($request->periode && $request->akun) {
//         $bbanggaran = BukuBesarAnggaran::Where('periode', $request->periode)->Where('akun', $request->akun)->get();
//         $anggaran = BukuBesarAnggaran::where('periode', $request->periode)->Where('akun', $request->akun)->sum('anggaran');
//         $realisasi = BukuBesarAnggaran::where('periode', $request->periode)->Where('akun', $request->akun)->sum('realisasi');
//         $total = ($anggaran - $realisasi);
//     }
//     // if ($request->akun !=null) {
//     //     $bbanggaran = BukuBesarAnggaran::Where('akun', $request->akun)->get();
//     //     $anggaran = BukuBesarAnggaran::where('akun', $request->akun)->sum('anggaran');
//     //     $realisasi = BukuBesarAnggaran::where('akun', $request->akun)->sum('realisasi');
//     //     $total = ($anggaran - $realisasi);
//     // }
//     return view('bukubesar/anggaran', ['bbanggaran'=>$bbanggaran, 'periode' => $periode, 'coa' => $coa, 'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo,'total'=>$total]);
// }


//     public function anggaran(Request $request)
//     {
//         $jlh = 0;
//         $id=$request->id;
//         $kode=$request->id;
//         $bbanggaran = BukuBesarAnggaran::orderBy('tgl', 'asc')->where('akun',$id)->orWhere('periode',$kode)->get();   
//         $anggaran = BukuBesarAnggaran::where('akun',$id)->orWhere('periode',$kode)->sum('anggaran');
//         $realisasi = BukuBesarAnggaran::where('akun',$id)->orWhere('periode',$kode)->sum('realisasi');

//         $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
//         $total = $anggaran - $realisasi;
//         return view('bukubesar/anggaran', ['bbanggaran'=>$bbanggaran,'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo,
//         'total'=>$total]);
//     }
