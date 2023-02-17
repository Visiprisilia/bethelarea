<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\BukuBesar\BukuBesarAnggaran;
use App\Models\BukuBesar\BukuBesarKas;
use App\Models\Laporan\LaporanPosisiAnggaran;
use App\Models\Akuns;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
       
        return view('dashboard/home');
    }
    public function dashboard(Request $request)
    {
        $id = $request->id;
        $tanggalhariini = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $periode = Periode::orderBy('created_at', 'desc')->get();
        $periodess = Periode::orderBy('created_at', 'desc')->where('status', 'LIKE', 'AKTIF')->first();
        // $lapposisianggaran = LaporanPosisiAnggaran::where('periode', $id)->get();
        // $anggarans = LaporanPosisiAnggaran::join("periode","lapposisianggaran.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('anggaran');
        // $posisianggarans = LaporanPosisiAnggaran::join("periode","lapposisianggaran.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('posisi_anggaran');
        // $realisasis = LaporanPosisiAnggaran::join("periode","lapposisianggaran.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('realisasi');

        $laporankas = BukuBesarKas::where('periode',$id)->get();  
        $tambah = BukuBesarKas::join("periode","bbkas.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('bertambah');
        $kurang = BukuBesarKas::join("periode","bbkas.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('berkurang');
        $totalkas = $tambah-$kurang;
        return view('dashboard/dashboard', [
            'laporankas' => $laporankas, 'periode' => $periode, 'tambah' => $tambah,
            'kurang' => $kurang, 'tanggalhariini'=>$tanggalhariini, 'periodess'=>$periodess, 'totalkas'=>$totalkas
        ]);
    }
}
