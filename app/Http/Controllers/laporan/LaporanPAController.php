<?php

namespace App\Http\Controllers\laporan;

use Illuminate\Http\Request;
use App\Models\Laporan\LaporanPosisiAnggaran;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Http\Controllers\Controller;

class LaporanPAController extends Controller
{
    public function laporanposisianggaran()
    {
        $lapposisianggaran = Periode::orderBy('created_at', 'desc')->get();
        return view('laporan/laporanposisianggaran', ['lapposisianggaran' => $lapposisianggaran]);
    }
    public function viewlpa(Request $request)
    {
        $id = $request->id;
        $periode = Periode::orderBy('created_at', 'desc')->get();
        $lapposisianggaran = LaporanPosisiAnggaran::where('periode', $id)->get();
        $anggarans = LaporanPosisiAnggaran::where('periode',$id)->sum('anggaran');
        $posisianggarans = LaporanPosisiAnggaran::where('periode',$id)->sum('posisi_anggaran');
        return view('laporan/viewlpa', ['lapposisianggaran' => $lapposisianggaran,'periode'=>$periode,'anggarans'=>$anggarans,
        'posisianggarans'=>$posisianggarans]);
    }
    public function cetaklaporanposisianggaran()
    {
        $lappa = Periode::orderBy('created_at', 'desc')->get();
        return view('laporan/cetaklaporanposisianggaran', ['lappa' => $lappa]);
    }
    public function viewcetaklpa(Request $request)
    {
        $id = $request->id;
        $periode = Periode::orderBy('created_at', 'desc')->get();
        $lappa = LaporanPosisiAnggaran::where('periode', $id)->get();
        $anggarans = LaporanPosisiAnggaran::where('periode',$id)->sum('anggaran');
        $posisianggarans = LaporanPosisiAnggaran::where('periode',$id)->sum('posisi_anggaran');
        return view('laporan/viewcetaklpa', ['lappa' => $lappa,'periode'=>$periode,'anggarans'=>$anggarans,
        'posisianggarans'=>$posisianggarans]);
    }
}

