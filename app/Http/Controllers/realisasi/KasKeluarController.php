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
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\ProgramKerja\Anggaran;

class KasKeluarController extends Controller
{
	public function kaskeluar()
	{
		$periode = Periode::orderBy('created_at', 'desc')->get();
		$pegawai = Pegawai::orderBy('created_at', 'desc')->get();
		$akun = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		// $kaskeluar = KasKeluar::orderBy('created_at', 'desc')->get();
		$kaskeluar = KasKeluar::join("pegawai","kas_keluar.penanggungjawab","=","pegawai.niy")->orderBy('kas_keluar.created_at','asc')->get();
		return view('realisasi/kaskeluar/kaskeluar', ['periode' => $periode, 'pegawai' => $pegawai, 'akun' => $akun, 'kaskeluar' => $kaskeluar]);
	}
	public function tambahkaskeluar()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$kasbon = KasBon::where('status_bon', 'LIKE', 'Belum Dipertanggungjawabkan')->get();
		// $akun = Akuns::orderBy('created_at','desc')->get();
		$akun = Akuns::join("periode", "akuns.periode", "=", "periode.kode_periode")
		->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
		->where('status', 'LIKE', 'AKTIF')
		->where('akuns.kode_akun', 'LIKE', '5%')//coa
		->where('status_amandemens','!=','Amandemen')//table akuns
		->where('persetujuan_proker', 'LIKE', 'Disetujui')//proker
		->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui')//proker
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
		// ->where('kode_akun', 'LIKE', '5%')//coa
		->where('status_proker', 'LIKE', 'Disetujui')
		->orwhere('status_amandemen', 'LIKE', 'Disetujui')
		// ->where('anggaran', '!=',0)		
		->get();
		return view('realisasi/kaskeluar/tambahkaskeluar', ['periode' => $periode, 'akun' => $akun, 'pegawai' => $pegawai, 
		'kasbon' => $kasbon, 'programkerja' => $programkerja]);
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
		->where('status_amandemens','!=','Amandemen')//table akuns
		->where('persetujuan_proker', 'LIKE', 'Disetujui')//proker
		->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui')//proker
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
		return view('realisasi/kaskeluar/setoran', ['periode' => $periode, 'akun' => $akun, 'pegawai' => $pegawai, 
		'kasbon' => $kasbon, 'programkerja' => $programkerja]);
	}
	public function simpankaskeluar(Request $request)
	{

			
		$validator = Validator::make($request->all(), [	
			'jumlah' => 'lte:anggaran|numeric|required',
			'periode'=> 'required',
			'keterangan'=> 'required',
			'akun'=> 'required',
			'prokers'=> 'required',
			'anggaran'=> 'required',		
			'bukti'=> 'required',
			'penanggungjawab'=> 'required',
			'kasir'=> 'required',
		],[
			"jumlah.lte"=>"Jumlah harus bernilai kurang dari atau sama dengan Anggaran",
			"jumlah.numeric"=>"Jumlah arus berupa nilai rupiah",
			"periode.required"=>"Periode tidak boleh kosong",
			"keterangan.required"=>"Keterangan tidak boleh kosong",
			"akun.required"=>"Akun tidak boleh kosong",
			"prokers.required"=>"Program Kerja tidak boleh kosong",
			"anggaran.required"=>"Anggaran tidak boleh kosong",
			"jumlah.required"=>"Jumlah tidak boleh kosong",
			"bukti.required"=>"Anda belum mengupload bukti",
			"penanggungjawab.required"=>"Penanggungjawab tidak boleh kosong",
			"kasir.required"=>"Akan dibayar kepada siapa?",
			
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
		$no_buktibon = $request->no_buktibon;

		//$check = Periode kolom counter_kk +1, sesuai dengan $periode
		//setelah menambah kk, ubah di tabel periode untuk kolom counter_kk =+1 sesuai dengan $periode
		//catat bukti kas bon jika ada 
	

		KasKeluar::create([
			'no_bukti' => $no_bukti,
			'periode' => $request->periode,
			'tanggal_pencatatan' => $tanggalhariinis,
			'keterangan' => $request->keterangan,
			'akun' => $request->akun,
			'prokers' => $request->prokers,
			'anggaran' => $request->anggaran,
			'jumlah' => $request->jumlah,
			'bukti' => $buktis,
			'penanggungjawab' => $request->penanggungjawab,
			'kasir' => $request->kasir,
			'no_buktibon' => $request->no_buktibon
		]);
		if ($no_buktibon != null) {
			$kasbon = KasBon::where('no_buktibon', $request->no_buktibon)->update([
				'jumlah_ptj' => $request->jumlah,
				'status_bon' => 'Sudah Dipertanggungjawabkan',
				'tanggal_ptj' => $tanggalhariinis,
			]);
		}
		//jika kas bon !=null 
		//update untuk table kas bon pada kolom jumlah_ptj sesuai dengan bukti kas bon
		//rumus jumlah_ptj=jumlah_ptj+jumlah kk
		Periode::where('kode_periode', $periode)->update(['counter_kk' => $check + 1]);
	
		return redirect('/kaskeluar')->with('status', 'Data berhasil ditambahkan');
	}
	public function simpansetoran(Request $request)
	{

			
		$validator = Validator::make($request->all(), [	
			'jumlah' => 'numeric|required',
			'periode'=> 'required',
			'keterangan'=> 'required',
			// 'akun'=> 'required',
			// 'prokers'=> 'required',
			// 'anggaran'=> 'required',		
			'bukti'=> 'required',
			// 'penanggungjawab'=> 'required',
			// 'kasir'=> 'required',
		],[
			// "jumlah.lte"=>"Jumlah harus bernilai kurang dari atau sama dengan Anggaran",
			"jumlah.numeric"=>"Jumlah arus berupa nilai rupiah",
			"periode.required"=>"Periode tidak boleh kosong",
			"keterangan.required"=>"Keterangan tidak boleh kosong",
			// "akun.required"=>"Akun tidak boleh kosong",
			// "prokers.required"=>"Program Kerja tidak boleh kosong",
			// "anggaran.required"=>"Anggaran tidak boleh kosong",
			"jumlah.required"=>"Jumlah tidak boleh kosong",
			"bukti.required"=>"Anda belum mengupload bukti",
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
		$no_buktibon = $request->no_buktibon;

		//$check = Periode kolom counter_kk +1, sesuai dengan $periode
		//setelah menambah kk, ubah di tabel periode untuk kolom counter_kk =+1 sesuai dengan $periode
		//catat bukti kas bon jika ada 
	

		KasKeluar::create([
			'no_bukti' => $no_bukti,
			'periode' => $request->periode,
			'tanggal_pencatatan' => $tanggalhariinis,
			'keterangan' => $request->keterangan,
			'akun' => 531001,
			'prokers' => 0,
			'anggaran' => 0,
			'jumlah' => $request->jumlah,
			'bukti' => $buktis,
			'penanggungjawab' => '20100401003',
			'kasir' => 'Neny Widijawati',
			'no_buktibon' =>0
		]);
		if ($no_buktibon != null) {
			$kasbon = KasBon::where('no_buktibon', $request->no_buktibon)->update([
				'jumlah_ptj' => $request->jumlah,
				'status_bon' => 'Sudah Dipertanggungjawabkan',
				'tanggal_ptj' => $tanggalhariinis,
			]);
		}
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
			'no_buktibon' => $request->no_buktibon
		]);
		return redirect('/kaskeluar')->with('status', 'Data berhasil diubah');
	}
	public function lihatkaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/lihatkaskeluar', compact('kaskeluar'));
	}
	public function cetakkaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/cetakkaskeluar', compact('kaskeluar'));
	}
	public function hapuskaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->delete();
		return redirect('/kaskeluar')->with('status', 'Data berhasil dihapus');
	}
	//yg dipakai
	// public function pilihproker(Request $request)
	// {
	// 	$kode = $request->kode;
	// 	$data = Akuns::where("kode_proker", $request->kode)->where('status_amandemens','!=','Amandemen')->first();
	// 	// $data2 =LaporanPosisiAnggaran::where("akun",$kode)->get();
	// 	$data2 = Akuns::join("lapposisianggaran", "akuns.kode_akun", "=", "lapposisianggaran.akun")
	// 	->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->where("kode_proker", $kode)
	// 	->where("status_amandemens","!=","Amandemen")->get();
	// 	return response()->json([
	// 		"proker"=>$data,
	// 		"lappa"=>$data2

	// 	]);
	// }
	public function pilihakun(Request $request)
	{
		$kode = $request->kode;
		$data = Akuns::where("kode_akun", $request->kode)->where('status_amandemens','!=','Amandemen')->first();
		// $data2 =LaporanPosisiAnggaran::where("akun",$kode)->get();
		$data2 = Akuns::join("lapposisianggaran", "akuns.kode_akun", "=", "lapposisianggaran.akun")
		->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
		->where("akun", $kode)->where("status_amandemens","!=","Amandemen")->get();
		return response()->json([
			"proker"=>$data,
			"lappa"=>$data2

		]);
	}
	public function pilihbon(Request $request)
	{
		$no = $request->no;
		$data = KasBon::where("no_buktibon", $no)->first();
		$data2 = KasBon::where("no_buktibon", $no)->get();
		$data3 = KasBon::where("no_buktibon", $no)->get();
		return response()->json([
			"bon" => $data,
			"coba"=>$data2,
			"coba2"=>$data3,

		]);
	}
	public function downloadbkk($no_bukti)
    {
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->first();
		$destinationPath = 'assets/images/kaskeluar/'.$kaskeluar->bukti;
        return response()->download($destinationPath);  
    }



}
