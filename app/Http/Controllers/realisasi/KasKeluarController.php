<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Models\Periode\Periode;
use App\Models\Pegawai\Pegawai;
use App\Models\Akuns;
use App\Models\Coa\Coa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Laporan\LaporanPosisiAnggaran;
use App\Models\Realisasi\KasBon;
use App\Models\BukuBesar\BukuBesarKas;
use App\Models\ProgramKerja\Amandemen;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\ProgramKerja\Anggaran;
use App\Models\Ttd\Ttd;
use Illuminate\Support\Arr;

class KasKeluarController extends Controller
{
	public function kaskeluar()
	{
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		// $kaskeluar = KasKeluar::orderBy('created_at', 'desc')->get();
		$kaskeluar = KasKeluar::join("pegawai", "kas_keluar.penanggungjawab", "=", "pegawai.niy")->orderBy('kas_keluar.created_at', 'asc')->get();
		return view('realisasi/kaskeluar/kaskeluar', ['periode' => $periode, 'pegawai' => $pegawai, 'akun' => $akun, 'kaskeluar' => $kaskeluar]);
	}
	public function viewkaskeluar(Request $request)
	{
		$id = $request->id;
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		// $kaskeluar = KasKeluar::orderBy('created_at', 'desc')->get();
		$kaskeluar = KasKeluar::join("pegawai", "kas_keluar.penanggungjawab", "=", "pegawai.niy")
			->where('periode', $id)->orderBy('kas_keluar.created_at', 'asc')->get();
		return view('realisasi/kaskeluar/viewkaskeluar', ['periode' => $periode, 'pegawai' => $pegawai, 'akun' => $akun, 'kaskeluar' => $kaskeluar]);
	}
	public function tambahkaskeluar()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$laporankas = BukuBesarKas::orderBy('tgl', 'desc')->get();
		$tambah = BukuBesarKas::join("periode", "bbkas.periode", "=", "periode.kode_periode")
			->where('status', 'LIKE', 'AKTIF')
			->sum('bertambah');
		$kurang = BukuBesarKas::join("periode", "bbkas.periode", "=", "periode.kode_periode")
			->where('status', 'LIKE', 'AKTIF')
			->sum('berkurang');
		$totalkas = $tambah - $kurang;
		// $akun = Akuns::orderBy('created_at','desc')->get();
		$akun = Akuns::join("periode", "akuns.periode", "=", "periode.kode_periode")
			->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
			->where('status', 'LIKE', 'AKTIF')
			->where('akuns.kode_akun', 'LIKE', '5%') //coa
			->where('status_amandemens', '!=', 'Amandemen') //table akuns
			->where('persetujuan_proker', 'LIKE', 'Disetujui') //proker
			->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui') //proker
			->get();
		// $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
		// ->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
		// // ->join("amandemen","akuns.kode_proker","=","amandemen.kode_prokeramandemen")
		// ->where('status_amandemens','!=','Amandemen')//table akuns
		// ->where('persetujuan_proker', 'LIKE', 'Disetujui')//proker
		// ->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui')//proker
		// ->where('status', 'LIKE', 'AKTIF')//periode
		// ->where('kode_akun', 'LIKE', '5%')//coa
		// // ->where('status_amandemen','LIKE','Disetujui')//table amandemen
		// ->get();

		// $programkerja = Anggaran::join("periode", "anggaran.periode", "=", "periode.kode_periode")
		// ->where('kode_akun', 'LIKE', '5%')//coa
		// ->where('status_proker', 'LIKE', 'Disetujui')
		// ->orwhere('status_amandemen', 'LIKE', 'Disetujui')
		// ->where('anggaran', '!=',0)		

