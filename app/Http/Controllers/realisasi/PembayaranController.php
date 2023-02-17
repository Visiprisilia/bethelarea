<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasBon;
use App\Models\Realisasi\Tagihan;
use App\Models\Murid\Murid;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\Akuns;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai\Pegawai;
use App\Models\ProgramKerja\Anggaran;
use Carbon\Carbon;
use App\Models\BukuBesar\BukuBesarKas;
use App\Http\Controllers\Controller;
use App\Models\Realisasi\DaftarTagihan;
use App\Models\Realisasi\DaftarRincianTagihan;
use App\Models\Realisasi\KategoriTagihanMurid;
use App\Models\Realisasi\ItemTagihan;
use App\Models\Realisasi\Pembayaran;
// use App\Models\Realisasi\Pembaran;
use App\Models\Coa\Coa;
use App\Models\Realisasi\RincianPembayaran;
use Illuminate\Validation\Rule;

class PembayaranController extends Controller
{
	
	public function pembayaranmurid()
    {
        $pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->orderBy('rincian_nis','desc')->get();
        return view('realisasi/pembayaran/pembayaranmurid', compact('pembayaran'));
    }
 
	//tagihan per murid
	public function lihatpembayaranmurid($rincian_nis)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_nis', $rincian_nis)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
        ->where('rincian_nis', $rincian_nis)->get();
		$tagihan = RincianPembayaran::where('rincian_nis', $rincian_nis)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_nis', $rincian_nis)->sum('pembayaran');
		$sisa = RincianPembayaran::where('rincian_nis', $rincian_nis)->sum('sisapembayaran');
		return view('realisasi/pembayaran/lihatpembayaranmurid',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}
	public function lihatpembayaranmurids($rincian_nis)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_nis', $rincian_nis)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
        ->where('rincian_nis', $rincian_nis)->get();
		$tagihan = RincianPembayaran::where('rincian_nis', $rincian_nis)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_nis', $rincian_nis)->sum('pembayaran');
		$sisa = RincianPembayaran::where('rincian_nis', $rincian_nis)->sum('sisapembayaran');
		return view('realisasi/pembayaran/lihatpembayaranmurids',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}
}