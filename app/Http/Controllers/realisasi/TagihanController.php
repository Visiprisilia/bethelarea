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
use App\Models\Coa\Coa;
use Illuminate\Validation\Rule;

class TagihanController extends Controller
{
	//daftar tagihan
	public function tagihan()
    {
		$tagihan = Periode::orderBy('created_at', 'desc')->get();
 
        return view('realisasi/tagihan/tagihan', compact('tagihan'));
    }
	public function viewtagihan(Request $request)
    {
		$id = $request->id;
		$totals = DaftarTagihan::where('daftar_periode_tagihan', $id)->sum('daftar_nominal_tagihan');
        $tagihan = DaftarTagihan::join("murid","daftartagihan.daftar_nis_tagihan","=","murid.nomor_induk")
		->where('daftar_periode_tagihan', $id)
		->orderBy('daftar_nis_tagihan','desc')->get();
        return view('realisasi/tagihan/viewtagihan', compact('tagihan','totals'));
    }
	
	public function cetaktagihan()
    {
		$cetaktagihan = Periode::orderBy('created_at', 'desc')->get();
 
        return view('realisasi/tagihan/cetaktagihan', compact('cetaktagihan'));
    }
	public function viewcetaktagihan(Request $request)
    {
		$id = $request->id;
		$totals = DaftarTagihan::where('daftar_periode_tagihan', $id)->sum('daftar_nominal_tagihan');
        $tagihan = DaftarTagihan::join("murid","daftartagihan.daftar_nis_tagihan","=","murid.nomor_induk")
		->where('daftar_periode_tagihan', $id)
		->orderBy('daftar_nis_tagihan','desc')->get();
        return view('realisasi/tagihan/viewcetaktagihan', compact('tagihan','totals'));
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
			'nis_tagihan' => ['required',Rule::unique('tagihan_murid')->where('periode_tagihan', $request->periode_tagihan)],
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
	
	//tagihan per murid
	public function lihattagihanmurid($id_tagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$tagihans = DaftarRincianTagihan::join("murid","daftarrinciantagihan.rincian_nis_tagihan","=","murid.nomor_induk")
		->where('id_tagihan', $id_tagihan)->get()->first();
		$tagihan = DaftarRincianTagihan::join('Coa','daftarrinciantagihan.rincian_namakategori_tagihan','=','coa.kode_akun')
		->where('id_tagihan', $id_tagihan)->get();
		$total = DaftarRincianTagihan::where('id_tagihan', $id_tagihan)->sum('rincian_nominal_tagihan');
		return view('realisasi/tagihan/lihattagihanmurid',  ['tagihan'=>$tagihan,'tagihans'=>$tagihans,'total'=>$total,
		'periode'=>$periode,'murid'=>$murid]);
	}
	public function cetaklihattagihanmurid($id_tagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$tagihans = DaftarRincianTagihan::join("murid","daftarrinciantagihan.rincian_nis_tagihan","=","murid.nomor_induk")
		->where('id_tagihan', $id_tagihan)->get()->first();
		$tagihan = DaftarRincianTagihan::join('Coa','daftarrinciantagihan.rincian_namakategori_tagihan','=','coa.kode_akun')
		->where('id_tagihan', $id_tagihan)->get();
		$total = DaftarRincianTagihan::where('id_tagihan', $id_tagihan)->sum('rincian_nominal_tagihan');
		return view('realisasi/tagihan/cetaklihattagihanmurid',  ['tagihan'=>$tagihan,'tagihans'=>$tagihans,'total'=>$total,
		'periode'=>$periode,'murid'=>$murid]);
	}
	public function tambahtagihanmurid($id_tagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		// $kategori = KategoriTagihanMurid::orderBy('created_at','desc')->get();
		$coa = Coa::where('status_coa','like','tagihan')->orderBy('kode_akun','asc')->get();
		$tagihans = DaftarRincianTagihan::where('id_tagihan', $id_tagihan)->get()->first();
		$tagihan = DaftarRincianTagihan::join("tagihan_murid","daftarrinciantagihan.id_tagihan","=","tagihan_murid.id_tagihan")
		->where('daftarrinciantagihan.id_tagihan', $id_tagihan)->get();
		// $tagihan = DaftarTagihan::join("murid","daftartagihan.daftar_nis_tagihan","=","murid.nomor_induk")->get();
		return view('realisasi/tagihan/tambahtagihanmurid',  ['periode'=>$periode,'murid'=>$murid,'coa'=>$coa,'tagihan'=>$tagihan,
		'tagihans'=>$tagihans]);
	}

	public function simpantagihanmurid(Request $request)
	{		
		$validator = Validator::make($request->all(), [	
			'kode_akun' => ['required',Rule::unique('item_tagihan')->where('id_tagihan', $request->id_tagihan)],
			'nominal_tagihan' => 'required',
		],[
			"kode_akun.required"=>"Jenis Tagihan tidak boleh kosong",
			"kode_akun.unique"=>"Jenis Tagihan tersebut sudah terdaftar",
			"nominal_tagihan.required"=>"Jumlah Tagihan tidak boleh kosong",
			"nominal_tagihan.numeric"=>"Jumlah harus berupa nilai rupiah",	
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tagihan')->withErrors($validator);
			// return redirect('/tagihan')->with('status', 'Data berhasil ditambahkan');

		}
		$nominal_tagihan = $request->nominal_tagihan;
		$jumlahs = str_replace(array('','.'),'',$nominal_tagihan);
		$id_tagihan = $request->id_tagihan;
		ItemTagihan::where('id_tagihan', $request->id_tagihan)->create([			
		// ItemTagihan::create([			
			'id_itemtagihan'=>$request->id_itemtagihan, 
			'id_tagihan'=>$id_tagihan, 
			'kode_akun'=>$request->kode_akun, 
			'nominal_tagihan'=>$jumlahs, 
			]);
			return redirect('/tagihan')->with('status', 'Data berhasil ditambahkan');
	}
		public function edittagihanmurid($id_itemtagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$kategori = KategoriTagihanMurid::orderBy('created_at','desc')->get();
		$coa = Coa::where('status_coa','like','tagihan')->orderBy('kode_akun','asc')->get();
		$tagihan = ItemTagihan::where('id_itemtagihan', $id_itemtagihan)->get();
		return view('realisasi/tagihan/edittagihanmurid',  ['tagihan'=>$tagihan,'periode'=>$periode,'murid'=>$murid,'coa'=>$coa]);
	}
	public function updatetagihanmurid(Request $request)
	{       
		$nominal_tagihan = $request->nominal_tagihan;
		$jumlahs = str_replace(array('','.'),'',$nominal_tagihan);
        $tagihan = ItemTagihan::where('id_itemtagihan', $request->id_itemtagihan)->update([
			// 'id_tagihan'=>$request->id_tagihan, 
			'id_itemtagihan'=>$request->id_itemtagihan, 
			'id_tagihan'=>$request->id_tagihan, 
			'kode_akun'=>$request->kode_akun, 
			'nominal_tagihan'=>$jumlahs, 
		]);
		return redirect('/tagihan')->with('status', 'Data berhasil diubah');
	}
		public function hapustagihanmurid($id_itemtagihan)
	{
		$tagihan = ItemTagihan::where('id_itemtagihan', $id_itemtagihan)->delete();
		return redirect('/tagihan') -> with ('status', 'Data berhasil dihapus');
	}	
}