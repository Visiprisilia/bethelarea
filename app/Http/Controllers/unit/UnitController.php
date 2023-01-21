<?php

namespace App\Http\Controllers\unit;

use Illuminate\Http\Request;
use App\Models\Unit\Unit;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function unit()
    {
        $unit = Unit::orderBy('created_at','desc')->get();
        return view('unit/unit', compact('unit'));
    }
    public function tambahunit()
	{
		return view('unit/tambahunit');
	}
    public function simpanunit(Request $request)
	{
		$validator = Validator::make($request->all(), [	
			'kode_unit' => 'required|numeric|unique:unit',
			'nama_unit' => 'required|unique:unit'
		],[
			"kode_unit.required"=>"Kode unit tidak boleh kosong",
			"kode_unit.numeric"=>"Kode unit harus berupa angka",
			"kode_unit.unique"=>"Data Tersebut Sudah Terdaftar",
			"nama_unit.required"=>"Nama unit tidak boleh kosong",
			"nama_unit.unique"=>"Data Tersebut Sudah Terdaftar"
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahunit')->withErrors($validator);
			
		}

		Unit::create([
			'kode_unit'=>$request->kode_unit,
			'nama_unit'=>$request->nama_unit	
			]);
			return redirect('/unit')->with('status', 'Data berhasil ditambahkan');
	}
	public function editunit($kode_unit)
	{
		$unit = Unit::where('kode_unit', $kode_unit)->get();
		return view('unit/editunit', compact('unit'));
	}
	public function updateunit(Request $request)
	{
		$unit = Unit::where('kode_unit', $request->kode_unit)->update([
			'kode_unit'=>$request->kode_unit,
			'nama_unit'=>$request->nama_unit
		]);
		return redirect('/unit')->with('status', 'Data berhasil diubah');
	}
	public function hapusunit($kode_unit)
	{
		$unit = Unit::where('kode_unit', $kode_unit)->delete();
		return redirect('/unit') -> with ('status', 'Data berhasil dihapus');
	}
}