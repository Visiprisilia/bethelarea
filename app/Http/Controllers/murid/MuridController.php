<?php

namespace App\Http\Controllers\murid;

use Illuminate\Http\Request;
use App\Models\Murid\Murid;
use App\Http\Controllers\Controller;

class MuridController extends Controller
{
    public function murid()
    {
        $murid = Murid::all();
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
			'jk'=>$request->jk,	
			'ttl'=>$request->ttl,	
			'alamat'=>$request->alamat,
			'agama'=>$request->agama
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
			'jk'=>$request->jk,	
			'ttl'=>$request->ttl,	
			'alamat'=>$request->alamat,
			'agama'=>$request->agama
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