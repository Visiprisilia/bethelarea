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


class TagihanController extends Controller
{
	public function tagihan()
    {
        $tagihan = Tagihan::leftjoin("murid","tagihan.nis_tagihan","=","murid.nomor_induk")->orderBy('tagihan.created_at','desc')->get();
        return view('realisasi/tagihan/tagihan', compact('tagihan'));
    }
    public function tambahtagihan()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();

		return view('realisasi/tagihan/tambahtagihan', ['periode'=>$periode,'murid'=>$murid]);
	}
    public function simpantagihan(Request $request)
	{		
		$validator = Validator::make($request->all(), [	
			'periode_tagihan' => 'required',
			'nis_tagihan' => 'required',
			'uang_pendaftaran' => 'numeric|required',
			'uang_pengembanganpendidikan' => 'numeric|required',
			'uang_peralatan' => 'numeric|required',
			'uang_seragam' => 'numeric|required',
			'uang_parenting' => 'numeric|required',
			'uang_spp' => 'numeric|required',
			'uang_kegiatan' => 'numeric|required',
			// 'uang_lainlain' => 'numeric|required'

		],[
			"periode_tagihan.required"=>"Periode tidak boleh kosong",
			"nis_tagihan.required"=>"Nama Murid tidak boleh kosong",
			"uang_pendaftaran.required"=>"Uang Pendaftaran tidak boleh kosong",
			"uang_pendaftaran.numeric"=>"Uang Pendaftaran harus berupa nilai rupiah",
			"uang_pengembanganpendidikan.required"=>"Uang Pengembangan Pendidikan tidak boleh kosong",
			"uang_pengembanganpendidikan.numeric"=>"Uang Pengembangan Pendidikan berupa nilai rupiah",
			"uang_peralatan.required"=>"Uang Peralatan tidak boleh kosong",
			"uang_peralatan.numeric"=>"Uang Peralatan harus berupa nilai rupiah",
			"uang_seragam.required"=>"Uang Seragam tidak boleh kosong",
			"uang_seragam.numeric"=>"Uang Seragam harus berupa nilai rupiah",
			"uang_parenting.required"=>"Uang Parenting tidak boleh kosong",
			"uang_parenting.numeric"=>"Uang Parenting harus berupa nilai rupiah",
			"uang_spp.required"=>"Uang SPP tidak boleh kosong",
			"uang_spp.numeric"=>"Uang SPP harus berupa nilai rupiah",
			"uang_kegiatan.required"=>"Uang kegiatan tidak boleh kosong",
			"uang_kegiatan.numeric"=>"Uang kegiatan harus berupa nilai rupiah",
			// "uang_lainlain.required"=>"Uang Lain-lain tidak boleh kosong",
			// "uang_lainlain.numeric"=>"Uang Lain-lain harus berupa nilai rupiah",
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahtagihan')->withErrors($validator);
			
		}
		
		$periode_tagihan = $request->periode_tagihan;
		$ambilct = Periode::where('kode_periode', $periode_tagihan)->get();
		$check = 0;
		foreach ($ambilct as $ct) {

			$check = $ct->counter_tagihan;
		}
		$id_tagihan = $check + 1;
		Tagihan::create([
			'id_tagihan'=>$id_tagihan, 
			'periode_tagihan'=>$request->periode_tagihan, 
			'nis_tagihan'=>$request->nis_tagihan, 
			'uang_pendaftaran'=>$request->uang_pendaftaran, 
			'uang_pengembanganpendidikan'=>$request->uang_pengembanganpendidikan,
			'uang_peralatan'=>$request->uang_peralatan,
			'uang_seragam'=>$request->uang_seragam,
			'uang_parenting'=>$request->uang_parenting,
			'uang_spp'=>$request->uang_spp,
			'uang_kegiatan'=>$request->uang_kegiatan,		

			]);
			Periode::where('kode_periode', $periode_tagihan)->update(
				['counter_tagihan'=>$check+1]);
			return redirect('/tagihan')->with('status', 'Data berhasil ditambahkan');
	}
	public function edittagihan($nis_tagihan)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$tagihan = Tagihan::where('nis_tagihan', $nis_tagihan)->get();
		return view('realisasi/tagihan/edittagihan',  ['tagihan'=>$tagihan,'periode'=>$periode,'murid'=>$murid]);
	}
	public function updatetagihan(Request $request)
	{       
        $tagihan = Tagihan::where('nis_tagihan', $request->nis_tagihan)->update([
			// 'id_tagihan'=>$request->id_tagihan, 
			'periode_tagihan'=>$request->periode_tagihan, 
			'nis_tagihan'=>$request->nis_tagihan, 
			'uang_pendaftaran'=>$request->uang_pendaftaran, 
			'uang_pengembanganpendidikan'=>$request->uang_pengembanganpendidikan,
			'uang_peralatan'=>$request->uang_peralatan,
			'uang_seragam'=>$request->uang_seragam,
			'uang_parenting'=>$request->uang_parenting,
			'uang_spp'=>$request->uang_spp,
			'uang_kegiatan'=>$request->uang_kegiatan,	
		]);
		return redirect('/tagihan')->with('status', 'Data berhasil diubah');
	}
	public function lihattagihan($nis_tagihan)
	{
		$tagihan = Tagihan::leftjoin("murid","tagihan.nis_tagihan","=","murid.nomor_induk")->where('nis_tagihan', $nis_tagihan)->get();
		return view('realisasi/tagihan/lihattagihan', compact('tagihan'));
	}
	public function cetaktagihan()
	{
		return view('realisasi/tagihan/cetaktagihan');
	}
	public function hapustagihan($nis_tagihan)
	{
		$tagihan = Tagihan::where('nis_tagihan', $nis_tagihan)->delete();
		return redirect('/tagihan') -> with ('status', 'Data berhasil dihapus');
	}	


}