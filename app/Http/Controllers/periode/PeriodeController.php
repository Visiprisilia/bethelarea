<?php

namespace App\Http\Controllers\periode;

use Illuminate\Http\Request;
use App\Models\Periode\Periode;
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
		Periode::create([
			'kode_periode'=>$request->nama_periode,
			'nama_periode'=>$request->nama_periode,
			'awal_periode'=>$request->awal_periode,	
            'akhir_periode'=>$request->akhir_periode,	
			'status'=>$request->status	
			]);
			return redirect('/periode')->with(['success' => 'Pesan Berhasil']);
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