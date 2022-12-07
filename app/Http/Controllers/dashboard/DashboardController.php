<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\BukuBesar\BukuBesarAnggaran;
use App\Models\Akuns;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jlh = 0;
        $bbanggaran = BukuBesarAnggaran::orderBy('tgl', 'asc')->get();
        $anggaran = BukuBesarAnggaran::sum('anggaran');
        $realisasi = BukuBesarAnggaran::sum('realisasi');
        $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
        $total = $anggaran - $realisasi;
        return view('dashboard/dashboard', ['bbanggaran' => $bbanggaran,'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo, 
        'total'=>$total]);
    }
}
