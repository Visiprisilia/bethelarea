<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesarKas;
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
        foreach($masuk as $m){
            $hasils[] = [
                "no_bukti"=>$m->no_bukti,
                "periode"=>$m->periode,
                "tanggal_pencatatan"=>$m->tanggal_pencatatan,
                "keterangan"=>$m->keterangan,
                "akun"=>$m->akun,
                "sumber"=>$m->sumber,
                "jumlah"=>$m->jumlah,
                "kasir"=>$m->kasir,
                "status"=>"masuk"
            ];
        }
        foreach($keluar as $k){
            $hasils[] = [
                "no_bukti"=>$k->no_bukti,
                "periode"=>$k->periode,
                "tanggal_pencatatan"=>$k->tanggal_pencatatan,
                "keterangan"=>$k->keterangan,
                "akun"=>$k->akun,
                "jumlah"=>$k->jumlah,
                "bukti"=>$k->bukti,
                "kasir"=>$k->kasir,
                "status"=>"keluar"
            ];
        }
        // // array_multisort($hasils, SORT_ASC, "tanggal_pencatatan");
        // // return $hasils;
        return view('bukubesar/bukubesarkas', ['hasil'=>$hasils]);
    }
}