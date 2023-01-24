<?php

namespace App\Http\Controllers\sumber;

use Illuminate\Http\Request;
use App\Models\Sumber\Sumber;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SumberController extends Controller
{
    public function sumber()
    {
        $sumber = Sumber::orderBy('created_at','desc')->get();
        return view('sumber/sumber', compact('sumber'));
    }
    public function tambahsumber()
	{
		return view('sumber/tambahsumber');
	}
    public function simpansumber(Request $request)
	{
		$validator = Validator::make($request->all(), [	
			'id_sumber' => 'required|numeric|unique:sumber',
			'nama_sumber' => 'required|unique:sumber'
		],[
			"id_sumber.required"=>"Kode sumber tidak boleh kosong",
			"id_sumber.numeric"=>"Kode sumber harus berupa angka",
			"id_sumber.unique"=>"Data Tersebut Sudah Terdaftar",
			"nama_sumber.required"=>"Nama sumber tidak boleh kosong",
			"nama_sumber.unique"=>"Data Tersebut Sudah Terdaftar"
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahsumber')->withErrors($validator);
			
		}

		Sumber::create([
			'id_sumber'=>$request->id_sumber,
			'nama_sumber'=>$request->nama_sumber	
			]);
			return redirect('/sumber')->with('status', 'Data berhasil ditambahkan');
	}
	public function editsumber($id_sumber)
	{
		$sumber = Sumber::where('id_sumber', $id_sumber)->get();
		return view('sumber/editsumber', compact('sumber'));
	}
	public function updatesumber(Request $request)
	{
		$sumber = Sumber::where('id_sumber', $request->id_sumber)->update([
			'id_sumber'=>$request->id_sumber,
			'nama_sumber'=>$request->nama_sumber
		]);
		return redirect('/sumber')->with('status', 'Data berhasil diubah');
	}
	public function hapussumber($id_sumber)
	{
		$sumber = Sumber::where('id_sumber', $id_sumber)->delete();
		return redirect('/sumber') -> with ('status', 'Data berhasil dihapus');
	}
}