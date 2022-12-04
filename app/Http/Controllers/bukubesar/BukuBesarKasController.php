<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use App\Models\Realisasi\KasKeluar;
use App\Models\Periode\Periode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BukuBesar\BukuBesarKas;

class BukuBesarKasController extends Controller
{
    public function bukubesarkas()
    {
        $jlh =0;
        $periode = Periode::orderBy('created_at','desc')->get();
        $bbkas = BukuBesarKas::orderBy('tgl','desc')->get();
        $tambah = BukuBesarKas::sum('bertambah');
        $kurang = BukuBesarKas::sum('berkurang');
        $saldo = ($jlh = $jlh + (int)'bertambah' - (int)'berkurang');
        $totalbbkas = $tambah-$kurang;
        return view('bukubesar/bukubesarkas', ['bbkas'=>$bbkas, 'tambah'=>$tambah, 'kurang'=>$kurang, 'totalbbkas'=>$totalbbkas, 
        'saldo'=>$saldo,'periode'=>$periode ]);
      }
      public function cariperiodebbk(Request $request){
        $select = $request->get('select');
        $bb = BukuBesarKas::where('akun','LIKE','$select');
        return view('bukubesar/bukubesarkas', ['select'=>$select, 'bb'=>$bb ]);
      }
  }
