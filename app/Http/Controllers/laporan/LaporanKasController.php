<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Models\Realisasi\KasMasuk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanKasController extends Controller
{
    public function laporankas()
    {
        $masuk = DB::table('kas_masuk')->select('no_bukti','tanggal_pencatatan','keterangan','jumlah');
        $keluar = DB::table('kas_keluar')->select('no_bukti','tanggal_pencatatan','keterangan','jumlah');
        $hasils = $masuk->union($keluar)->get();
        return view('laporan/laporankas', ['hasils'=>$hasils]);
    }
    public function cetaklaporankas()
    {
        $masuk = DB::table('kas_masuk')->select('no_bukti','tanggal_pencatatan','keterangan','jumlah');
        $keluar = DB::table('kas_keluar')->select('no_bukti','tanggal_pencatatan','keterangan','jumlah');
        $hasils = $masuk->union($keluar)->get();
        return view('laporan/cetaklaporankas', ['hasils'=>$hasils]);
    }

}