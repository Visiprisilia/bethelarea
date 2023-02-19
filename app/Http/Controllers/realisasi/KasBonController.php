<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasBon;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\Akuns;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai\Pegawai;
use App\Models\ProgramKerja\Anggaran;
use Carbon\Carbon;
use App\Models\BukuBesar\BukuBesarKas;
use App\Http\Controllers\Controller;


class KasBonController extends Controller
{
	public function kasbon()
    {
		$periode = Periode::orderBy('created_at','desc')->get();
        $kasbon = KasBon::join("pegawai", "kas_bon.penanggungjawab_bon", "=", "pegawai.niy")
		->orderBy('kas_bon.created_at','desc')->get();
        return view('realisasi/kasbon/kasbon', compact('kasbon','periode'));
    }
	public function viewkasbon(Request $request)
    {
		$id = $request->id;
        $kasbon = KasBon::join("pegawai", "kas_bon.penanggungjawab_bon", "=", "pegawai.niy")
		->where('periode',$id)->orderBy('kas_bon.created_at','desc')->get();
        return view('realisasi/kasbon/viewkasbon', compact('kasbon'));
    }
    public function tambahkasbon()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$laporankas = BukuBesarKas::orderBy('tgl','desc')->get();  
        $tambah = BukuBesarKas::join("periode", "bbkas.periode", "=", "periode.kode_periode")
		->where('status', 'LIKE', 'AKTIF')
		->sum('bertambah');
        $kurang = BukuBesarKas::join("periode", "bbkas.periode", "=", "periode.kode_periode")
		->where('status', 'LIKE', 'AKTIF')
		->sum('berkurang');
        $totalkas = $tambah-$kurang;
		$akun = Akuns::join("periode", "akuns.periode", "=", "periode.kode_periode")
		->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
		->where('status', 'LIKE', 'AKTIF')
		->where('status_amandemens','!=','Amandemen')//table akuns
		->where('persetujuan_proker', 'LIKE', 'Disetujui')//proker
		->orwhere('persetujuan_amandemen', 'LIKE', 'Disetujui')//proker
		->get();

