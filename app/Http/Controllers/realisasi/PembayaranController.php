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
	//unit
	public function pembayaranmurid()
    {
		$pembayaran = Periode::orderBy('created_at', 'desc')->get();   
        return view('realisasi/pembayaran/pembayaranmurid', compact('pembayaran'));
    }
	public function viewpembayaranmurid(Request $request)
    {
		$id = $request->id;
        $pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_periode', $id)
		->orderBy('rincian_nis','desc')->get();
        return view('realisasi/pembayaran/viewpembayaranmurid', compact('pembayaran'));
    }
	public function cetakpembayaranmurid()
    {
		$pembayaran = Periode::orderBy('created_at', 'desc')->get();   
        return view('realisasi/pembayaran/cetakpembayaranmurid', compact('pembayaran'));
    }
	public function viewcetakpembayaranmurid(Request $request)
    {
		$id = $request->id;
        $pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_periode', $id)
		->orderBy('rincian_nis','desc')->get();
        return view('realisasi/pembayaran/viewcetakpembayaranmurid', compact('pembayaran'));
    }

	//murids
	public function pembayaranmurids($rincian_nis)
    {		
		$pembayaran = Periode::orderBy('created_at', 'desc')->get();   
		$pembayarans = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_nis', $rincian_nis)->get()->first();
		$pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_nis', $rincian_nis)
		->orderBy('rincian_nis','desc')->get();	
        return view('realisasi/pembayaran/pembayaranmurids', compact('pembayaran','pembayarans'));
    }
	public function cetakpembayaranmurids($rincian_nis)
    {
		$pembayaran = Periode::orderBy('created_at', 'desc')->get();   
		$pembayarans = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_nis', $rincian_nis)->get()->first();
		$pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_nis', $rincian_nis)
		->orderBy('rincian_nis','desc')->get();	
        return view('realisasi/pembayaran/cetakpembayaranmurids', compact('pembayaran','pembayarans'));
    }
	// public function viewpembayaranmurids(Request $request)
    // {
	// 	$id = $request->id;
    //     $pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")	
	// 	->orderBy('rincian_nis','desc')->get();
    //     return view('realisasi/pembayaran/viewpembayaranmurids', compact('pembayaran'));
    // }	
	
	// public function cetakpembayaranmurids($rincian_nis)
    // {
	// 	$pembayaran = Periode::orderBy('created_at', 'desc')->get();   
	// 	$pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
	// 	->where('rincian_nis', $rincian_nis)
	// 	->orderBy('rincian_nis','desc')->get();	
    //     return view('realisasi/pembayaran/cetakpembayaranmurids', compact('pembayaran'));
    // }
	
	// public function viewcetakpembayaranmurids(Request $request)
    // {
	// 	$id = $request->id;
    //     $pembayaran = Pembayaran::join("murid","pembayaran.rincian_nis","=","murid.nomor_induk")
	// 	->where('rincian_periode', $id)
	// 	->where('rincian_nis', 'like','220220361')
	// 	->orderBy('rincian_nis','desc')->get();
    //     return view('realisasi/pembayaran/viewcetakpembayaranmurids', compact('pembayaran'));
    // }
 
	//tagihan per murid
	public function lihatpembayaranmurid($rincian_id)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_id', $rincian_id)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
        ->where('rincian_id', $rincian_id)->get();
		$tagihan = RincianPembayaran::where('rincian_id', $rincian_id)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_id', $rincian_id)->sum('pembayaran');
		$sisa = RincianPembayaran::where('rincian_id', $rincian_id)->sum('sisapembayaran');
		return view('realisasi/pembayaran/lihatpembayaranmurid',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}
	public function lihatpembayaranmurids($rincian_id)
	{
		$periode = Periode::orderBy('created_at','desc')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_id', $rincian_id)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
        ->where('rincian_id', $rincian_id)->get();
		$tagihan = RincianPembayaran::where('rincian_id', $rincian_id)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_id', $rincian_id)->sum('pembayaran');
		$sisa = RincianPembayaran::where('rincian_id', $rincian_id)->sum('sisapembayaran');
		return view('realisasi/pembayaran/lihatpembayaranmurids',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}
	public function cetaklihatpembayaranmurid($rincian_id)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_id', $rincian_id)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
        ->where('rincian_id', $rincian_id)->get();
		$tagihan = RincianPembayaran::where('rincian_id', $rincian_id)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_id', $rincian_id)->sum('pembayaran');
		$sisa = RincianPembayaran::where('rincian_id', $rincian_id)->sum('sisapembayaran');
		return view('realisasi/pembayaran/cetaklihatpembayaranmurid',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}

	public function cetaklihatpembayaranmurids($rincian_id)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_id', $rincian_id)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
        ->where('rincian_id', $rincian_id)->get();
		$tagihan = RincianPembayaran::where('rincian_id', $rincian_id)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_id', $rincian_id)->sum('pembayaran');
		$sisa = RincianPembayaran::where('rincian_id', $rincian_id)->sum('sisapembayaran');
		return view('realisasi/pembayaran/cetaklihatpembayaranmurids',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}

	
	//untuk murid
	// public function lihatpembayaranmurids()
	// {
	// 	$periode = Periode::orderBy('created_at','desc')->get();
	// 	$murid = Murid::orderBy('created_at','desc')->get();
	// 	$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")->get()->first();
	// 	$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')->get();
	// 	$tagihan = RincianPembayaran::sum('rincian_nominal');
	// 	$bayaran = RincianPembayaran::sum('pembayaran');
	// 	$sisa = RincianPembayaran::sum('sisapembayaran');
	// 	return view('realisasi/pembayaran/lihatpembayaranmurids',  ['pembayaran'=>$pembayaran,
	// 	'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	// }
	public function viewlihatpembayaranmurids(Request $request)
    {
		$id = $request->id;
		$periode = Periode::orderBy('created_at','desc')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
		->where('rincian_periode', $id)->get()->first();
		$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
		->where('rincian_periode', $id)->get();
		$tagihan = RincianPembayaran::where('rincian_periode', $id)->sum('rincian_nominal');
		$bayaran = RincianPembayaran::where('rincian_periode', $id)->sum('pembayaran');
		$sisa = RincianPembayaran::sum('sisapembayaran');
		return view('realisasi/pembayaran/viewlihatpembayaranmurids',  ['pembayaran'=>$pembayaran,
		'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	}
	// public function viewlihatpembayaranmurids(Request $request)
    // {
	// 	$id = $request->id;
	// 	$periode = Periode::orderBy('created_at','desc')->get();
	// 	$murid = Murid::orderBy('created_at','desc')->get();
	// 	$pembayarans = RincianPembayaran::join("murid","rincianpembayaran.rincian_nis","=","murid.nomor_induk")
	// 	->where('rincian_periode', $id)->where('rincian_id','=',1)->get()->first();
	// 	$pembayaran = RincianPembayaran::join('Coa','rincianpembayaran.rincian_namakategori','=','coa.kode_akun')
	// 	->where('rincian_periode', $id)->where('rincian_id','=',1)->get();
	// 	$tagihan = RincianPembayaran::where('rincian_periode', $id)->where('rincian_id','=',1)->sum('rincian_nominal');
	// 	$bayaran = RincianPembayaran::where('rincian_periode', $id)->where('rincian_id','=',1)->sum('pembayaran');
	// 	$sisa = RincianPembayaran::where('rincian_id','=',1)->sum('sisapembayaran');
	// 	return view('realisasi/pembayaran/viewlihatpembayaranmurids',  ['pembayaran'=>$pembayaran,
	// 	'pembayarans'=>$pembayarans,'tagihan'=>$tagihan,'bayaran'=>$bayaran,'sisa'=>$sisa,'periode'=>$periode,'murid'=>$murid]);
	// }
}