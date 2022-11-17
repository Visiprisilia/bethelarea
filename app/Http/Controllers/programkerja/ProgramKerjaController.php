<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramKerja\ProgramKerja;
use Illuminate\Support\Facades\DB;

class ProgramKerjaController extends Controller
{
    public function programkerja()
    {
		$programkerja = ProgramKerja::all();
        return view('programkerja/programkerja', compact('programkerja'));
		}
    public function tambahprogramkerja()
	{
		return view('programkerja/tambahprogramkerja');
	}
    public function simpanprogramkerja(Request $request)
	{
		ProgramKerja::create([
			'kode_proker'=>$request->kode_proker,
			'nama_proker'=>$request->nama_proker,
			'pegawai_id'=>$request->pegawai_id,
			'waktu'=>$request->waktu,	
			'tujuan'=>$request->tujuan,
			'indikator'=>$request->indikator,	
			'akun_kode'=>$request->akun_kode,
			'anggaran'=>$request->anggaran						
			]);
			return redirect('/programkerja')->with('status', 'Data berhasil ditambahkan');
	}
	public function editprogramkerja($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->get();
		return view('programkerja/editprogramkerja', compact('programkerja'));
	}
	public function updateprogramkerja(Request $request)
	{
		$programkerja = ProgramKerja::where('kode_proker', $request->kode_proker)->update([
			'kode_proker'=>$request->kode_proker,
			'nama_proker'=>$request->nama_proker,
			'pegawai_id'=>$request->pegawai_id,
			'waktu'=>$request->waktu,	
			'tujuan'=>$request->tujuan,
			'indikator'=>$request->indikator,	
			'akun_kode'=>$request->akun_kode,
			'anggaran'=>$request->anggaran				
		
		]);
		return redirect('/programkerja')->with('status', 'Data berhasil diubah');
	}
	public function hapusprogramkerja($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->delete();
		return redirect('/programkerja') -> with ('status', 'Data berhasil dihapus');
	}
}