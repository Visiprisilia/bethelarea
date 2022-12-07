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
        $bbkas = Periode::orderBy('created_at','desc')->get();
       
        return view('bukubesar/bukubesarkas', ['bbkas'=>$bbkas ]);
      }
      public function kas(Request $request){
        $id=$request->id;
        $jlh =0;
        $periode = Periode::orderBy('created_at','desc')->get();
        $bbkas = BukuBesarKas::orderBy('tgl','desc')->where('periode',$id)->get();  
        $tambah = BukuBesarKas::where('periode',$id)->sum('bertambah');
        $kurang = BukuBesarKas::where('periode',$id)->sum('berkurang');
        $saldo = ($jlh = $jlh + (int)'bertambah' - (int)'berkurang');
        $totalbbkas = $tambah-$kurang;
        return view('bukubesar/kas', ['bbkas'=>$bbkas, 'tambah'=>$tambah, 'kurang'=>$kurang, 'totalbbkas'=>$totalbbkas, 
        'saldo'=>$saldo,'periode'=>$periode ]);
      }
  }
//   public function bukubesaranggaran()
//   {
    
//       $bbanggaran = Coa::orderBy('created_at', 'asc')->get();       
//       return view('bukubesar/bukubesaranggaran', ['bbanggaran' => $bbanggaran]);
//   }

//   public function anggaran(Request $request)
//   {
//       $id=$request->id;
//       $jlh = 0;
//       $bbanggaran = BukuBesarAnggaran::orderBy('tgl', 'asc')->where('akun',$id)->get();   
//       $anggaran = BukuBesarAnggaran::where('akun',$id)->sum('anggaran');
//       $realisasi = BukuBesarAnggaran::where('akun',$id)->sum('realisasi');
//       $saldo = ($jlh = $jlh + (int)'anggaran' - (int)'realisasi');
//       $total = $anggaran - $realisasi;
//       return view('bukubesar/anggaran', ['bbanggaran'=>$bbanggaran,'anggaran'=>$anggaran,'realisasi'=>$realisasi,'saldo'=>$saldo,
//       'total'=>$total]);
//   }
// }