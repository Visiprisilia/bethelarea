<?php

namespace App\Http\Controllers\unit;

use Illuminate\Http\Request;
use App\Models\Unit\Unit;
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