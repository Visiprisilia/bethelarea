<?php

namespace App\Http\Controllers\coa;

use Illuminate\Http\Request;
use App\Models\Coa\Coa;
use App\Http\Controllers\Controller;

class CoaController extends Controller
{
    public function coa()
    {
        $coa = Coa::orderBy('created_at','desc')->get();
        return view('coa/coa', compact('coa'));
    }
    public function tambahcoa()
	{
		return view('coa/tambahcoa');
	}
    public function simpancoa(Request $request)
	{
		Coa::create([
			'kode_akun'=>$request->kode_akun,
			'nama_akun'=>$request->nama_akun,
			'kelompok_rek'=>$request->kelompok_rek,
			'saldo_normal'=>$request->saldo_normal,	
			'keterangan'=>$request->keterangan	
			]);
			
			return redirect('/coa')->with('success', 'Task Created Successfully!');
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
			'keterangan'=>$request->keterangan	
		]);
		return redirect('/coa')->with('status', 'Data berhasil diubah');
	}
	public function hapuscoa($kode_akun)
	{
		$coa = Coa::where('kode_akun', $kode_akun)->delete();
		return redirect('/coa') -> with ('status', 'Data berhasil dihapus');
	}
}