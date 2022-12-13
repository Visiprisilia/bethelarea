<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\BukuBesar\BukuBesarAnggaran;
use App\Models\Laporan\LaporanPosisiAnggaran;
use App\Models\Akuns;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $id = $request->id;
        $periode = Periode::orderBy('created_at', 'desc')->get();
        $lapposisianggaran = LaporanPosisiAnggaran::where('periode', $id)->get();
        $anggarans = LaporanPosisiAnggaran::join("periode","lapposisianggaran.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('anggaran');
        $posisianggarans = LaporanPosisiAnggaran::join("periode","lapposisianggaran.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->sum('posisi_anggaran');

        return view('dashboard/dashboard', [
            'lapposisianggaran' => $lapposisianggaran, 'periode' => $periode, 'anggarans' => $anggarans,
            'posisianggarans' => $posisianggarans
        ]);
    }
}
