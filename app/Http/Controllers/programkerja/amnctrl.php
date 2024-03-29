<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Akuns;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\ProgramKerja\Amandemen;
use App\Models\Periode\Periode;
use App\Models\Coa\Coa;
use App\Models\Pegawai\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AmandemenController extends Controller
{
	public function amandemen()
	{
		$amandemen = Periode::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/amandemen/amandemen', compact('amandemen', 'coa'));
	}
	public function viewamandemen(Request $request)
	{
		$id = $request->id;
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$amandemen = Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
			->where('periode', $id)->orderBy('amandemen.created_at','asc')->get();
		return view('programkerja/amandemen/viewamandemen', [
			'amandemen' => $amandemen, 'periode' => $periode,
			'pegawai' => $pegawai
		]);
	}
	public function tambahamandemen()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('kode_akun', 'asc')->get();
		$amandemen = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
			->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
			->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->get();
		return view('programkerja/amandemen/tambahamandemen', [
			'coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai,
			'amandemen' => $amandemen
		]);
	}
	public function ubahamandemen()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('kode_akun', 'asc')->where('kode_akun','like','5%')->get();
		$amandemen = Akuns::join("periode", "akuns.periode", "=", "periode.kode_periode")
			->join("program_kerja", "akuns.kode_proker", "=", "program_kerja.kode_proker")
			->where('status', 'LIKE', 'AKTIF')
			->where('persetujuan_proker', 'LIKE', 'Disetujui')
			->where('status_amandemens', '!=', 'Amandemen')
			// ->where('anggaran','!=',0)
			->get();
			// ->groupBy("akuns.kode_proker") ->get();
		return view('programkerja/amandemen/ubahamandemen', [
			'coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai,
			'amandemen' => $amandemen
		]);
	}
	//tambah proker (amandemen)
	public function simpantambahamandemen(Request $request)
	{
		$periode= $request->periode;
		$periode_amandemen = $request->periode_amandemen;
		$penanggungjawab = $request->penanggungjawab;
		$ambilcp = Periode::where('kode_periode', $periode_amandemen)->get();
		$check = 0;
		foreach ($ambilcp as $cp) {

			$check = $cp->counter_proker;
		}
		$kode_proker = 'PROKER' . $periode_amandemen . $check + 1;

		$data_amandemen = [
			'kode_proker' => $kode_proker,
			'periode' => $request->periode_amandemen,
			'nama_proker' => $request->nama_proker,
			'penanggungjawab' => $penanggungjawab,
			'waktu_mulai' => $request->waktu_mulai,
			'waktu_selesai' => $request->waktu_selesai,
			'tujuan' => $request->tujuan,
			'indikator' => $request->indikator,
			'anggaran' => 0,
			'keterangan_proker' => $request->keterangan_amandemen,
			'status_proker' => 'Disetujui',
			'pob' => $request->pob,
		];

		ProgramKerja::create($data_amandemen);
		$jumlah = $request->jumlah;
		$jumlahs = str_replace(array('','.'),'',$jumlah);
		$kode_akun = $request->akun;
		$no_jumlah = 0;
		foreach ($kode_akun as $i) {
			$data = [
				'kode_proker' => $kode_proker,
				'kode_akun' => $i,
				'penanggungjawab' => $penanggungjawab,
				'periode' => $periode_amandemen,
				'jumlah' => $jumlahs[$no_jumlah],
				'status_pa' => "Amandemen",
			];
			$no_jumlah++;
			Akuns::create($data);
			// return $periode;
		}
		$periode_amandemen = $request->periode_amandemen;
		$ambilcp = Periode::where('kode_periode', $periode_amandemen)->get();
		$check = 0;
		foreach ($ambilcp as $cp) {

			$check = $cp->counter_proker;
		}
		$kode_prokeramandemen = 'PROKER' . $periode_amandemen . $check + 1;

		$tanggalhariinis = Carbon::now()->format('Y-m-d');
		// $checks = Amandemen::count();
		// $id_amandemen = $checks + 1;
		$periode_amandemen = $request->periode_amandemen;
		$ambilca = Periode::where('kode_periode', $periode_amandemen)->get();
		$check = 0;
		$checkp=0;
		foreach ($ambilca as $ca) {

			$check = $ca->counter_amandemen;
			$checkp = $ca->counter_proker;
		}
		$id_amandemen = $check + 1;
		$anggaran_amandemen = $request->anggaran_amandemen;
		$anggarans = str_replace(array('','.'),'',$anggaran_amandemen);
		Amandemen::create([
			'id_amandemen' => $id_amandemen,
			'kode_prokeramandemen' => $kode_prokeramandemen,
			'periode_amandemen' => $request->periode_amandemen,
			'tanggal_amandemen' => $tanggalhariinis,
			'anggaran_amandemen' => $anggarans,
			'status_amandemen' => 'Menunggu Persetujuan',
			'keterangan_amandemen' => $request->keterangan_amandemen,
			'catatan_amandemen' => $request->catatan_amandemen,
		]);
		   Periode::where('kode_periode', $periode_amandemen)->update(
			['counter_proker' => $checkp + 1, 
			'counter_amandemen'=>$check+1]);
		return redirect('/amandemen')->with('status', 'Data berhasil ditambahkan'); 
	}
	//ubah proker (amandemen)
	public function simpanamandemen(Request $request)
	{

		// $akun = Akuns::where('kode_proker', $request->kode_prokeramandemen)->update([
		// 	'status_amandemens' =>'Amandemen',
		// 	]);
			// echo($akun);
		$kode_prokeramandemen = $request->kode_prokeramandemen;
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
		// $check = Amandemen::count();
		// $id_amandemen = $check + 3;
		$periode_amandemen = $request->periode_amandemen;
		$ambilca = Periode::where('kode_periode', $periode_amandemen)->get();
		$check = 0;
		foreach ($ambilca as $ca) {

			$check = $ca->counter_amandemen;
		}
		$id_amandemen = $check + 1;
		$anggaran_amandemen = $request->anggaran_amandemen;
		$anggarans = str_replace(array('','.'),'',$anggaran_amandemen);
		Amandemen::create([
			'id_amandemen' => $id_amandemen,
			'kode_prokeramandemen' => $request->kode_prokeramandemen,
			'periode_amandemen' => $request->periode_amandemen,
			'tanggal_amandemen' => $tanggalhariinis,
			'anggaran_amandemen' => $anggarans,
			'status_amandemen' => 'Menunggu Persetujuan',
			'keterangan_amandemen' => $request->keterangan_amandemen,
			'catatan_amandemen' => $request->catatan_amandemen,
		]);
	
		$jumlah = $request->jumlah;
		$jumlahs = str_replace(array('','.'),'',$jumlah);
		$kode_akun = $request->akun;
		$no_jumlah = 0;
		foreach ($kode_akun as $i) {
			$data = [
				'kode_proker' => $kode_prokeramandemen,
				'kode_akun' => $i,
				'penanggungjawab' => $request->penanggungjawab,
				'periode' => $request->periode_amandemen,
				'jumlah' => $jumlahs[$no_jumlah],
				'status_pa' => "Amandemen",
				// 'created_at' => 'tes',
			];
			$no_jumlah++;
			Akuns::create($data);
			// return $periode;
		}
		Periode::where('kode_periode', $periode_amandemen)->update(['counter_amandemen'=>$check+1]);

		return redirect('/amandemen')->with('status', 'Data berhasil ditambahkan');

	}
	public function lihatamandemen($kode_prokeramandemen)
	{
		$amandemen = Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
			->where('kode_prokeramandemen', $kode_prokeramandemen)->get();
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();

		return view('programkerja/amandemen/lihatamandemen', compact('amandemen', 'periode', 'pegawai', 'coa'));
	}
