<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\Akuns;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranPendapatanController extends Controller
{
    public function bukubesaranggaranpendapatan()
    {
        $periode = Periode::orderBy('created_at','desc')->get();
		$akun = Akuns::orderBy('created_at','desc')->get();
        $bbpendapatan = ProgramKerja::join("akuns","program_kerja.kode_proker","=","akuns.kode_proker")
                            //  ->select('kode_akun','tanggal_pencatatan','keterangan','jumlah')
                                ->where('kode_akun', 'like' , '5%')
                                ->get();
        return view('bukubesar/bukubesaranggaranpendapatan', ['bbpendapatan'=>$bbpendapatan,'akun'=>$akun,'periode'=>$periode]);
    }
}