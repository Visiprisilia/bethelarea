<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Akuns;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\Coa\Coa;
use App\Models\Pegawai\Pegawai;
use Illuminate\Support\Facades\DB;

class ProgramKerjaController extends Controller
{
	public function programkerja()
	{
		$programkerja = Periode::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/programkerja/programkerja', compact('programkerja', 'coa'));
	}
	public function viewprogramkerja(Request $request)
	{
		$id = $request->id;
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		// $programkerja = programkerja::orderBy('created_at', 'desc')->where('periode', $id)->get();
		$programkerja = ProgramKerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")->where('periode', $id)->get();
		return view('programkerja/programkerja/viewprogramkerja', ['programkerja' => $programkerja, 'periode' => $periode, 
		'pegawai' => $pegawai]);
	}
	public function tambahprogramkerja()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/programkerja/tambahprogramkerja', ['coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai]);
	}
	public function simpanprogramkerja(Request $request)
	{
		$periode = $request->periode;
		$penanggungjawab = $request->penanggungjawab;
		$kode_akun = $request->akun;		
		$ambilcp = Periode::where('kode_periode',$periode)->get();
		$check = 0;
		foreach ($ambilcp as $cp) {
			
			$check = $cp->counter_proker;
		}
		$kode_proker = 'PROKER' . $periode . $check + 1;

//$check = Periode kolom counter_proker +1, sesuai dengan $periode
//setelah menambah proker, ubah di tabel periode untuk kolom counter_proker =+1 sesuai dengan $periode
		$data_proker = [
			'kode_proker' => $kode_proker,
			'periode' => $periode,
			'nama_proker' => $request->nama_proker,
			'penanggungjawab' => $penanggungjawab,
			'waktu_mulai' => $request->waktu_mulai,
			'waktu_selesai' => $request->waktu_selesai,
			'tujuan' => $request->tujuan,
			'indikator' => $request->indikator,
			'anggaran' => $request->anggaran,
			'keterangan_proker' => $request->keterangan_proker,
			'status_proker'=>'Menunggu Konfirmasi'
		];
		ProgramKerja::create($data_proker);
		$no_jumlah = 0;
		foreach ($kode_akun as $i) {
			$data = [
				'kode_proker' => $kode_proker,
				'kode_akun' => $i,
				'penanggungjawab' => $penanggungjawab,
				'periode' => $periode,
				'jumlah' => $request->jumlah[$no_jumlah],
			];
			$no_jumlah++;
			Akuns::create($data);
			// return $periode;
		}
		   Periode::where('kode_periode', $periode)->update(['counter_proker'=>$check+1]);

		return redirect('/programkerja')->with('status', 'Data berhasil ditambahkan');
	}
	public function editprogramkerja($kode_proker)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->get();
		// return $programkerja;
		return view('programkerja/programkerja/editprogramkerja',  ['programkerja' => $programkerja, 'coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai]);
	}
	public function updateprogramkerja(Request $request)
	{

		$programkerja = ProgramKerja::where('kode_proker', $request->kode_proker)->update([
			'nama_proker' => $request->nama_proker,
			'penanggungjawab' => $request->penanggungjawab,
			'waktu_mulai' => $request->waktu_mulai,
			'waktu_selesai' => $request->waktu_selesai,
			'tujuan' => $request->tujuan,
			'indikator' => $request->indikator,
			'anggaran' => $request->anggaran,
			'keterangan_proker' => $request->keterangan_proker
		]);
		return redirect('/programkerja')->with('status', 'Data berhasil diubah');
	}
	public function hapusprogramkerja($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->delete();
		return redirect('/programkerja')->with('status', 'Data berhasil dihapus');
	}
	
	public function lihatproker($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->get();
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/programkerja/lihatproker', compact('programkerja','periode','pegawai','coa'));
	}

	//lihat program kerja di table akun
	public function lihatprogramkerja($kode_proker)
	{
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->where('kode_proker', $kode_proker)->orderBy('akuns.created_at', 'desc')->get();
		return view('programkerja/programkerja/lihatprogramkerja', compact('akun'));
	}
	public function cetakprogramkerja()
	{
		$programkerja = Periode::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/programkerja/cetakprogramkerja', compact('programkerja', 'coa'));
	}
	public function viewcetakprogramkerja(Request $request)
	{
		$id = $request->id;
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$programkerja = programkerja::orderBy('created_at', 'desc')->where('periode', $id)->get();
		// $programkerja = ProgramKerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")->where('periode', $id)->get();
		return view('programkerja/programkerja/viewcetakprogramkerja', ['programkerja' => $programkerja, 'periode' => $periode, 'pegawai' => $pegawai]);
	}
	// public function editlihatprogramkerja($id)
	// {
	// 	$akun = Akuns::where('id', $id)->get();
	// 	// return $programkerja;
	// 	return view('programkerja/programkerja/editlihatprogramkerja',  ['akun'=>$akun]);
	// }
	// public function updatelihatprogramkerja(Request $request){
	// 	$akun = Akuns::where('id', $request->id)->update([
	// 		'kode_proker'=>$request->kode_proker,
	// 		'kode_akun'=>$request->kode_akun,
	// 		'jumlah'=>$request->jumlah
	// 	]);
	// 	return redirect('/lihatprogramkerja')->with('status', 'Data berhasil diubah');
	// }
	// public function hapuslihatprogramkerja($id)
	// {
	// 	$akun = Akuns::where('id', $id)->delete();
	// 	return redirect('/lihatprogramkerja') -> with ('status', 'Data berhasil dihapus');
	// }
}
