<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\Akuns;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranBiayaController extends Controller
{
    public function bukubesaranggaranbiaya()
    {
        $periode = Periode::orderBy('created_at','desc')->get();
		$akun = Akuns::orderBy('created_at','desc')->get();
        $bbbiaya = ProgramKerja::join("akuns","program_kerja.kode_proker","=","akuns.kode_proker")
                                 ->where('kode_akun', 'like' , '5%')
                                 ->get();
        return view('bukubesar/bukubesaranggaranbiaya', ['bbbiaya'=>$bbbiaya,'akun'=>$akun,'periode'=>$periode]);
    }
}

// $users = DB::table('buku')
// ->join('kategori', 'buku.kategori_id', '=', 'kategori.kategori_id')
// ->select('buku.judul', 'buku.deskripsi', 'kategori.deskripsi', 'buku.id_buku')
// ->where('buku.id_buku', '=', $id_buku)
// ->get();

// SELECT 'Realisasi' AS kode, tanggal_pencatatan 
// FROM kas_keluar INNER JOIN program_kerja ON kas_keluar.kode_akun=program_kerja.kode_akun;
// UNION
// SELECT 'Anggaran' tanggal_pencatatan 
// FROM akuns;
