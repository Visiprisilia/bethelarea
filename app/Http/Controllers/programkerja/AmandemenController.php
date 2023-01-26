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

class AmandemenController extends Controller
{
	public function amandemen()
	{
		$programkerja = Periode::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/amandemen/amandemen', compact('programkerja', 'coa'));
	}
	public function viewamandemen(Request $request)
	{
		$id = $request->id;
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		// $programkerja = programkerja::orderBy('created_at', 'desc')->where('periode', $id)->get();
		$programkerja = ProgramKerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")->where('periode', $id)->get();
		return view('programkerja/amandemen/viewamandemen', ['programkerja' => $programkerja, 'periode' => $periode, 
		'pegawai' => $pegawai]);
	}
	public function tambahamandemen()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();
        $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
		->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
		->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->get();
		return view('programkerja/amandemen/tambahamandemen', ['coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai,
        'programkerja'=>$programkerja]);
	}
	public function simpanamandemen(Request $request)
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
			'status_proker'=>'Menunggu Persetujuan'
			

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
    public function pilihbon(Request $request)
	{
		$no = $request->no;
		$data = Amandemen::where("no_buktibon", $no)->first();
		return response()->json([
			"bon" => $data,

		]);
	}}