<?php

namespace App\Http\Controllers\subunit;

use Illuminate\Http\Request;
use App\Models\Unit\Unit;
use App\Models\SubUnit\SubUnit;
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