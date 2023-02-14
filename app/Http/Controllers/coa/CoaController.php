<?php

namespace App\Http\Controllers\coa;

use Illuminate\Http\Request;
use App\Models\Coa\Coa;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CoaController extends Controller
{
    public function coa()
    {
        $coa = Coa::orderBy('kode_akun','asc')->get();
        return view('coa/coa', compact('coa'));
    }
    public function tambahcoa()
	{
		return view('coa/tambahcoa');
	}
    public function simpancoa(Request $request)
	{
		$validator = Validator::make($request->all(), [	
			'kode_akun' => 'required|unique:coa|numeric',
			'nama_akun' => 'required|unique:coa',
			'kelompok_rek' => 'required',
			'saldo_normal' => 'required'
		],[
			"kode_akun.required"=>"Kode akun tidak boleh kosong",
			"kode_akun.unique"=>"Kode akun tersebut sudah terdaftar",
			"kode_akun.numeric"=>"Kode akun harus berupa angka",
			"nama_akun.required"=>"Nama akun tidak boleh kosong",
			"nama_akun.unique"=>"Nama akun tersebut sudah terdaftar",
			"kelompok_rek.required"=>"Kelompok rekening tidak boleh kosong",
			"saldo_normal.required"=>"Saldo normal tidak boleh kosong"
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahcoa')->withErrors($validator);
			// return $validator;
		}
		Coa::create([
			'kode_akun'=>$request->kode_akun,
			'nama_akun'=>$request->nama_akun,
			'kelompok_rek'=>$request->kelompok_rek,
			'saldo_normal'=>$request->saldo_normal,	
			'keterangan_coa'=>$request->keterangan_coa	
			]);
			
			return redirect('/coa')->with('status', 'Data berhasil ditambahkan!');
	}
	public function editcoa($kode_akun)
	{
		$coa = Coa::where('kode_akun', $kode_akun)->get();
		return view('coa/editcoa', compact('coa'));
	}
	public function updatecoa(Request $request)
	{
		$coa = Coa::where('kode_akun', $request->kode_akun)->update([
			'kode_akun'=>$request->kode_akun,
			'nama_akun'=>$request->nama_akun,
			'kelompok_rek'=>$request->kelompok_rek,
			'saldo_normal'=>$request->saldo_normal,	
			'keterangan_coa'=>$request->keterangan_coa	
		]);
		return redirect('/coa')->with('status', 'Data berhasil diubah');
	}
	public function hapuscoa($kode_akun)
	{
		$coa = Coa::where('kode_akun', $kode_akun)->delete();
		return redirect('/coa') -> with ('status', 'Data berhasil dihapus');
	}
}