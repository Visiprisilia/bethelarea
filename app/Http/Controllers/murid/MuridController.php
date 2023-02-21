<?php

namespace App\Http\Controllers\murid;

use Illuminate\Http\Request;
use App\Models\Murid\Murid;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Murid\Kelas;

class MuridController extends Controller
{
    public function murid()
    {
        $murid = Murid::orderBy('created_at','asc')->get();
        return view('murid/murid', compact('murid'));
    }
	public function cetakmurid()
    {
        $murid = Murid::orderBy('created_at','asc')->get();
        return view('murid/cetakmurid', compact('murid'));
    }
    public function tambahmurid()
	{
		$kelas = Kelas::orderBy('created_at','asc')->get();
		return view('murid/tambahmurid', compact('kelas'));
	}
    public function simpanmurid(Request $request)
	{ 
		$validator = Validator::make($request->all(), [	
			'nomor_induk' => 'required|numeric|unique:murid',
			'nomor_isn' => 'required|numeric|unique:murid',
			'kelas' => 'required',
			'nama' => 'required',
			'tempat_lahir' => 'required',
			'ttl' => 'required',
			'jk' => 'required',
			'alamat' => 'required',
			'agama' => 'required',
			'nama_ayah' => 'required',
			'nama_ibu' => 'required',
			'pekerjaan_ayah' => 'required',
			'pekerjaan_ibu' => 'required',
			'pendidikan_ayah' => 'required',
			'pendidikan_ibu' => 'required',
			'anak_keberapa' => 'required|numeric',
			'no_akte' => 'required|numeric|unique:murid',
			'foto_murid' => 'required',
			'file_kk' => 'required',
			'kontak' => 'required|numeric'
		],[
			"nomor_induk.required"=>"Nomor Induk tidak boleh kosong",
			"nomor_induk.numeric"=>"Nomor Induk harus berupa angka",
			// "nomor_induk.max"=>"Nomor Induk tidak boleh lebih dari 10 karakter",
			// "nomor_induk.min"=>"Nomor Induk tidak boleh kurang dari 10 karakter",
			"nomor_induk.unique"=>"Data Tersebut Sudah Terdaftar",
			"nomor_isn.required"=>"Nomor ISN tidak boleh kosong",
			"nomor_isn.numeric"=>"Nomor ISN harus berupa angka",
			// "nomor_isn.max"=>"Nomor ISN tidak boleh lebih dari 10 karakter",
			// "nomor_isn.min"=>"Nomor ISN tidak boleh kurang dari 10 karakter",
			"nomor_isn.unique"=>"Data Tersebut Sudah Terdaftar",
			"kelas.required"=>"Kelas tidak boleh kosong",
			"nama.required"=>"Nama tidak boleh kosong",
			"tempat_lahir.required"=>"Tempat Lahir tidak boleh kosong",
			"ttl.required"=>"Tempat Tanggal Lahir tidak boleh kosong",
			"jk.required"=>"Data Jenis kelamin tidak boleh kosong",
			"alamat.required"=>"Alamat tidak boleh kosong",
			"agama.required"=>"Agama tidak boleh kosong",
			"nama_ayah.required"=>"Nama ayah tidak boleh kosong",
			"nama_ibu.required"=>"Nama ibu tidak boleh kosong",
			"pekerjaan_ayah.required"=>"Pekerjaan ayah tidak boleh kosong",
			"pekerjaan_ibu.required"=>"Pekerjaan ibu tidak boleh kosong",
			"pendidikan_ayah.required"=>"Pendidikan ayah tidak boleh kosong",
			"pendidikan_ibu.required"=>"Pendidikan ibu tidak boleh kosong",
			"anak_keberapa.numeric"=>"Data anak keberapa harus berupa angka",
			"anak_keberapa.required"=>"Data anak keberapa tidak boleh kosong",
			"no_akte.required"=>"Nomor akte tidak boleh kosong",
			"no_akte.numeric"=>"Nomor akte harus berupa angka",
			"no_akte.unique"=>"Nomor akte sudah terdaftar",
			"foto_murid.required"=>"Anda belum mengupload foto murid",
			"file_kk.required"=>"Anda belum mengupload file kartu keluarga",
			"kontak.numeric"=>"Kontak harus berupa angka",
			"kontak.required"=>"Kontak tidak boleh kosong"
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahmurid')->withErrors($validator);
			
		}

		$foto_murid = $request->foto_murid;			
		$nomor_induk = $request->nomor_induk;			
		$file_kk = $request->file_kk;			
		
		$destinationPath = 'assets/images/murid/fotomurid';
		$fotos = 'fotomurid_'.$nomor_induk.'.'.$foto_murid->getClientOriginalExtension();
		$foto_murid->move($destinationPath, $fotos);

		$destinationPath = 'assets/images/murid/filekkmurid/';
		$kk = 'filekkmurid_'.$nomor_induk.'.'.$file_kk->getClientOriginalExtension();
		$file_kk->move($destinationPath, $kk);

		Murid::create([
			'nomor_induk'=>$request->nomor_induk,
			'nomor_isn'=>$request->nomor_isn,
			'kelas'=>$request->kelas,
			'nama'=>$request->nama,
			'tempat_lahir'=>$request->tempat_lahir,
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
			'foto_murid'=>$fotos,
			'file_kk'=>$kk,
			'kontak'=>$request->kontak


			]);
			return redirect('/murid')->with('status', 'Data berhasil ditambahkan');
	}
	public function editmurid($nomor_induk)
	{
		$kelas = Kelas::orderBy('created_at','asc')->get();
		$murid = Murid::where('nomor_induk', $nomor_induk)->get();
		return view('murid/editmurid', compact('murid','kelas'));
	}
	public function updatemurid(Request $request)
	{
		$foto_murid = $request->foto_murid;			
		$nomor_induk = $request->nomor_induk;			
		$file_kk = $request->file_kk;			
		
		$destinationPath = 'assets/images/fotomurid/';
		$fotos = 'fotomurid_'.$nomor_induk.'.'.$foto_murid->getClientOriginalExtension();
		$foto_murid->move($destinationPath, $fotos);

		$destinationPath = 'assets/images/filekkmurid/';
		$kk = 'filekkmurid_'.$nomor_induk.'.'.$file_kk->getClientOriginalExtension();
		$file_kk->move($destinationPath, $kk);

		$murid = Murid::where('nomor_induk', $request->nomor_induk)->update([
			'nomor_induk'=>$request->nomor_induk,
			'nomor_isn'=>$request->nomor_isn,
			'kelas'=>$request->kelas,
			'nama'=>$request->nama,
			'tempat_lahir'=>$request->tempat_lahir,
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
			'foto_murid'=>$fotos,
			'file_kk'=>$kk,
			'kontak'=>$request->kontak

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