//lihat table akuns
	public function lihatamandemens($kode_prokeramandemen)
	{
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->where('kode_proker', $kode_prokeramandemen)
		// ->where('status_amandemens','!=','Amandemen')
		// ->where('status_pa','=','proker')	
		->orderBy('akuns.created_at', 'desc')->get();

		return view('programkerja/amandemen/lihatamandemens', compact('akun'));
	}

	public function konfirmasiamandemen(Request $request)
	{
		$amandemen = Amandemen::where('kode_prokeramandemen', $request->kode_prokeramandemen)->update([
			'status_amandemen' => $request->status_amandemen,
			'catatan_amandemen' => $request->catatan_amandemen
		]);
		$akun = Akuns::where('kode_proker', $request->kode_prokeramandemen)->where('status_pa','=','proker')->update([
				'status_amandemens' =>'Amandemen',
				]);
			
		$akun = Akuns::where('kode_proker', $request->kode_prokeramandemen)->where('status_pa','=','Amandemen')->update([
			'persetujuan_amandemen' => $request->status_amandemen,
			// 'status_amandemens' =>'Amandemen'
		]);
		return redirect('/amandemen')->with('status', 'Data berhasil diubah');
		// 2021-11-16 17:07:50
	}
	public function editamandemen($kode_prokeramandemen)
	{
		$amandemen = Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
			->where('kode_prokeramandemen', $kode_prokeramandemen)->get();
		$dataamandemen = Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
			->where('kode_prokeramandemen', $kode_prokeramandemen)->get();
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$akun = Akuns::where('kode_proker', $kode_prokeramandemen)->where('status_amandemens','!=','Amandemen')->get();		
		$coa = Coa::orderBy('created_at', 'desc')->get();

		foreach($dataamandemen as $row){
			$status_proker=$row[
				'status_amandemen'
			];
		}

		if ($status_proker =='Revisi') {
			return view('programkerja/amandemen/editamandemen', compact('amandemen', 'periode', 'pegawai', 'coa','akun'));
		} else{
			return redirect('/amandemen')->with('status', 'Data tidak bisa diubah');    			
			}
	
	}


	public function updateamandemen(Request $request)
	{
		$amandemen = Amandemen::where('kode_prokeramandemen', $request->kode_prokeramandemen)->update([
			'anggaran_amandemen' => $request->anggaran_amandemen,			
			'status_amandemen' => 'Menunggu Persetujuan',			
		]);
		for ($i = 1; $i <= $request->jumlahbaris; $i++) {
			$idnya = 'id' . $i;
			$jumlahnya = 'jumlah' . $i;
			$kodeakunnya = 'kode_akun' . $i;
			$akun = Akuns::where('id', $request->string($idnya)->trim())->update([
				'jumlah' => $request->string($jumlahnya)->trim(),
				'kode_akun' => $request->string($kodeakunnya)->trim(),
			]);
		}
		// $akun= Akuns::where('id', $request->id)->update([
		// 	'jumlah' => $request->jumlah,			
		// 	'kode_akun' => $request->kode_akun,				
		// ]);
	
		return redirect('/amandemen')->with('status', 'Data berhasil diubah');
	}

	public function pilihamandemen(Request $request)
	{
		$kode = $request->kode;
		$data = ProgramKerja::where("kode_proker", $kode)->first();
		$data2 = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->where("kode_proker", $kode)->where('status_amandemens', '!=', 'Amandemen')->get();
		return response()->json([
			"ubah" => $data,
			"akun" => $data2

		]);
	}
	public function cetakamandemen()
	{
		$amandemen = Periode::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		return view('programkerja/amandemen/cetakamandemen', compact('amandemen', 'coa','tanggalhariini'));
	}
	public function viewcetakamandemen(Request $request)
	{
		$id = $request->id;
		$jumlah = Amandemen::where('periode_amandemen',$id)
		->where('status_amandemen','like','Disetujui')
		->sum('anggaran_amandemen');		
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$amandemen = Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
			->where('periode', $id)
			->where('status_amandemen','like','Disetujui')
			->orderBy('amandemen.created_at','asc')->get();
		return view('programkerja/amandemen/viewcetakamandemen', [
			'amandemen' => $amandemen, 
			'periode' => $periode,
			'pegawai' => $pegawai,
			'tanggalhariini' => $tanggalhariini,
			'jumlah'=>$jumlah
		]);
	}
}
