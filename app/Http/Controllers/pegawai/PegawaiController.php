<?php

namespace App\Http\Controllers\pegawai;

use Illuminate\Http\Request;
use App\Models\Pegawai\Pegawai;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $pegawai = Pegawai::orderBy('created_at','desc')->get();
        return view('pegawai/pegawai', compact('pegawai'));
    }
    public function tambahpegawai()
	{
		return view('pegawai/tambahpegawai');
	}
    public function simpanpegawai(Request $request)
	{
		$foto_pegawai = $request->foto_pegawai;			
		$niy = $request->niy;			
		$file_suket = $request->file_suket;			
		$file_ktp = $request->file_ktp;			
		
		$destinationPath = 'assets/images/pegawai/fotopegawai/';
		$fotos = 'fotopegawai_'.$niy.'.'.$foto_pegawai->getClientOriginalExtension();
		$foto_pegawai->move($destinationPath, $fotos);

		$destinationPath = 'assets/images/pegawai/skpegawai/';
		$suket = 'filesuket_'.$niy.'.'.$file_suket->getClientOriginalExtension();
		$file_suket->move($destinationPath, $suket);

		$destinationPath = 'assets/images/pegawai/ktppegawai/';
		$ktp = 'ktp_'.$niy.'.'.$file_ktp->getClientOriginalExtension();
		$file_ktp->move($destinationPath, $ktp);

		Pegawai::create([
			'niy'=>$request->niy,
			'nama'=>$request->nama,
			'tempat_lahir'=>$request->tempat_lahir,
			'ttl'=>$request->ttl,	
			'jk'=>$request->jk,	
			'agama'=>$request->agama,	
			'pendidikan'=>$request->pendidikan,	
			'alamat'=>$request->alamat,
			'penempatan'=>$request->penempatan,
			'tanggal_masuk'=>$request->tanggal_masuk,
			'status_kepegawaian'=>$request->status_kepegawaian,
			'tanggal_ppt'=>$request->tanggal_ppt,
			'file_suket'=>$suket,
			'status'=>$request->status,
			'tanggal_terminasi'=>$request->tanggal_terminasi,
			'foto_pegawai'=>$fotos,
			'file_ktp'=>$ktp,
			'keterangan'=>$request->keterangan
			]);
			return redirect('/pegawai')->with('status', 'Data berhasil ditambahkan');
	}
	public function editpegawai($niy)
	{
		$pegawai = Pegawai::where('niy', $niy)->get();
		return view('pegawai/editpegawai', compact('pegawai'));
	}
	public function updatepegawai(Request $request)
	{
		$foto_pegawai = $request->foto_pegawai;			
		$niy = $request->niy;			
		$file_suket = $request->file_suket;			
		$file_ktp = $request->file_ktp;			
		
		$destinationPath = 'assets/images/pegawai/fotopegawai/';
		$fotos = 'fotopegawai_'.$niy.'.'.$foto_pegawai->getClientOriginalExtension();
		$foto_pegawai->move($destinationPath, $fotos);

		$destinationPath = 'assets/images/pegawai/skpegawai/';
		$suket = 'filesuket_'.$niy.'.'.$file_suket->getClientOriginalExtension();
		$file_suket->move($destinationPath, $suket);

		$destinationPath = 'assets/images/pegawai/ktppegawai/';
		$ktp = 'ktp_'.$niy.'.'.$file_ktp->getClientOriginalExtension();
		$file_ktp->move($destinationPath, $ktp);
		$pegawai = Pegawai::where('niy', $request->niy)->update([
			'niy'=>$request->niy,
			'nama'=>$request->nama,
			'tempat_lahir'=>$request->tempat_lahir,
			'ttl'=>$request->ttl,	
			'jk'=>$request->jk,	
			'agama'=>$request->agama,	
			'pendidikan'=>$request->pendidikan,	
			'alamat'=>$request->alamat,
			'penempatan'=>$request->penempatan,
			'tanggal_masuk'=>$request->tanggal_masuk,
			'status_kepegawaian'=>$request->status_kepegawaian,
			'tanggal_ppt'=>$request->tanggal_ppt,
			'file_suket'=>$suket,
			'status'=>$request->status,
			'tanggal_terminasi'=>$request->tanggal_terminasi,
			'foto_pegawai'=>$fotos,
			'file_ktp'=>$ktp,
			'keterangan'=>$request->keterangan
		]);
		return redirect('/pegawai')->with('status', 'Data berhasil diubah');
	}
	public function hapuspegawai($niy)
	{
		$pegawai = Pegawai::where('niy', $niy)->delete();
		return redirect('/pegawai') -> with ('status', 'Data berhasil dihapus');
	}
}