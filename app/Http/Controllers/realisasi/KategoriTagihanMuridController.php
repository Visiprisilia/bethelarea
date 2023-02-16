<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Sumber\Sumber;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Realisasi\KategoriTagihanMurid;

class KategoriTagihanMuridController extends Controller
{
    public function kategoritagihan()
    {
        $kategori = KategoriTagihanMurid::orderBy('created_at','desc')->get();
        return view('kategori/kategoritagihan', compact('kategori'));
    }
    public function tambahkategoritagihan()
	{
		return view('kategori/tambahkategoritagihan');
	}
    public function simpankategoritagihan(Request $request)
	{
		$validator = Validator::make($request->all(), [	
			'id_kategoritagihan' => 'required|numeric|unique:kategori_tagihanmurid',
			'nama_kategoritagihan' => 'required|unique:kategori_tagihanmurid'
		],[
			"id_kategoritagihan.required"=>"Kode Tagihan tidak boleh kosong",
			"id_kategoritagihan.numeric"=>"Kode Tagihan harus berupa angka",
			"id_kategoritagihan.unique"=>"Data Tersebut Sudah Terdaftar",
			"nama_kategoritagihan.required"=>"Jenis Tagihan tidak boleh kosong",
			"nama_kategoritagihan.unique"=>"Data Tersebut Sudah Terdaftar"
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahkategoritagihan')->withErrors($validator);
			
		}

		KategoriTagihanMurid::create([
			'id_kategoritagihan'=>$request->id_kategoritagihan,
			'nama_kategoritagihan'=>$request->nama_kategoritagihan	
			]);
			return redirect('/kategoritagihan')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkategoritagihan($id_kategoritagihan)
	{
		$kategori = KategoriTagihanMurid::where('id_kategoritagihan', $id_kategoritagihan)->get();
		return view('kategori/editkategoritagihan', compact('kategori'));
	}
	public function updatekategoritagihan(Request $request)
	{
		$kategori = KategoriTagihanMurid::where('id_kategoritagihan', $request->id_kategoritagihan)->update([
			'id_kategoritagihan'=>$request->id_kategoritagihan,
			'nama_kategoritagihan'=>$request->nama_kategoritagihan
		]);
		return redirect('/kategoritagihan')->with('status', 'Data berhasil diubah');
	}
	public function hapuskategoritagihan($id_kategoritagihan)
	{
		$kategori = KategoriTagihanMurid::where('id_kategoritagihan', $id_kategoritagihan)->delete();
		return redirect('/kategoritagihan') -> with ('status', 'Data berhasil dihapus');
	}
}