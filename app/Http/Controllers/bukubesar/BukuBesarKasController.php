<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use App\Models\Realisasi\KasKeluar;
use App\Http\Controllers\Controller;

class BukuBesarKasController extends Controller
{
    public function bukubesarkas()
    {
        $masuk = KasMasuk::all();
        $keluar = KasKeluar::all();
        $hasils = [];
        foreach ($masuk as $m) {
            $hasils[] = [
                "no_bukti" => $m->no_bukti,
                "periode" => $m->periode,
                "tanggal_pencatatan" => $m->tanggal_pencatatan,
                "keterangan" => $m->keterangan,
                "akun" => $m->akun,
                "sumber" => $m->sumber,
                "jumlah" => $m->jumlah,
                "kasir" => $m->kasir,
                "status" => "masuk"
            ];
        }
        foreach ($keluar as $k) {
            $hasils[] = [
                "no_bukti" => $k->no_bukti,
                "periode" => $k->periode,
                "tanggal_pencatatan" => $k->tanggal_pencatatan,
                "keterangan" => $k->keterangan,
                "akun" => $k->akun,
                "jumlah" => $k->jumlah,
                "bukti" => $k->bukti,
                "kasir" => $k->kasir,
                "status" => "keluar"
            ];
        }
        array_multisort($hasils, SORT_ASC, "tanggal_pencatatan");
        // return $hasils;

        return view('bukubesar/bukubesarkas', ['hasils' => $hasils]);
    }
}


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