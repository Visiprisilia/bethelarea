<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Akuns;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use Illuminate\Support\Facades\Validator;
use App\Models\Coa\Coa;
use App\Models\Pegawai\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;

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
		$programkerja = ProgramKerja::join("pegawai", "program_kerja.penanggungjawab", "=", "pegawai.niy")
		->where('anggaran', '!=', 0)
		->where('periode', $id)
		->orderBy('program_kerja.created_at','asc')
		->get();
		return view('programkerja/programkerja/viewprogramkerja', [
			'programkerja' => $programkerja, 
			'periode' => $periode,
			'pegawai' => $pegawai
		]);
	}
	public function tambahprogramkerja()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('kode_akun', 'asc')->get();
		return view('programkerja/programkerja/tambahprogramkerja', ['coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai]);
	}
	public function simpanprogramkerja(Request $request)
	{
		// $validator = Validator::make($request->all(), [				
		// 	'kode_akun'=>'unique:akuns'	
		// ],[		
		// 	"kode_akun.unique"=>"Kode akun tersebut sudah di anggarkan",			
		// ]);

		// if ($validator->fails()) {    
		// 	$message = $validator->errors()->getMessages();
		// 	$api = array(
		// 		'message' => $message
		// 	);
		// 	return redirect('/tambahprogramkerja')->withErrors($validator);			
		// }
		$validator = Validator::make($request->all(), [

			'periode' => 'required',
			'kode_akun' => 'unique:akuns',
			'nama_proker' => 'required',
			'penanggungjawab' => 'required',
			'waktu_mulai' => 'required',
			'waktu_selesai' => 'required',
			'tujuan' => 'required',
			'indikator' => 'required',
			'anggaran' => 'required',
			'keterangan_proker' => 'required'
		], [
			"kode_akun.unique" => "Kode akun tersebut sudah di anggarkan",
			"periode.required" => "Periode tidak boleh kosong",
			"nama_proker.required" => "Nama Program Kerja tidak boleh kosong",
			"penanggungjawab.required" => "Penanggung Jawab tidak boleh kosong",
			"waktu_mulai.required" => "Waktu Mulai tidak boleh kosong",
			"waktu_selesai.required" => "Waktu Selesai tidak boleh kosong",
			"tujuan.required" => "Tujuan tidak boleh kosong",
			"indikator.required" => "Indikator tidak boleh kosong",
			"anggaran.required" => "Anggaran tidak boleh kosong",
			"keterangan_proker.required" => "Keterangan tidak boleh kosong"

		]);

		if ($validator->fails()) {
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahprogramkerja')->withErrors($validator);
				}
		$periode = $request->periode;
		$penanggungjawab = $request->penanggungjawab;
		$kode_akun = $request->akun;
		$ambilcp = Periode::where('kode_periode', $periode)->get();
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
			'pob' => $request->pob,
			'status_proker' => 'Menunggu Persetujuan'
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

		Periode::where('kode_periode', $periode)->update(['counter_proker' => $check + 1]);


		return redirect('/programkerja')->with('status', 'Data berhasil ditambahkan');
	}
	public function editprogramkerja($kode_proker)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$coa = Coa::orderBy('created_at', 'asc')->get();

		$dataproker = ProgramKerja::where('kode_proker', $kode_proker)->get();
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->get();
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
		->where('kode_proker', $kode_proker)->where('status_amandemens', '!=', 'Amandemen')->get();
		// return $programkerja;
		foreach ($dataproker as $row) {
			$status_proker = $row['status_proker'];
		}

		if ($status_proker == 'Revisi') {
			return view('programkerja/programkerja/editprogramkerja',  ['programkerja' => $programkerja, 'akun' => $akun, 'coa' => $coa, 'periode' => $periode, 'pegawai' => $pegawai]);
		} else {
			return redirect('/programkerja')->with('status', 'Data tidak bisa diubah');
		}
	}
	public function updateprogramkerja(Request $request)
	{
		// var_dump($request);
			$programkerja = ProgramKerja::where('kode_proker', $request->kode_proker)->update([
				'nama_proker' => $request->nama_proker,
				'penanggungjawab' => $request->penanggungjawab,
				'waktu_mulai' => $request->waktu_mulai,
				'waktu_selesai' => $request->waktu_selesai,
				'tujuan' => $request->tujuan,
				'indikator' => $request->indikator,
				'anggaran' => $request->anggaran,
				'keterangan_proker' => $request->keterangan_proker,
				'status_proker'=>'Menunggu Persetujuan'
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


		return redirect('/programkerja')->with('status', 'Data berhasil diubah');
	}
	public function hapusprogramkerja($kode_proker)
	{
		$dataproker = ProgramKerja::where('kode_proker', $kode_proker)->get();
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->where('status_proker', '=', 'Revisi')->delete();
		foreach ($dataproker as $row) {
			$status_proker = $row['status_proker'];
		}

		if ($status_proker == 'Revisi') {
			return redirect('/programkerja')->with('status', 'Data berhasil dihapus');
		} else {
			return redirect('/programkerja')->with('status', 'Data tidak bisa dihapus');
		}
	}

	public function lihatproker($kode_proker)
	{
		$programkerja = ProgramKerja::where('kode_proker', $kode_proker)->get();
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$coa = Coa::orderBy('created_at', 'desc')->get();

		return view('programkerja/programkerja/lihatproker', compact('programkerja', 'periode', 'pegawai', 'coa'));
	}
	public function konfirmasi(Request $request)
	{
		$programkerja = ProgramKerja::where('kode_proker', $request->kode_proker)->update([
			'status_proker' => $request->status_proker,
			'catatan' => $request->catatan
		]);
		$akun = Akuns::where('kode_proker', $request->kode_proker)->where('status_pa', '=', 'proker')->update([
			'persetujuan_proker' => $request->status_proker,
		]);
		return redirect('/programkerja')->with('status', 'Data berhasil diubah');
	}

	//lihat program kerja di table akun
	public function lihatprogramkerja($kode_proker)
	{
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->where('kode_proker', $kode_proker)
			// ->where('status_amandemens','!=','Amandemen')
			// ->where('status_pa','=','proker')	
			->orderBy('akuns.created_at', 'desc')->get();
		return view('programkerja/programkerja/lihatprogramkerja', compact('akun'));
	}
	public function cetakprogramkerja()
	{
		$programkerja = Periode::orderBy('created_at', 'desc')->get();
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/programkerja/cetakprogramkerja', compact('programkerja', 'coa','tanggalhariini'));
	}
	public function cetakprogramkerjapendapatan()
	{
		$programkerja = Periode::orderBy('created_at', 'desc')->get();
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$coa = Coa::orderBy('created_at', 'desc')->get();
		return view('programkerja/programkerja/cetakprogramkerjapendapatan', compact('programkerja', 'coa','tanggalhariini'));
	}
	public function viewcetakprogramkerja(Request $request)
	{
		$id = $request->id;
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$jumlah = programkerja::where('periode',$id)
		->where('anggaran','!=',0)
		->where('pob','like','Biaya')
		->where('status_proker','like','Disetujui')
		->sum('anggaran');
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$programkerja = programkerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")
		->orderBy('program_kerja.created_at', 'asc')
		->where('periode', $id)
		->where('anggaran','!=',0)
		->where('status_proker','like','Disetujui')
		->where('pob','like','Biaya')
		->get();
		// $programkerja = ProgramKerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")->where('periode', $id)->get();
		return view('programkerja/programkerja/viewcetakprogramkerja', ['programkerja' => $programkerja, 
		'periode' => $periode, 'pegawai' => $pegawai, 'tanggalhariini'=>$tanggalhariini,'jumlah'=>$jumlah]);
	}
	public function viewcetakprogramkerjapendapatan(Request $request)
	{
		$id = $request->id;
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$jumlah = programkerja::where('periode',$id)
		->where('anggaran','!=',0)
		->where('pob','like','Pendapatan')
		->where('status_proker','like','Disetujui')
		->sum('anggaran');
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$programkerja = programkerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")
		->orderBy('program_kerja.created_at', 'asc')
		->where('periode', $id)
		->where('anggaran','!=',0)
		->where('status_proker','like','Disetujui')
		->where('pob','like','Pendapatan')
		->get();
		// $programkerja = ProgramKerja::join("pegawai","program_kerja.penanggungjawab","=","pegawai.niy")->where('periode', $id)->get();
		return view('programkerja/programkerja/viewcetakprogramkerjapendapatan', ['programkerja' => $programkerja, 
		'periode' => $periode, 'pegawai' => $pegawai, 'tanggalhariini'=>$tanggalhariini,'jumlah'=>$jumlah]);
	}
}
