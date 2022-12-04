<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\BukuBesar\BukuBesarBiaya;
use App\Models\Akuns;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranBiayaController extends Controller
{
    public function bukubesaranggaranbiaya()
    {
        $jlh = 0;
        $bbbiaya = BukuBesarBiaya::orderBy('tgl', 'desc')->get();
        $anggaran = BukuBesarBiaya::sum('anggaran');
        $realisasi = BukuBesarBiaya::sum('realisasi');
        $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
        $totalbbbiaya = $anggaran - $realisasi;
        return view('bukubesar/bukubesaranggaranbiaya', ['bbbiaya' => $bbbiaya,'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo, 'totalbbbiaya'=>$totalbbbiaya]);
    }
}
