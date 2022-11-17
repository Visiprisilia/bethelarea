<?php

namespace App\Http\Controllers\murid;

use Illuminate\Http\Request;
use App\Models\Murid\Murid;
use App\Http\Controllers\Controller;

class MuridController extends Controller
{
    public function murid()
    {
        $murid = Murid::orderBy('created_at','desc')->get();
        return view('murid/murid', compact('murid'));
    }
    public function tambahmurid()
	{
		return view('murid/tambahmurid');
	}
    public function simpanmurid(Request $request)
	{ 
		Murid::create([
			'nomor_induk'=>$request->nomor_induk,
			'nama'=>$request->nama,
			'ttl'=>$request->ttl,	
			'jk'=>$request->jk,	
			'alamat'=>$request->alamat,
			'agama'=>$request->agama,
			'nama_ayah'=>$request->nama_ayah,
			'nama_ibu'=>$request->nama_ibu,
			'pekerjaan_ayah'=>$request->pekerjaan_ayah, 
			'pekerjaan_ibu'=>$request->pekerjaan_ibu,
			'pendidikan_ayah'=>$request->pendidikan_ayah, 
			'pendidikan_ibu'=>$request->pendidikan_ibu, 
			'anak_keberapa'=>$request->anak_keberapa, 
			'no_akte'=>$request->no_akte,
			'foto_murid'=>$request->foto_murid,
			'file_kk'=>$request->file_kk

			]);
			return redirect('/murid')->with('status', 'Data berhasil ditambahkan');
	}
	public function editmurid($nomor_induk)
	{
		$murid = Murid::where('nomor_induk', $nomor_induk)->get();
		return view('murid/editmurid', compact('murid'));
	}
	public function updatemurid(Request $request)
	{
		$murid = Murid::where('nomor_induk', $request->nomor_induk)->update([
			'nomor_induk'=>$request->nomor_induk,
			'nama'=>$request->nama,
			'ttl'=>$request->ttl,	
			'jk'=>$request->jk,	
			'alamat'=>$request->alamat,
			'agama'=>$request->agama,
			'nama_ayah'=>$request->nama_ayah,
			'nama_ibu'=>$request->nama_ibu,
			'pekerjaan_ayah'=>$request->pekerjaan_ayah, 
			'pekerjaan_ibu'=>$request->pekerjaan_ibu,
			'pendidikan_ayah'=>$request->pendidikan_ayah, 
			'pendidikan_ibu'=>$request->pendidikan_ibu, 
			'anak_keberapa'=>$request->anak_keberapa, 
			'no_akte'=>$request->no_akte,
			'foto_murid'=>$request->foto_murid,
			'file_kk'=>$request->file_kk
		]);
		return redirect('/murid')->with('status', 'Data berhasil diubah');
	}
	public function hapusmurid($nomor_induk)
	{
		$murid = Murid::where('nomor_induk', $nomor_induk)->delete();
		return redirect('/murid') -> with ('status', 'Data berhasil dihapus');
	}
	// public function cetak_pdf()
    // {
    // 	$murid = Murid::all();
 
    // 	$pdf = PDF::loadview('cetakpdf',['murid'=>$murid]);
    // 	return $pdf->download('laporan-pegawai-pdf');
    // }
}