		$programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
			->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
			->where('kode_akun', 'LIKE', '5%') //coa
			->where('persetujuan_proker', 'LIKE', 'Disetujui') //proker
			->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui') //proker
			->get();
		return view('realisasi/kaskeluar/tambahkaskeluar', ['periode' => $periode, 'akun' => $akun, 'pegawai' => $pegawai, 'programkerja' => $programkerja, 'totalkas' => $totalkas]);
	}
	public function setoran()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$kasbon = KasBon::where('status_bon', 'LIKE', 'Belum Dipertanggungjawabkan')->get();
		// $akun = Akuns::orderBy('created_at','desc')->get();
		$akun = Akuns::join("periode", "akuns.periode", "=", "periode.kode_periode")
			->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
			->where('status', 'LIKE', 'AKTIF')
			->where('status_amandemens', '!=', 'Amandemen') //table akuns
			->where('persetujuan_proker', 'LIKE', 'Disetujui') //proker
			->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui') //proker
			->get();
		// $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
		// ->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
		// // ->join("amandemen","akuns.kode_proker","=","amandemen.kode_prokeramandemen")
		// ->where('status_amandemens','!=','Amandemen')//table akuns
		// ->where('persetujuan_proker', 'LIKE', 'Disetujui')//proker
		// ->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui')//proker
		// ->where('status', 'LIKE', 'AKTIF')//periode
		// ->where('kode_akun', 'LIKE', '5%')//coa
		// // ->where('status_amandemen','LIKE','Disetujui')//table amandemen
		// ->get();
		$programkerja = Anggaran::join("periode", "anggaran.periode", "=", "periode.kode_periode")
			->where('status_proker', 'LIKE', 'Disetujui')
			->orwhere('status_amandemen', 'LIKE', 'Disetujui')
			// ->where('anggaran', '!=',0)		
			->get();
		return view('realisasi/kaskeluar/setoran', [
			'periode' => $periode, 'akun' => $akun, 'pegawai' => $pegawai,
			'kasbon' => $kasbon, 'programkerja' => $programkerja
		]);
	}
	public function simpankaskeluar(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'jumlah' => 'lte:anggaran|lte:totalkas|lte:anggarans|required',
			'periode' => 'required',
			'keterangan' => 'required',
			'akun' => 'required',
			'prokers' => 'required',
			'anggaran' => 'required',
			'bukti' => 'required',
			'penanggungjawab' => 'required',
			'kasir' => 'required',
		], [
			"jumlah.lte" => "Jumlah harus bernilai kurang dari atau sama dengan Saldo Kas dan Anggaran Proker",
			// "jumlah.numeric"=>"Jumlah harus berupa nilai rupiah",
			"periode.required" => "Periode tidak boleh kosong",
			"keterangan.required" => "Keterangan tidak boleh kosong",
			"akun.required" => "Akun tidak boleh kosong",
			"prokers.required" => "Program Kerja tidak boleh kosong",
			"anggaran.required" => "Anggaran tidak boleh kosong",
			"jumlah.required" => "Jumlah tidak boleh kosong",
			"bukti.required" => "Anda belum mengupload bukti",
			"penanggungjawab.required" => "Penanggungjawab tidak boleh kosong",
			"kasir.required" => "Akan dibayar kepada siapa?",

		]);

		if ($validator->fails()) {
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahkaskeluar')->withErrors($validator);
		}

		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
		$check = KasKeluar::count();
		$bukti = $request->bukti;
		// $no_bukti = 'BKK'.$tanggalhariini.$check + 1;	
		$periode = $request->periode;
		$ambilkk = Periode::where('kode_periode', $periode)->get();
		$check = 0;
		foreach ($ambilkk as $kk) {

			$check = $kk->counter_kk;
		}
		$no_bukti = 'BKK' . $tanggalhariini . $check + 1;


		$destinationPath = 'assets/images/kaskeluar/';
		$buktis = 'BKK_' . $no_bukti . '.' . $bukti->getClientOriginalExtension();
		$bukti->move($destinationPath, $buktis);

		//$check = Periode kolom counter_kk +1, sesuai dengan $periode
		//setelah menambah kk, ubah di tabel periode untuk kolom counter_kk =+1 sesuai dengan $periode
		//catat bukti kas bon jika ada 

		// $jumlah = $request->jumlah =str_replace(array(‘Rp’, ‘.’ ), ”, $_POST[‘angka’]);
		//Puji Lord!
		$jumlah = $request->jumlah;
		$jumlahs = str_replace(array('', '.'), '', $jumlah);

		KasKeluar::create([
			'no_bukti' => $no_bukti,
			'periode' => $request->periode,
			'tanggal_pencatatan' => $tanggalhariinis,
			'keterangan' => $request->keterangan,
			'akun' => $request->akun,
			'prokers' => $request->prokers,
			'anggaran' => $request->anggaran,
			'jumlah' => $jumlahs,
			'bukti' => $buktis,
			'penanggungjawab' => $request->penanggungjawab,
			'kasir' => $request->kasir,
			'totalkas' => $request->totalkas,
		]);

		$prokers = $request->prokers;
		$waktu_selesai = $request->waktu_selesai;
		ProgramKerja::where('kode_proker', $prokers)->where('waktu_selesai', '!=', $tanggalhariinis)->update(['status_realisasi' => 'Realisasi Sebagian']);
		ProgramKerja::where('kode_proker', $prokers)->where('waktu_selesai', '=', $tanggalhariinis)->update(['status_realisasi' => 'Realisasi']);

		Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->where('program_kerja.kode_proker', $prokers)
			->where('program_kerja.waktu_selesai', '!=', $tanggalhariinis)
			->update(['amandemen.status_realisasi' => 'Realisasi Sebagian']);
		Amandemen::join("program_kerja", "amandemen.kode_prokeramandemen", "=", "program_kerja.kode_proker")
			->where('program_kerja.kode_proker', $prokers)
			->where('program_kerja.waktu_selesai', '=', $tanggalhariinis)
			->update(['amandemen.status_realisasi' => 'Realisasi']);
		Periode::where('kode_periode', $periode)->update(['counter_kk' => $check + 1]);

		return redirect('/kaskeluar')->with('status', 'Data berhasil ditambahkan');
	}
	public function simpansetoran(Request $request)
	{


		$validator = Validator::make($request->all(), [
			'jumlah' => 'required',
			'periode' => 'required',
			'keterangan' => 'required',
			// 'akun'=> 'required',
			// 'prokers'=> 'required',
			// 'anggaran'=> 'required',		
			'bukti' => 'required',
			// 'penanggungjawab'=> 'required',
			// 'kasir'=> 'required',
		], [
			// "jumlah.lte"=>"Jumlah harus bernilai kurang dari atau sama dengan Anggaran",
			// "jumlah.numeric"=>"Jumlah arus berupa nilai rupiah",
			"periode.required" => "Periode tidak boleh kosong",
			"keterangan.required" => "Keterangan tidak boleh kosong",
			// "akun.required"=>"Akun tidak boleh kosong",
			// "prokers.required"=>"Program Kerja tidak boleh kosong",
			// "anggaran.required"=>"Anggaran tidak boleh kosong",
			"jumlah.required" => "Jumlah tidak boleh kosong",
			"bukti.required" => "Anda belum mengupload bukti",
			// "penanggungjawab.required"=>"Penanggungjawab tidak boleh kosong",
			// "kasir.required"=>"Akan dibayar kepada siapa?",

		]);

		if ($validator->fails()) {
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/setoran')->withErrors($validator);
		}

		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
		$check = KasKeluar::count();
		$bukti = $request->bukti;
		// $no_bukti = 'BKK'.$tanggalhariini.$check + 1;	
		$periode = $request->periode;
		$ambilkk = Periode::where('kode_periode', $periode)->get();
		$check = 0;
		foreach ($ambilkk as $kk) {

			$check = $kk->counter_kk;
		}
		$no_bukti = 'BKK' . $tanggalhariini . $check + 1;


		$destinationPath = 'assets/images/kaskeluar/';
		$buktis = 'BKK_' . $no_bukti . '.' . $bukti->getClientOriginalExtension();
		$bukti->move($destinationPath, $buktis);

		//$check = Periode kolom counter_kk +1, sesuai dengan $periode
		//setelah menambah kk, ubah di tabel periode untuk kolom counter_kk =+1 sesuai dengan $periode
		//catat bukti kas bon jika ada 

		$jumlah = $request->jumlah;
		$jumlahs = str_replace(array('', '.'), '', $jumlah);
		KasKeluar::create([
			'no_bukti' => $no_bukti,
			'periode' => $request->periode,
			'tanggal_pencatatan' => $tanggalhariinis,
			'keterangan' => $request->keterangan,
			'akun' => null,
			'prokers' => 0,
			'anggaran' => 0,
			'jumlah' => $jumlahs,
			'bukti' => $buktis,
			'penanggungjawab' =>  $request->penanggungjawab,
			'kasir' =>  $request->kasir,
			'totalkas' => NULL,
		]);

		//jika kas bon !=null 
		//update untuk table kas bon pada kolom jumlah_ptj sesuai dengan bukti kas bon
		//rumus jumlah_ptj=jumlah_ptj+jumlah kk
		Periode::where('kode_periode', $periode)->update(['counter_kk' => $check + 1]);

		return redirect('/kaskeluar')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkaskeluar($no_bukti)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$kasbon = KasBon::where('status_bon', 'LIKE', 'Sudah')->get();
		$akun = Akuns::join("periode", "akuns.periode", "=", "periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->get();

		// $akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/editkaskeluar', ['periode' => $periode, 'pegawai' => $pegawai, 'akun' => $akun, 'kaskeluar' => $kaskeluar, 'kasbon' => $kasbon]);
	}

	public function updatekaskeluar(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
		$check = KasKeluar::count();
		$bukti = $request->bukti;
		$no_bukti = 'BKK' . $tanggalhariini . $check + 1;
		$destinationPath = 'assets/images/kaskeluar/';
		$buktis = 'BKK_' . $no_bukti . '.' . $bukti->getClientOriginalExtension();
		$bukti->move($destinationPath, $buktis);

		$kaskeluar = KasKeluar::where('no_bukti', $request->no_bukti)->update([
			'no_bukti' => $request->no_bukti,
			'periode' => $request->periode,
			'tanggal_pencatatan' => $tanggalhariinis,
			'keterangan' => $request->keterangan,
			'akun' => $request->akun,
			'prokers' => $request->prokers,
			'jumlah' => $request->jumlah,
			'anggaran' => $request->anggaran,
			'bukti' => $buktis,
			'penanggungjawab' => $request->penanggungjawab,
			'kasir' => $request->kasir,
			// 'no_buktibon' => $request->no_buktibon
		]);
		return redirect('/kaskeluar')->with('status', 'Data berhasil diubah');
	}
	public function lihatkaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::join("pegawai", "kas_keluar.penanggungjawab", "=", "pegawai.niy")
			->where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/lihatkaskeluar', compact('kaskeluar'));
	}
	public function cetakkaskeluar($no_bukti)
	{
		$ttd = Ttd::orderBy('created_at', 'asc')->get()->first();
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/cetakkaskeluar', compact('kaskeluar','ttd'));
	}
	public function hapuskaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->delete();
		return redirect('/kaskeluar')->with('status', 'Data berhasil dihapus');
	}
	//yg dipakai
	// public function pilihproker()
	// {
	// 	$data = ProgramKerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
	// 	->where('program_kerja.pob','=','biaya')
	// 	->where('program_kerja.status_proker','=','Disetujui')
	// 	->where('periode.status','=','AKTIF')
	// 	->where('nama_proker', 'LIKE', '%'.request('q').'%')->paginate(10);

	//     return response()->json($data);

	// }
	public function pilihproker()
	{
		$data = ProgramKerja::join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
			->join("periode", "program_kerja.periode", "=", "periode.kode_periode")
			->where('status_amandemens','!=','Amandemen')
			->where('program_kerja.pob','=','Biaya')
			->where('program_kerja.status_proker','=','Disetujui')
			->where('periode.status','=','AKTIF')
			->where('program_kerja.nama_proker', 'LIKE', '%' . request('q') . '%')->paginate(10);

		return response()->json($data);
	}
	// public function pilihprokers(Request $request)
	// {
	// 	$id = $request->id;
	// 	// $data = Akuns::where("kode_akun", $request->kode)
	// 	$data = ProgramKerja::where('pob', '=', 'biaya')->where("kode_proker", $request->id)
	// 		->where('status_proker', '=', 'Disetujui')
	// 		->where('nama_proker', 'LIKE', '%' . request('q') . '%')->paginate(10);

	// 	return response()->json($data);
	// }
	public function pilihprokers(Request $request)
	{
		$id = $request->id;
		// $data = Akuns::where("kode_akun", $request->kode)
		$data = Akuns::join("program_kerja", "akuns.kode_proker", "=", "program_kerja.kode_proker")
		->where("akuns.kode_proker", $request->id)
		->where('akuns.status_amandemens', '!=', 'Amandemen')
		->where('program_kerja.nama_proker', 'LIKE', '%' . request('q') . '%')->paginate(10);

		return response()->json($data);
	}
	public function pilihakun($kode_proker)
	{
		$data = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
			->where('kode_proker', $kode_proker)->where('status_amandemens', '!=', 'Amandemen')
			->where('nama_akun', 'LIKE', '%' . request('q') . '%')->paginate(10);
		$data2 = Akuns::join("lapposisianggaran", "akuns.kode_akun", "=", "lapposisianggaran.akun")
			->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->get();
		return response()->json($data);
	}

	public function pilihakuns(Request $request)
	{
		$kode = $request->kode;
		$data = Akuns::where("kode_akun", $request->kode)
			->where('status_amandemens', '!=', 'Amandemen')->first();
		$data2 = Akuns::join("lapposisianggaran", "akuns.kode_akun", "=", "lapposisianggaran.akun")
			->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
			->where("akun", $kode)->where("status_amandemens", "!=", "Amandemen")->get();
		$data3 = Akuns::join("pegawai", "akuns.penanggungjawab", "=", "pegawai.niy")
			->where("kode_akun", $request->kode)
			->where('status_amandemens', '!=', 'Amandemen')->get();
		return response()->json([
			"proker" => $data,
			"lappa" => $data2,
			"prokerz" => $data3

		]);
	}
	public function pilihbon(Request $request)
	{
		$no = $request->no;
		$data = KasBon::where("no_bukti", $no)->first();
		$data2 = KasBon::where("no_bukti", $no)->get();
		$data3 = KasBon::join("program_kerja", "kas_bon.proker_bon", "=", "program_kerja.kode_proker")->where("no_bukti", $no)->get();
		$data4 = KasBon::join("coa", "kas_bon.akun_bon", "=", "coa.kode_akun")->where("no_bukti", $no)->get();
		$data5 = KasBon::join("pegawai", "kas_bon.penanggungjawab_bon", "=", "pegawai.niy")->where("no_bukti", $no)->get();
		return response()->json([
			"bon" => $data,
			"coba" => $data2,
			"coba2" => $data3,
			"coba3" => $data4,
			"coba4" => $data5,

		]);
	}
	public function downloadbkk($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->first();
		$destinationPath = 'assets/images/kaskeluar/' . $kaskeluar->bukti;
		return response()->download($destinationPath);
	}
}
