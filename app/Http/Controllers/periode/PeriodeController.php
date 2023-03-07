<?php

namespace App\Http\Controllers\periode;

use Illuminate\Http\Request;
use App\Models\Periode\Periode;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PeriodeController extends Controller
{
    public function periode()
    {
        $periode = Periode::orderBy('created_at','desc')->get();
        return view('periode/periode', compact('periode'));
    }
    public function tambahperiode()
	{
		return view('periode/tambahperiode');
	}
    public function simpanperiode(Request $request)
	{ 
		$validator = Validator::make($request->all(), [	
			'nama_periode' => 'required|unique:periode',
			'awal_periode' => 'required',
			'akhir_periode' => 'required|unique:periode',
			'status' => 'required',
		],[
			"nama_periode.required"=>"Nama periode tidak boleh kosong",
			"nama_periode.unique"=>"Data Tersebut Sudah Terdaftar",
			"awal_periode.required"=>"Awal periode tidak boleh kosong",
			"akhir_periode.required"=>"Akhir periode tidak boleh kosong",
			"status.required"=>"Status tidak boleh kosong",
			"status.unique"=>"Hanya satu periode saja yang di aktifkan",
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahperiode')->withErrors($validator);
			
		}
		Periode::create([
			'kode_periode'=>$request->nama_periode,
			'nama_periode'=>$request->nama_periode,
			'awal_periode'=>$request->awal_periode,	
            'akhir_periode'=>$request->akhir_periode,	
			'status'=>$request->status	
			]);
			return redirect('/periode')->with('status', 'Data berhasil ditambahkan');
	}
	public function editperiode($kode_periode)
	{
		$periode = Periode::where('kode_periode', $kode_periode)->get();
		return view('periode/editperiode', compact('periode'));
	}
	public function updateperiode(Request $request)
	{
		$periode = Periode::where('kode_periode', $request->kode_periode)->update([
			'kode_periode'=>$request->nama_periode,
			'nama_periode'=>$request->nama_periode,
			'awal_periode'=>$request->awal_periode,	
            'akhir_periode'=>$request->akhir_periode,	
			'status'=>$request->status	
		]);
		return redirect('/periode')->with('status', 'Data berhasil diubah');
	}
	public function hapusperiode($kode_periode)
	{
		$periode = Periode::where('kode_periode', $kode_periode)->delete();
		return redirect('/periode') -> with ('status', 'Data berhasil dihapus');
	}
}