<?php

namespace App\Http\Controllers\subunit;

use Illuminate\Http\Request;
use App\Models\SubUnit\SubUnit;
use App\Http\Controllers\Controller;

class SubUnitController extends Controller
{
    public function subunit()
    {
        $subunit = SubUnit::orderBy('created_at','desc')->get();
        return view('subunit/subunit', compact('subunit'));
    }
    public function tambahsubunit()
	{
		return view('subunit/tambahsubunit');
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
		$subunit = SubUnit::where('kode_subunit', $kode_subunit)->get();
		return view('subunit/editsubunit', compact('subunit'));
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