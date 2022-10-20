<?php

namespace App\Http\Controllers\pegawai;

use Illuminate\Http\Request;
use App\Models\Pegawai\Pegawai;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $pegawai = Pegawai::all();
        return view('pegawai/pegawai', compact('pegawai'));
    }
    public function tambahpegawai()
	{
		return view('pegawai/tambahpegawai');
	}
    public function simpanpegawai(Request $request)
	{
		Pegawai::create([
			'kode_pegawai'=>$request->kode_pegawai,
			'nama_pegawai'=>$request->nama_pegawai,
			'jabatan_pegawai'=>$request->jabatan_pegawai,	
			'pendidikan'=>$request->pendidikan,	
			'tanggal_masuk'=>$request->tanggal_masuk,
			'status_kepegawaian'=>$request->status_kepegawaian,
			'tanggal_ppt'=>$request->tanggal_ppt
			]);
			return redirect('/pegawai')->with('status', 'Data berhasil ditambahkan');
	}
	public function editpegawai($kode_pegawai)
	{
		$pegawai = Pegawai::where('kode_pegawai', $kode_pegawai)->get();
		return view('pegawai/editpegawai', compact('pegawai'));
	}
	public function updatepegawai(Request $request)
	{
		$pegawai = Pegawai::where('kode_pegawai', $request->kode_pegawai)->update([
			'kode_pegawai'=>$request->kode_pegawai,
			'nama_pegawai'=>$request->nama_pegawai,
			'jabatan_pegawai'=>$request->jabatan_pegawai,	
			'pendidikan'=>$request->pendidikan,	
			'tanggal_masuk'=>$request->tanggal_masuk,
			'status_kepegawaian'=>$request->status_kepegawaian,
			'tanggal_ppt'=>$request->tanggal_ppt
		]);
		return redirect('/pegawai')->with('status', 'Data berhasil diubah');
	}
	public function hapuspegawai($kode_pegawai)
	{
		$pegawai = Pegawai::where('kode_pegawai', $kode_pegawai)->delete();
		return redirect('/pegawai') -> with ('status', 'Data berhasil dihapus');
	}
}