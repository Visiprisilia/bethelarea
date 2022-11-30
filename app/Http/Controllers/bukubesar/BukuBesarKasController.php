<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use App\Models\Realisasi\KasKeluar;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BukuBesarKasController extends Controller
{
    public function bukubesarkas()
    {
        $masuk = KasMasuk::all();
        $keluar = KasKeluar::all();
        $masuk = DB::table('kas_masuk')->select('no_bukti','keterangan','jumlah',);
        $keluar = DB::table('kas_keluar')->select('no_bukti','keterangan','jumlah');
        $bbkas = $masuk->union($keluar)->get();
        return view('bukubesar/bukubesarkas', ['bbkas'=>$bbkas]);
      }
  }
        // $hasils = [];
        // foreach ($masuk as $m) {
        //     $hasils[] = [
        //         "no_bukti" => $m->no_bukti,
        //         "periode" => $m->periode,
        //         "tanggal_pencatatan" => $m->tanggal_pencatatan,
        //         "keterangan" => $m->keterangan,
        //         "akun" => $m->akun,
        //         "sumber" => $m->sumber,
        //         "jumlah" => $m->jumlah,
        //         "kasir" => $m->kasir,
        //         "status" => "masuk"
        //     ];
        // }
        // foreach ($keluar as $k) {
        //     $hasils[] = [
        //         "no_bukti" => $k->no_bukti,
        //         "periode" => $k->periode,
        //         "tanggal_pencatatan" => $k->tanggal_pencatatan,
        //         "keterangan" => $k->keterangan,
        //         "akun" => $k->akun,
        //         "jumlah" => $k->jumlah,
        //         "bukti" => $k->bukti,
        //         "kasir" => $k->kasir,
        //         "status" => "keluar"
        //     ];
        // }
        // // array_multisort($hasils, SORT_ASC, "tanggal_pencatatan");
        // // return $hasils;
      
  // $bbkas = KasMasuk::orderBy('created_at','desc')->get();
//   $bbkas = KasMasuk::join("kas_keluar","kas_masuk.no_bukti","=","kas_keluar.no_bukti")->get();
// <td>{{ $loop->iteration}}</td>
//                             <td>{{ $item->no_bukti}}</td>
//                             <td>{{ $item->keterangan}}</td>
//                             @if($item->status=="masuk")
//                             <td>{{ $item->jumlah}}</td>
//                             <td>-</td>
//                             @else
//                             <td>-</td>
//                             <td>{{ $item->jumlah}}</td>
//                             @endif
//                             <td>{{ $item->saldo}}</td>    
// <!-- @foreach($hasils as $item)
//                         <tr>
//                             <td>{{ $loop->iteration}}</td>
//                             <td>{{ $item->no_bukti}}</td>
//                             <td>{{ $item->keterangan}}</td>
//                             @if($item->status=="masuk")
//                             <td>{{ $item->jumlah}}</td>
//                             <td>-</td>
//                             @else
//                             <td>-</td>
//                             <td>{{ $item->jumlah}}</td>
//                             @endif
//                             <td>{{ $item->saldo}}</td>      
                           
//                         </tr>  
//                         @endforeach   -->

// SELECT km.akun, km.keterangan, km.jumlah, "" as 'bertambah' 
// FROM kas_masuk km 
// UNION ALL 
// SELECT kk.akun, kk.keterangan, "", kk.jumlah 
// FROM kas_keluar kk;
// SELECT kas_masuk.jumlah as debit, kas_keluar.jumlah as kredit, 
// kas_masuk.jumlah-kas_keluar.jumlah as total 
// FROM kas_masuk 
// JOIN kas_keluar on kas_masuk.no_bukti = kas_keluar.no_bukti;