<?php

namespace App\Http\Controllers\ttd;

use Illuminate\Http\Request;
use App\Models\Ttd\Ttd;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class TtdController extends Controller
{
    public function ttd()
    {
        $ttd = Ttd::orderBy('created_at','desc')->get();
        return view('ttd/ttd', compact('ttd'));
    }
    public function tambahttd()
	{
		return view('ttd/tambahttd');
	}
    public function simpansumber(Request $request)
	{
		// $validator = Validator::make($request->all(), [	
		// 	'id_sumber' => 'required|numeric|unique:sumber',
		// 	'nama_sumber' => 'required|unique:sumber'
		// ],[
		// 	"id_sumber.required"=>"Kode sumber tidak boleh kosong",
		// 	"id_sumber.numeric"=>"Kode sumber harus berupa angka",
		// 	"id_sumber.unique"=>"Data Tersebut Sudah Terdaftar",
		// 	"nama_sumber.required"=>"Nama sumber tidak boleh kosong",
		// 	"nama_sumber.unique"=>"Data Tersebut Sudah Terdaftar"
			
		// ]);

		// if ($validator->fails()) {    
		// 	$message = $validator->errors()->getMessages();
		// 	$api = array(
		// 		'message' => $message
		// 	);
		// 	return redirect('/tambahsumber')->withErrors($validator);
			
		// }

		Ttd::create([
			'id_sumber'=>$request->id_sumber,
			'ketua_yayasan'=>$request->ketua_yayasan,	
			'bendahara_yayasan'=>$request->bendahara_yayasan,	
			'kepala_sekolah'=>$request->kepala_sekolah,	
			'bagian_administrasi'=>$request->bagian_administrasi,	
			'bendahara_sekolah'=>$request->bendahara_sekolah	
			]);
			return redirect('/ttd')->with('status', 'Data berhasil ditambahkan');
	}
	public function editttd($id_ttd)
	{
		$ttd = Ttd::where('id_ttd', $id_ttd)->get();
		return view('ttd/editttd', compact('ttd'));
	}
	public function updatettd(Request $request)
	{
		$ttd = Ttd::where('id_ttd', $request->id_ttd)->update([
			'ketua_yayasan'=>$request->ketua_yayasan,	
			'bendahara_yayasan'=>$request->bendahara_yayasan,	
			'kepala_sekolah'=>$request->kepala_sekolah,	
			'bagian_administrasi'=>$request->bagian_administrasi,	
			'bendahara_sekolah'=>$request->bendahara_sekolah	
		]);
		return redirect('/ttd')->with('status', 'Data berhasil diubah');
	}
	public function hapusttd($id_ttd)
	{
		$ttd = Ttd::where('id_ttd', $id_ttd)->delete();
		return redirect('/ttd') -> with ('status', 'Data berhasil dihapus');
	}
}