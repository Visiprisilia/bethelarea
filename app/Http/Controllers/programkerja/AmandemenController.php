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
			->where('periode', $id)->get();
		return view('programkerja/amandemen/viewamandemen', [
			'amandemen' => $amandemen, 'periode' => $periode,
			'pegawai' => $pegawai
		]);
	}
	public function tambahamandemen()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
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
		$coa = Coa::orderBy('created_at', 'desc')->get();
		$amandemen = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
			->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
			->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->where('status_amandemens', '!=', 'Amandemen')->get();
		return view('programkerja/amandemen/ubahamandemen', [
			'coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai,
			'amandemen' => $amandemen
		]);
	}
	public function simpantambahamandemen(Request $request)
	{
		$periode_amandemen = $request->periode_amandemen;
		$penanggungjawab = $request->penanggungjawab;
		$ambilcp = Periode::where('kode_periode', $periode_amandemen)->get();
		$check = 0;
		foreach ($ambilcp as $cp) {

			$check = $cp->counter_proker;
		}
		$kode_proker = 'PROKER' . $periode_amandemen . $check + 1;

		// $check = Periode kolom counter_proker +1, sesuai dengan $periode
		//setelah menambah proker, ubah di tabel periode untuk kolom counter_proker =+1 sesuai dengan $periode

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
			'status_proker' => 'Menunggu Persetujuan'
		];

		ProgramKerja::create($data_amandemen);
		$kode_akun = $request->akun;
		$no_jumlah = 0;
		foreach ($kode_akun as $i) {
			$data = [
				'kode_proker' => $kode_proker,
				'kode_akun' => $i,
				'penanggungjawab' => $penanggungjawab,
				'periode' => $periode_amandemen,
				'jumlah' => $request->jumlah[$no_jumlah],
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
		$checks = Amandemen::count();
		$id_amandemen = $checks + 1;
		Amandemen::create([
			'id_amandemen' => $id_amandemen,
			'kode_prokeramandemen' => $kode_prokeramandemen,
			'periode_amandemen' => $request->periode_amandemen,
			'tanggal_amandemen' => $tanggalhariinis,
			'anggaran_amandemen' => $request->anggaran_amandemen,
			'status_amandemen' => 'Menunggu Persetujuan',
			'keterangan_amandemen' => $request->keterangan_amandemen,
			'catatan_amandemen' => $request->catatan_amandemen,
		]);
		   Periode::where('kode_periode', $periode_amandemen)->update(['counter_proker'=>$check+1]);

		return redirect('/amandemen')->with('status', 'Data berhasil ditambahkan');
	}
	public function simpanamandemen(Request $request)
	{
			
		$kode_prokeramandemen = $request->kode_prokeramandemen;
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
		$check = Amandemen::count();
		$id_amandemen = $check + 1;
		Amandemen::create([
			'id_amandemen' => $id_amandemen,
			'kode_prokeramandemen' => $request->kode_prokeramandemen,
			'periode_amandemen' => $request->periode_amandemen,
			'tanggal_amandemen' => $tanggalhariinis,
			'anggaran_amandemen' => $request->anggaran_amandemen,
			'status_amandemen' => 'Menunggu Persetujuan',
			'keterangan_amandemen' => $request->keterangan_amandemen,
			'catatan_amandemen' => $request->catatan_amandemen,
		]);

		$periode_amandemen = $request->periode_amandemen;
		$penanggungjawab = $request->penanggungjawab;
		$ambilcp = Periode::where('kode_periode', $periode_amandemen)->get();
		$check = 0;
		foreach ($ambilcp as $cp) {

			$check = $cp->counter_proker;
		}
		$kode_proker = 'PROKER' . $periode_amandemen . $check + 1;
		$kode_akun = $request->akun;
		$no_jumlah = 0;
		foreach ($kode_akun as $i) {
			$data = [
				'kode_proker' => $kode_proker,
				'kode_akun' => $i,
				'penanggungjawab' => $penanggungjawab,
				'periode' => $periode_amandemen,
				'jumlah' => $request->jumlah[$no_jumlah],
			];
			$no_jumlah++;
			Akuns::create($data);
			// return $periode;
		}
		// $kode_akun = $request->kode_akun;
		// Akuns::create([
		// 	'kode_proker' => $kode_prokeramandemen,
		// 		'kode_akun' => $kode_akun,
		// 		'penanggungjawab' => 'tes',
		// 		'periode' => $request->periode_amandemen,
		// 		'jumlah' => $request->anggaran_amandemen,
		// ]);
		// $kode_akun = $request->kode_akun;
		// $no_jumlah = 0;
		// foreach ($kode_akun as $i) {
		// 	$data = [
		// 		'kode_proker' => $kode_prokeramandemen,
		// 		'kode_akun' => $i,
		// 		'penanggungjawab' => 'tes',
		// 		'periode' => $request->periode_amandemen,
		// 		'jumlah' => $request->jumlah[$no_jumlah],
		// 	];
		// 	$no_jumlah++;
		// 	Akuns::create($data);
		// 	// return $periode;
		// }

		// $akuns = Akuns::where('kode_proker', $request->kode_proker)->update([
		// 	'status_amandemens' => 'Amandemen'
			
		// ]);
		return redirect('/amandemen')->with('status', 'Data berhasil ditambahkan');

	}
	public function lihatamandemen($id_amandemen)
	{
		$amandemen = Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
			->where('id_amandemen', $id_amandemen)->get();
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();

		return view('programkerja/amandemen/lihatamandemen', compact('amandemen', 'periode', 'pegawai', 'coa'));
	}

	public function konfirmasiamandemen(Request $request)
	{
		$amandemen = Amandemen::where('id_amandemen', $request->id_amandemen)->update([
			'status_amandemen' => $request->status_amandemen,
			'catatan_amandemen' => $request->catatan_amandemen
		]);
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
}
