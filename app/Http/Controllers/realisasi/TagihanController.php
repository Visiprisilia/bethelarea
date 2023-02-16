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

class TagihanController extends Controller
{
	//daftar tagihan
	public function tagihan()
    {
        $tagihan = DaftarTagihan::join("murid","daftartagihan.daftar_nis_tagihan","=","murid.nomor_induk")

		->orderBy('daftar_nis_tagihan','desc')->get();
        return view('realisasi/tagihan/tagihan', compact('tagihan'));
    }
    public function tambahdaftartagihan()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();

		return view('realisasi/tagihan/tambahdaftartagihan', ['periode'=>$periode,'murid'=>$murid]);
	}
    public function simpandaftartagihan(Request $request)
	{		
		$validator = Validator::make($request->all(), [	
			'periode_tagihan' => 'required',
			'nis_tagihan' => 'required|unique:tagihan_murid',
		],[
			"periode_tagihan.required"=>"Periode tidak boleh kosong",
			"nis_tagihan.required"=>"Nama Murid tidak boleh kosong",
			"nis_tagihan.unique"=>"Murid tersebut sudah terdaftar",			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahdaftartagihan')->withErrors($validator);
		}
		
		Tagihan::create([
			'id_tagihan'=>$request->id_tagihan, 
			'periode_tagihan'=>$request->periode_tagihan, 
			'nis_tagihan'=>$request->nis_tagihan, 
			]);
		
			return redirect('/tagihan')->with('status', 'Data berhasil ditambahkan');
	}
	// public function edittagihan($nis_tagihan)
	// {
	// 	$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
	// 	$murid = Murid::orderBy('created_at','desc')->get();
	// 	$tagihan = Tagihan::where('nis_tagihan', $nis_tagihan)->get();
	// 	return view('realisasi/tagihan/edittagihan',  ['tagihan'=>$tagihan,'periode'=>$periode,'murid'=>$murid]);
	// }
	// public function updatetagihan(Request $request)
	// {       
    //     $tagihan = Tagihan::where('nis_tagihan', $request->nis_tagihan)->update([
	// 		// 'id_tagihan'=>$request->id_tagihan, 
	// 		'periode_tagihan'=>$request->periode_tagihan, 
	// 		'nis_tagihan'=>$request->nis_tagihan, 
	// 		'uang_pendaftaran'=>$request->uang_pendaftaran, 
	// 		'uang_pengembanganpendidikan'=>$request->uang_pengembanganpendidikan,
	// 		'uang_peralatan'=>$request->uang_peralatan,
	// 		'uang_seragam'=>$request->uang_seragam,
	// 		'uang_parenting'=>$request->uang_parenting,
	// 		'uang_spp'=>$request->uang_spp,
	// 		'uang_kegiatan'=>$request->uang_kegiatan,	
	// 	]);
	// 	return redirect('/tagihan')->with('status', 'Data berhasil diubah');
	// }
	// public function lihattagihan($nis_tagihan)
	// {
	// 	$tagihan = Tagihan::leftjoin("murid","tagihan.nis_tagihan","=","murid.nomor_induk")->where('nis_tagihan', $nis_tagihan)->get();
	// 	return view('realisasi/tagihan/lihattagihan', compact('tagihan'));
	// }
	// public function cetaktagihan()
	// {
	// 	return view('realisasi/tagihan/cetaktagihan');
	// }
	// public function hapustagihan($nis_tagihan)
	// {
	// 	$tagihan = Tagihan::where('nis_tagihan', $nis_tagihan)->delete();
	// 	return redirect('/tagihan') -> with ('status', 'Data berhasil dihapus');
	// }	


	//tagihan per murid
	public function lihattagihanmurid($id_tagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$tagihans = DaftarRincianTagihan::join("murid","daftarrinciantagihan.rincian_nis_tagihan","=","murid.nomor_induk")
		->where('id_tagihan', $id_tagihan)->get()->first();
		$tagihan = DaftarRincianTagihan::where('id_tagihan', $id_tagihan)->get();
		return view('realisasi/tagihan/lihattagihanmurid',  ['tagihan'=>$tagihan,'tagihans'=>$tagihans,'periode'=>$periode,'murid'=>$murid]);
	}
	public function tambahtagihanmurid()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$kategori = KategoriTagihanMurid::orderBy('created_at','desc')->get();
		// $tagihan = DaftarTagihan::join("murid","daftartagihan.daftar_nis_tagihan","=","murid.nomor_induk")->get();
		return view('realisasi/tagihan/tambahtagihanmurid',  ['periode'=>$periode,'murid'=>$murid,'kategori'=>$kategori]);
	}

	public function simpantagihanmurid(Request $request)
	{		
		$validator = Validator::make($request->all(), [	
			'id_kategoritagihan' => 'required',
			'nominal_tagihan' => 'required|numeric',
		],[
			"id_kategoritagihan.required"=>"Jenis Tagihan tidak boleh kosong",
			"nominal_tagihan.required"=>"Jumlah Tagihan tidak boleh kosong",
			"nominal_tagihan.numeric"=>"Jumlah harus berupa nilai rupiah",	
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahtagihanmurid')->withErrors($validator);
		}		
		$id_tagihan = $request->id_tagihan;
		ItemTagihan::where('id_tagihan', $request->id_tagihan)->create([			
		// ItemTagihan::create([			
			'id_itemtagihan'=>$request->id_itemtagihan, 
			'id_tagihan'=>$id_tagihan, 
			'id_kategoritagihan'=>$request->id_kategoritagihan, 
			'nominal_tagihan'=>$request->nominal_tagihan, 
			]);
			return redirect('/lihattagihanmurid')->with('status', 'Data berhasil ditambahkan');
	}
		public function edittagihanmurid($id_itemtagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$kategori = KategoriTagihanMurid::orderBy('created_at','desc')->get();
		$tagihan = ItemTagihan::where('id_itemtagihan', $id_itemtagihan)->get();
		return view('realisasi/tagihan/edittagihanmurid',  ['tagihan'=>$tagihan,'periode'=>$periode,'murid'=>$murid,'kategori'=>$kategori]);
	}
	public function updatetagihanmurid(Request $request)
	{       
        $tagihan = ItemTagihan::where('id_itemtagihan', $request->id_itemtagihan)->update([
			// 'id_tagihan'=>$request->id_tagihan, 
			'id_itemtagihan'=>$request->id_itemtagihan, 
			'id_tagihan'=>$request->id_tagihan, 
			'id_kategoritagihan'=>$request->id_kategoritagihan, 
			'nominal_tagihan'=>$request->nominal_tagihan, 
		]);
		return redirect('/tagihan')->with('status', 'Data berhasil diubah');
	}
		public function hapustagihanmurid($id_itemtagihan)
	{
		$tagihan = ItemTagihan::where('id_itemtagihan', $id_itemtagihan)->delete();
		return redirect('/tagihan') -> with ('status', 'Data berhasil dihapus');
	}	
}