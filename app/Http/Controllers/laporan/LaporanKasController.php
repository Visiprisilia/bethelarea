<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesarKas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanKasController extends Controller
{
    public function laporankas()
    {
        $tambah = BukuBesarKas::sum('bertambah');
        $kurang = BukuBesarKas::sum('berkurang');
        $totalkas = $tambah-$kurang;
        return view('laporan/laporankas', ['tambah'=>$tambah,'kurang'=>$kurang,'totalkas'=>$totalkas]);
    }
    public function cetaklaporankas()
    {
        $tambah = BukuBesarKas::sum('bertambah');
        $kurang = BukuBesarKas::sum('berkurang');
        $totalkas = $tambah-$kurang;
        return view('laporan/cetaklaporankas', ['tambah'=>$tambah,'kurang'=>$kurang,'totalkas'=>$totalkas]);
    }

}