<?php

namespace App\Http\Controllers\subunit;

use Illuminate\Http\Request;
use App\Models\Unit\Unit;
use App\Models\SubUnit\SubUnit;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SubUnitController extends Controller
{
    public function subunit()
    {
		$subunit = SubUnit::join("unit","sub_unit.unit_id","=","unit.kode_unit")->get();
        // $subunit = SubUnit::orderBy('created_at','desc')->get();
        return view('subunit/subunit',['subunit'=>$subunit]);
    }
    public function tambahsubunit()
	{
		$unit = Unit::orderBy('created_at','desc')->get();
		return view('subunit/tambahsubunit', ['unit'=>$unit]);
	}
    public function simpansubunit(Request $request)
	{
		$validator = Validator::make($request->all(), [	
			'kode_subunit' => 'required|numeric|unique:sub_unit',
			'unit_id' => 'required',
			'nama_subunit' => 'required|unique:sub_unit',
			'status' => 'required',
		],[
			"kode_subunit.required"=>"Kode sub unit tidak boleh kosong",
			"kode_subunit.numeric"=>"Kode sub unit harus berupa angka",
			"kode_subunit.unique"=>"Data Tersebut Sudah Terdaftar",
			"unit_id.required"=>"Unit tidak boleh kosong",
			"nama_subunit.required"=>"Nama sub unit tidak boleh kosong",
			"nama_subunit.unique"=>"Data Tersebut Sudah Terdaftar",
			"status.required"=>"Status tidak boleh kosong"
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahsubunit')->withErrors($validator);
			
		}
		SubUnit::create([
			'kode_subunit'=>$request->kode_subunit,
			'nama_subunit'=>$request->nama_subunit,
			'unit_id'=>$request->unit_id,	
			'status'=>$request->status	
			]);
			return redirect('/subunit')->with('status', 'Data berhasil ditambahkan');
	}
	public function editsubunit($kode_subunit)
	{
		$unit = Unit::orderBy('created_at','desc')->get();
		$subunit = SubUnit::where('kode_subunit', $kode_subunit)->get();
		return view('subunit/editsubunit', ['unit'=>$unit,'subunit'=>$subunit]);
	}
	public function updatesubunit(Request $request)
	{
		$subunit = SubUnit::where('kode_subunit', $request->kode_subunit)->update([
			'kode_subunit'=>$request->kode_subunit,
			'nama_subunit'=>$request->nama_subunit,
			'unit_id'=>$request->unit_id,
			'status'=>$request->status	
		]);
		return redirect('/subunit')->with('status', 'Data berhasil diubah');
	}
	public function hapussubunit($kode_subunit)
	{
		$subunit = SubUnit::where('kode_subunit', $kode_subunit)->delete();
		return redirect('/subunit') -> with ('status', 'Data berhasil dihapus');
	}
}