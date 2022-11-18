<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Coa\Coa;
use Illuminate\Support\Facades\DB;

class ProgramKerjaController extends Controller
{
    public function programkerja()
    {
		$programkerja = ProgramKerja::orderBy('created_at','desc')->get();
        return view('programkerja/programkerja/programkerja', compact('programkerja'));
		}
    public function tambahprogramkerja()
	{
		$coa = Coa::orderBy('created_at','desc')->get();
		return view('programkerja/programkerja/tambahprogramkerja', ['coa'=>$coa]);
	}
    public function simpanprogramkerja(Request $request)
	{
		ProgramKerja::create([
			'kode_proker'=>$request->kode_proker,
			'periode'=>$request->periode,
			'nama_proker'=>$request->nama_proker,
			'penanggungjawab'=>$request->penanggungjawab,
			'waktu_mulai'=>$request->waktu_mulai,	
			'waktu_selesai'=>$request->waktu_selesai,	
			'tujuan'=>$request->tujuan,
			'indikator'=>$request->indikator,	
			'akun'=>$request->akun,
			'anggaran'=>$request->anggaran,						
			'keterangan'=>$request->keterangan						
			]);
			return redirect('/programkerja')->with('status', 'Data berhasil ditambahkan');
	}
	public function editprogramkerja($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->get();
		return view('programkerja/programkerja/editprogramkerja', compact('programkerja'));
	}
	public function updateprogramkerja(Request $request)
	{
		$programkerja = ProgramKerja::where('kode_proker', $request->kode_proker)->update([
			'kode_proker'=>$request->kode_proker,
			'periode'=>$request->periode,
			'nama_proker'=>$request->nama_proker,
			'penanggungjawab'=>$request->penanggungjawab,
			'waktu_mulai'=>$request->waktu_mulai,	
			'waktu_selesai'=>$request->waktu_selesai,	
			'tujuan'=>$request->tujuan,
			'indikator'=>$request->indikator,	
			'akun'=>$request->akun,
			'anggaran'=>$request->anggaran,						
			'keterangan'=>$request->keterangan	
		]);
		return redirect('/programkerja')->with('status', 'Data berhasil diubah');
	}
	public function hapusprogramkerja($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->delete();
		return redirect('/programkerja') -> with ('status', 'Data berhasil dihapus');
	}
}