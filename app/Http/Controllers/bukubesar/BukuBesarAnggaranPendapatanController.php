<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\BukuBesar\BukuBesarPendapatan;
use App\Models\Akuns;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranPendapatanController extends Controller
{
    public function bukubesaranggaranpendapatan()
    {
        $jlh =0;
        $bbpendapatan = BukuBesarPendapatan::orderBy('tgl','desc')->get();
        $anggaran = BukuBesarPendapatan::sum('anggaran');
        $realisasi = BukuBesarPendapatan::sum('realisasi');
        $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
        $totalbbpendapatan = $anggaran-$realisasi;
        return view('bukubesar/bukubesaranggaranpendapatan', ['bbpendapatan'=>$bbpendapatan, 'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo, 'totalbbpendapatan'=>$totalbbpendapatan]);
    }
}