<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramKerja\Evaluasi;
use Illuminate\Support\Facades\Validator;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Akuns;
use Carbon\Carbon;
use App\Models\Periode\Periode;
use App\Models\Pegawai\Pegawai;
use App\Models\Realisasi\KasKeluar;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Eval_;

class EvaluasiController extends Controller
{
	public function evaluasi()
	{
		$evaluasi = Periode::orderBy('created_at', 'asc')->get();
		return view('programkerja/evaluasi/evaluasi', compact('evaluasi'));
	}
	public function viewevaluasi(Request $request)
	{
		$id = $request->id;
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$evaluasi = Evaluasi::join("pegawai", "evaluasi.penanggungjawab", "=", "pegawai.niy")	
		->where('periode', $id)
		->orderBy('evaluasi.created_at','asc')
		->get();
		return view('programkerja/evaluasi/viewevaluasi', [
			'evaluasi' => $evaluasi, 
			'periode' => $periode,
			'pegawai' => $pegawai
		]);
	}
	public function tambahevaluasi()
	{
		$evaluasi = Evaluasi::join("pegawai", "evaluasi.penanggungjawab", "=", "pegawai.niy")->get();
		// $programkerja = ProgramKerja::orderBy('created_at','desc')->get();
		// $programkerja = ProgramKerja::join("periode","program_kerja.periode","=","periode.kode_periode")
		// ->where('status', 'LIKE', 'AKTIF')->get();
		$programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
			->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
			// ->where('status_pa', 'LIKE', 'proker')
			->where('status', 'LIKE', 'AKTIF')
			->where('status_amandemens', '!=', 'Amandemen')
			->where('persetujuan_proker', 'LIKE', 'Disetujui')
			->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui')
			->where('anggaran', '!=', 0)->get();
		return view('programkerja/evaluasi/tambahevaluasi', ['evaluasi' => $evaluasi, 'programkerja' => $programkerja]);
	}
	public function simpanevaluasi(Request $request)
	{
		$validator = Validator::make($request->all(), [

			'kode_proker' => 'required',
			'periode' => 'required',
			'nama_proker' => 'required',
			'penanggungjawab' => 'required',
			'tujuan' => 'required',
			'akun_beban' => 'required',
			'rencana_anggaran' => 'required',
			'realisasi_anggaran' => 'required',
			'rencana_waktu' => 'required',
			'realisasi_waktu' => 'required',
			'indikator_pencapaian' => 'required',
			'kinerja_pencapaian' => 'required',
			'faktor_pendorong' => 'required',
			'faktor_penghambat' => 'required',
			'tindaklanjut' => 'required'
		], [
			"kode_proker.required" => "Kode Program Kerja tidak boleh kosong",
			"periode.required" => "Periode tidak boleh kosong",
			"nama_proker.required" => "Nama Program Kerja tidak boleh kosong",
			"penanggungjawab.required" => "Penanggungjawab tidak boleh kosong",
			"tujuan.required" => "Tujuan tidak boleh kosong",
			"akun_beban.required" => "Akun Beban tidak boleh kosong",
			"rencana_anggaran.required" => "Rencana Anggaran tidak boleh kosong",
			"realisasi_anggaran.required" => "Realisasi Anggaran tidak boleh kosong",
			"rencana_waktu.required" => "Rencana Waktu tidak boleh kosong",
			"realisasi_waktu.required" => "Realisasi Waktu tidak boleh kosong",
			"indikator_pencapaian.required" => "Indikator tidak boleh kosong",
			"kinerja_pencapaian.required" => "Kinerja Pencapaian tidak boleh kosong",
			"faktor_pendorong.required" => "Faktor Pendorong tidak boleh kosong",
			"faktor_penghambat.required" => "Faktor Penghambat tidak boleh kosong",
			"tindaklanjut.required" => "Tindaklanjut tidak boleh kosong",

		]);

		if ($validator->fails()) {
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahevaluasi')->withErrors($validator);
		}
		$kode_proker = $request->kode_proker;
		$check = Evaluasi::count();
		$kode_evaluasi = "Evaluasi" . $kode_proker . $check + 1;
		Evaluasi::create([
			'kode_evaluasi' => $kode_evaluasi,
			'kode_proker' => $request->kode_proker,
			'periode' => $request->periode,
			'nama_proker' => $request->nama_proker,
			'penanggungjawab' => $request->penanggungjawab,
			'tujuan' => $request->tujuan,
			'akun_beban' => $request->akun_beban,
			'rencana_anggaran' => $request->rencana_anggaran,
			'realisasi_anggaran' => $request->realisasi_anggaran,
			'rencana_waktu' => $request->rencana_waktu,
			'realisasi_waktu' => $request->realisasi_waktu,
			'indikator_pencapaian' => $request->indikator_pencapaian,
			'kinerja_pencapaian' => $request->kinerja_pencapaian,
			'faktor_pendorong' => $request->faktor_pendorong,
			'faktor_penghambat' => $request->faktor_penghambat,
			'tindaklanjut' => $request->tindaklanjut

		]);
		return redirect('/evaluasi')->with('status', 'Data berhasil ditambahkan');
	}
	public function editevaluasi($kode_proker)
	{
		$evaluasi = Evaluasi::where('kode_proker', $kode_proker)->get();
		return view('programkerja/evaluasi/editevaluasi', compact('evaluasi'));
	}
	public function updateevaluasi(Request $request)
	{
		$kode_proker = $request->kode_proker;
		$check = Evaluasi::count();
		$kode_evaluasi = "Evaluasi" . $kode_proker . $check + 1;
		$evaluasi = Evaluasi::where('kode_proker', $request->kode_proker)->update([
			'kode_evaluasi' => $kode_evaluasi,
			'kode_proker' => $request->kode_proker,
			'periode' => $request->periode,
			'nama_proker' => $request->nama_proker,
			'penanggungjawab' => $request->penanggungjawab,
			'tujuan' => $request->tujuan,
			'akun_beban' => $request->akun_beban,
			'rencana_anggaran' => $request->rencana_anggaran,
			'realisasi_anggaran' => $request->realisasi_anggaran,
			'rencana_waktu' => $request->rencana_waktu,
			'realisasi_waktu' => $request->realisasi_waktu,
			'indikator_pencapaian' => $request->indikator_pencapaian,
			'kinerja_pencapaian' => $request->kinerja_pencapaian,
			'faktor_pendorong' => $request->faktor_pendorong,
			'faktor_penghambat' => $request->faktor_penghambat,
			'tindaklanjut' => $request->tindaklanjut
		]);
		return redirect('/evaluasi')->with('status', 'Data berhasil diubah');
	}
	public function pilihprogramkerja(Request $request)
	{
		$kode = $request->kode;
		$data = ProgramKerja::where("kode_proker", $kode)->first();
		$data2 = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->where("kode_proker", $kode)->get();
		$data3 = KasKeluar::where("prokers", $kode)->get();
		return response()->json([
			"programkerja" => $data,
			"akun" => $data2,
			"kaskeluar" => $data3,

		]);
	}
	public function hapusevaluasi($kode_proker)
	{
		$evaluasi = Evaluasi::where('kode_proker', $kode_proker)->delete();
		return redirect('/evaluasi')->with('status', 'Data berhasil dihapus');
	}
	public function cetakevaluasi()
	{
		$evaluasi = Periode::orderBy('created_at', 'asc')->get();
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');		
		return view('programkerja/evaluasi/cetakevaluasi', compact('evaluasi','tanggalhariini'));
	}
	public function viewcetakevaluasi(Request $request)
	{
		$id = $request->id;
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$rencana = Evaluasi::where('periode',$id)
		->sum('rencana_anggaran');
		$realisasi = Evaluasi::where('periode',$id)
		->sum('realisasi_anggaran');
		$evaluasi = Evaluasi::join("pegawai", "evaluasi.penanggungjawab", "=", "pegawai.niy")	
		->where('periode', $id)
		->orderBy('evaluasi.created_at','asc')
		->get();
		return view('programkerja/evaluasi/viewcetakevaluasi', [
			'evaluasi' => $evaluasi, 
			'periode' => $periode,
			'pegawai' => $pegawai,
			'tanggalhariini'=>$tanggalhariini,
			'rencana'=>$rencana,
			'realisasi'=>$realisasi
		]);
	}
}
