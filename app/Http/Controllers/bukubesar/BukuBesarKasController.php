<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use App\Models\Realisasi\KasKeluar;
use App\Models\Periode\Periode;
use App\Models\Murid\Murid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BukuBesar\BukuBesarKas;

class BukuBesarKasController extends Controller
{
  public function bukubesarkas()
  {
    $bbkas = Periode::orderBy('created_at', 'desc')->get();

    return view('bukubesar/bukubesarkas', ['bbkas' => $bbkas]);
  }
  public function kas(Request $request)
  {
    $id = $request->id;
    $jlh = 0;
    $periode = Periode::orderBy('created_at', 'desc')->get();
    $bbkas = BukuBesarKas::orderBy('tgl', 'asc')->where('periode', $id)->get();
    $tambah = BukuBesarKas::where('periode', $id)->sum('bertambah');
    $kurang = BukuBesarKas::where('periode', $id)->sum('berkurang');
    $saldo = ($jlh = $jlh + (int)'bertambah' - (int)'berkurang');
    $totalbbkas = $tambah - $kurang;
    return view('bukubesar/kas', [
      'bbkas' => $bbkas, 'tambah' => $tambah, 'kurang' => $kurang, 'totalbbkas' => $totalbbkas,
      'saldo' => $saldo, 'periode' => $periode
    ]);
  }
  public function lihatkas($no_bukti)
  {
    $kasmasuk = KasMasuk::join("sumber","kas_masuk.sumber","=","sumber.id_sumber")
		->join("coa","kas_masuk.akun","=","coa.kode_akun")
    ->join("murid","kas_masuk.kasir","=","murid.nomor_induk")
    ->where('no_bukti', $no_bukti)->where('no_bukti','LIKE','BKM%')->get();
    $kaskeluar = KasKeluar::join("coa","kas_keluar.akun","=","coa.kode_akun")
    ->join("pegawai","kas_keluar.penanggungjawab","=","pegawai.niy")
    ->where('no_bukti', $no_bukti)->where('no_bukti','LIKE','BKK%')->get();

    if (count ($kaskeluar)==0) {
      return view('realisasi/kasmasuk/lihatkasmasuk', compact('kasmasuk'));
    } else{
        return view('realisasi/kaskeluar/lihatkaskeluar', compact('kaskeluar'));    
    }
  }
}
// public function lihatkas($no_bukti)
//   {
//     // // alert($kas); 
//     // $kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->where('no_bukti', 'LIKE', 'BKM%')->get();
//     // $kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->where('no_bukti', 'LIKE', 'BKK%')->get();
//     // $kas = $kasmasuk && $kaskeluar;
//     // switch ($kas) {
//     //   case $kasmasuk:
//     //     return view('realisasi/kasmasuk/lihatkasmasuk', compact('kasmasuk'));
//     //     break;
//     //   case $kaskeluar:
//     //     return view('realisasi/kaskeluar/lihatkaskeluar', compact('kaskeluar'));
//     //     break; }
//   }
// }
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