		$programkerja = Anggaran::join("periode", "anggaran.periode", "=", "periode.kode_periode")
		->where('status_proker', 'LIKE', 'Disetujui')
		->orwhere('status_amandemen', 'LIKE', 'Disetujui')
		// ->where('anggaran', '!=',0)		
		// ->orderBy('anggaran', 'asc')
		->get();
		return view('realisasi/kasbon/tambahkasbon', ['periode'=>$periode,'pegawai'=>$pegawai,'programkerja'=>$programkerja,
		'akun'=>$akun,'totalkas'=>$totalkas]);
	}
    public function simpankasbon(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        // $check = KasBon::count();
		// $no_buktibon = 'BKB'.$tanggalhariini.$check + 1;;
		$periode = $request->periode;

		$ambilkb = Periode::where('kode_periode',$periode)->get();
		$check = 0;
		foreach ($ambilkb as $kb) {
			
			$check = $kb->counter_kb;
		}
		$no_buktibon = 'BKB' . $tanggalhariini . $check + 1;
				
		$validator = Validator::make($request->all(), [	
			'jumlah_bon' => 'lte:anggaran_bon|numeric|required',
			'periode' => 'required',
			'keterangan_bon' => 'required',
			'proker_bon' => 'required',
			'akun_bon' => 'required',
			'anggaran_bon' => 'required',
			'penanggungjawab_bon' => 'required',

		],[
			"jumlah_bon.lte"=>"Jumlah harus bernilai kurang dari atau sama dengan Anggaran",
			"jumlah_bon.numeric"=>"Jumlah harus berupa nilai rupiah",
			"jumlah_bon.required"=>"Jumlah tidak boleh kosong",
			"periode.required"=>"Periode tidak boleh kosong",
			"keterangan_bon.required"=>"Keterangan tidak boleh kosong",
			"proker_bon.required"=>"Program kerja tidak boleh kosong",
			"akun_bon.required"=>"Akun tidak boleh kosong",
			"anggaran_bon.required"=>"Anggaran tidak boleh kosong",
			"penanggungjawab_bon.required"=>"Penanggungjawab tidak boleh kosong",
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahkasbon')->withErrors($validator);
			
		}
		KasBon::create([
			'no_buktibon'=>$no_buktibon,
			'periode'=>$request->periode,
			'tanggal_pengajuan'=>$tanggalhariinis,	
			'keterangan_bon'=>$request->keterangan_bon, 
			'proker_bon'=>$request->proker_bon, 
			'akun_bon'=>$request->akun_bon, 
			'anggaran_bon'=>$request->anggaran_bon,
			'jumlah_bon'=>$request->jumlah_bon,
			'jumlah_ptj'=>$request->jumlah_ptj,
			'penanggungjawab_bon'=>$request->penanggungjawab_bon,
			'tanggal_ptj'=>$request->tanggal_ptj,
			'status_bon'=>'Belum Dipertanggungjawabkan'

//$check = Periode kolom counter_proker +1, sesuai dengan $periode
//setelah menambah proker, ubah di tabel periode untuk kolom counter_proker =+1 sesuai dengan $periode
			]);
			Periode::where('kode_periode', $periode)->update(['counter_kb'=>$check+1]);
			return redirect('/kasbon')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkasbon($no_buktibon)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$programkerja = ProgramKerja::orderBy('created_at','desc')->get();
		$programkerja = ProgramKerja::join("periode","program_kerja.periode","=","periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->get();
		$kasbon = KasBon::where('no_buktibon', $no_buktibon)->get();
		return view('realisasi/kasbon/editkasbon',  ['kasbon'=>$kasbon,'periode'=>$periode,'pegawai'=>$pegawai,'programkerja'=>$programkerja]);
	}
	public function updatekasbon(Request $request)
	{
		
        $tanggalhariini = Carbon::now()->format('Ymd');
        $tanggalhariinis = Carbon::now()->format('Y-m-d');
        $check = KasBon::count();
		$no_buktibon = 'BKB'.$tanggalhariini.$check + 1;;
        $kasbon = KasBon::where('no_buktibon', $request->no_buktibon)->update([
			'no_buktibon'=>$no_buktibon,
			'periode'=>$request->periode,
			'tanggal_pengajuan'=>$tanggalhariinis,	
			'keterangan_bon'=>$request->keterangan_bon, 
			'proker_bon'=>$request->proker_bon, 
			'akun_bon'=>$request->akun_bon, 
			'anggaran_bon'=>$request->anggaran_bon,
			'jumlah_bon'=>$request->jumlah_bon,
			'jumlah_ptj'=>$request->jumlah_ptj,
			'penanggungjawab_bon'=>$request->penanggungjawab_bon,
			'tanggal_ptj'=>$request->tanggal_ptj,
			'status_bon'=>$request->status_bon
		]);
		return redirect('/kasbon')->with('status', 'Data berhasil diubah');
	}
	public function lihatkasbon($no_buktibon)
	{
		$kasbon = KasBon::where('no_buktibon', $no_buktibon)->get();
		return view('realisasi/kasbon/lihatkasbon', compact('kasbon'));
	}
	public function cetakkasbon()
	{
		return view('realisasi/kasbon/cetakkasbon');
	}
	public function hapuskasbon($no_buktibon)
	{
        $kasbon = KasBon::where('no_buktibon', $no_buktibon)->delete();
		return redirect('/kasbon') -> with ('status', 'Data berhasil dihapus');
	}
	public function pilihprokerbon()
	{
		$data = ProgramKerja::where('pob','=','biaya')
		->where('status_proker','=','Disetujui')
		->where('nama_proker', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
	
	}

	// public function pilihprokerbon(Request $request)
	// {
	// 	$kode = $request->kode;
	// 	$data = Akuns::where("kode_proker", $request->kode)->where('status_amandemens','!=','Amandemen')->first();
	// 	$data2 = Akuns::join("lapposisianggaran", "akuns.kode_akun", "=", "lapposisianggaran.akun")->where("kode_proker", $kode)->where("status_amandemens","!=","Amandemen")->get();
	// 	return response()->json([
	// 		"proker"=>$data,
	// 		"lappa"=>$data2

	// 	]);
	// }
	public function pilihprokerbonakun($kode_proker)
	{
		$data = Akuns::join("coa", "akuns.kode_akun", "=", "coa.kode_akun")
		->where('kode_proker', $kode_proker)->where('status_amandemens','!=','Amandemen')
		->where('nama_akun', 'LIKE', '%'.request('q').'%')->paginate(10);
		$data2 = Akuns::join("lapposisianggaran", "akuns.kode_akun", "=", "lapposisianggaran.akun")
		->join("coa", "akuns.kode_akun", "=", "coa.kode_akun")->get();
		return response()->json($data);
		
	}

	public function pilihprokerbonakuns(Request $request)
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
}