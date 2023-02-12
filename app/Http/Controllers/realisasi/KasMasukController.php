<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use App\Models\Realisasi\Sumber;
use Carbon\Carbon;
use App\Models\Periode\Periode;
use App\Models\Murid\Murid;
use App\Models\Akuns;
use Illuminate\Support\Facades\Validator;
use App\Models\ProgramKerja\ProgramKerja;

use App\Models\Pegawai\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Coa\Coa;

class KasMasukController extends Controller
{
    public function kasmasuk()
    {
		// $periode = Periode::orderBy('created_at','desc')->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		// $kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
		$sumber = Sumber::orderBy('created_at','desc')->get();
		$kasmasuk = Periode::orderBy('created_at','desc')->get();
        return view('realisasi/kasmasuk/kasmasuk', ['kasmasuk'=>$kasmasuk,'sumber'=>$sumber]);
    }
	public function sumberkasmasuk(Request $request)
    {
		$id = $request->id;
		$periode = Periode::orderBy('created_at','desc')->get();
		$coa = Coa::orderBy('created_at','desc')->get();
		$sumber = Sumber::orderBy('created_at','desc')->get();
		// $kasmasuk = KasMasuk::orderBy('created_at','desc')->where('sumber',$id)->get();
		$kasmasuk = KasMasuk::leftjoin("murid","kas_masuk.kasir","=","murid.nomor_induk")
		->join("sumber","kas_masuk.sumber","=","sumber.id_sumber")
		->where('sumber',$id)->orderBy('kas_masuk.created_at','asc')->get();
        return view('realisasi/kasmasuk/sumberkasmasuk', ['periode'=>$periode,'coa'=>$coa,'kasmasuk'=>$kasmasuk,'sumber'=>$sumber]);
    }
	//cetak rekapan kas masuk murid
	public function cetakrekapan()
    {
		
		//untuk tampilan cetak
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$periode = Periode::orderBy('created_at','desc')->get();
		$coa = Coa::orderBy('created_at','desc')->get();
		$sumber = Sumber::orderBy('created_at','desc')->get();
		$kasmasuk = KasMasuk::leftjoin("murid","kas_masuk.kasir","=","murid.nomor_induk")
		->join("sumber","kas_masuk.sumber","=","sumber.id_sumber")
		->where('sumber','=',1)->orderBy('kas_masuk.created_at','asc')->get();
		
		//untuk jumlah
		$jumlahs = KasMasuk::leftjoin("murid","kas_masuk.kasir","=","murid.nomor_induk")
		->join("sumber","kas_masuk.sumber","=","sumber.id_sumber")
		->where('sumber','=',1)->sum('jumlah');
		


        return view('realisasi/kasmasuk/cetakrekapan', ['kasmasuk'=>$kasmasuk,'sumber'=>$sumber,'jumlahs'=>$jumlahs,'tanggalhariini'=>$tanggalhariini]);
    }
		//filter scetak rekapan kas masuk murid
	public function filter(Request $request)
	{
		$tgl_mulai = $request->input('tgl_mulai');
		$tgl_selesai = $request->input('tgl_selesai');
		
		//untuk tampilan filter
		$tanggalhariini = Carbon::now()->isoFormat('D MMMM Y');
		$sumber = Sumber::orderBy('created_at','desc')->get();
		$mulai = KasMasuk::Where('tanggal_pencatatan','>=', $tgl_mulai)->get()->first();
		$selesai = KasMasuk::Where('tanggal_pencatatan','<=', $tgl_selesai)->get()->first();
		$kasmasuk = KasMasuk::leftjoin("murid","kas_masuk.kasir","=","murid.nomor_induk")->
		where('tanggal_pencatatan','>=',$tgl_mulai)
		->where('tanggal_pencatatan','<=',$tgl_selesai)
		->where('sumber','=',1)
		->orderBy('kas_masuk.created_at','asc')->get();
		
		//untuk jumlah
		$jumlahs = KasMasuk::leftjoin("murid","kas_masuk.kasir","=","murid.nomor_induk")->
		where('tanggal_pencatatan','>=',$tgl_mulai)
		->where('tanggal_pencatatan','<=',$tgl_selesai)
		->where('sumber','=',1)->sum('jumlah');
		
		return view('realisasi/kasmasuk/cetakrekapan', ['kasmasuk'=>$kasmasuk,'sumber'=>$sumber, 'jumlahs'=>$jumlahs, 'mulai'=>$mulai,'tanggalhariini'=>$tanggalhariini]);

	}
	//tidak dipakai
	public function viewcetakrekapan(Request $request)
    {
		$id = $request->id;
		$periode = Periode::orderBy('created_at','desc')->get();
		$coa = Coa::orderBy('created_at','desc')->get();
		$sumber = Sumber::orderBy('created_at','desc')->get();
		// $kasmasuk = KasMasuk::orderBy('created_at','desc')->where('sumber',$id)->get();
		$kasmasuk = KasMasuk::leftjoin("murid","kas_masuk.kasir","=","murid.nomor_induk")
		->join("sumber","kas_masuk.sumber","=","sumber.id_sumber")
		->where('sumber',$id)->get();
        return view('realisasi/kasmasuk/viewcetakrekapan', ['periode'=>$periode,'coa'=>$coa,'kasmasuk'=>$kasmasuk,'sumber'=>$sumber]);
    }
    public function tambahkasmasuk()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$sumber = Sumber::orderBy('created_at','desc')->where('id_sumber','!=',2)->get();
		$akun = COA::where('kode_akun','like','4%')->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		// $coa = Coa::leftjoin("akuns", "coa.kode_akun", "=", "akuns.kode_akun")->get();
		// $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->get();
		// $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
		// ->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
		// ->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->where('kode_akun', 'LIKE', '4%')->where('status_amandemens', '!=', 'Amandemen')->get();
		// // $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")->where('status_proker', 'LIKE', 'Konfirmasi')->where('status', 'LIKE', 'AKTIF')->get();

		return view('realisasi/kasmasuk/tambahkasmasuk',['periode'=>$periode,'akun'=>$akun,'murid'=>$murid,'sumber'=>$sumber]);
	}
	public function tambahmutasi()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$sumber = Sumber::orderBy('created_at','desc')->get();
		// $akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		// $coa = Coa::leftjoin("akuns", "coa.kode_akun", "=", "akuns.kode_akun")->get();
		// $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->get();
		$programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")
		->join("akuns", "program_kerja.kode_proker", "=", "akuns.kode_proker")
		->where('status_proker', 'LIKE', 'Disetujui')->where('status', 'LIKE', 'AKTIF')->where('kode_akun', 'LIKE', '4%')->where('status_amandemens', '!=', 'Amandemen')->get();
		// $programkerja = programkerja::join("periode", "program_kerja.periode", "=", "periode.kode_periode")->where('status_proker', 'LIKE', 'Konfirmasi')->where('status', 'LIKE', 'AKTIF')->get();

		return view('realisasi/kasmasuk/tambahmutasi',['periode'=>$periode,'programkerja'=>$programkerja,'murid'=>$murid,'sumber'=>$sumber]);
	}
    public function simpankasmasuk(Request $request)
	{
		$validator = Validator::make($request->all(), [			
		
			'periode' => 'required',
			'keterangan' => 'required',
			// 'progja' => 'required',
			// 'akun' => 'required',
			'diterimadari'=>'required',
			'sumber' => 'required',
			'jumlah' => 'required|numeric'

		],[
			"periode.required"=>"Periode tidak boleh kosong",
			"keterangan.required"=>"Keterangan tidak boleh kosong",
			// "progja.required"=>"Program kerja tidak boleh kosong",
			// "akun.required"=>"Akun tidak boleh kosong",
			"diterimadari.required"=>"Diterima dari siapa?",
			"sumber.required"=>"Sumber tidak boleh kosong",
			"jumlah.required"=>"Jumlah tidak boleh kosong",
			"jumlah.numeric"=>"Jumlah arus berupa nilai rupiah"
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahkasmasuk')->withErrors($validator);
			
		}
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        // // $check = KasMasuk::count();
		// $check = KasMasuk::count();
		// $no_bukti = 'BKM'.$tanggalhariini.$check + 1;	
		$periode = $request->periode;
		$ambilkm = Periode::where('kode_periode',$periode)->get();
		$check = 0;
		foreach ($ambilkm as $km) {
			
			$check = $km->counter_km;
		}
		$no_bukti = 'BKM' . $tanggalhariini . $check + 1;
		KasMasuk::create([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$tanggalhariinis,
			'keterangan'=>$request->keterangan,
			// 'progja'=>$request->progja,
			'diterimadari'=>$request->diterimadari,
			'akun'=>$request->akun,
			'sumber'=>$request->sumber,
			'jumlah'=>$request->jumlah,
			'kasir'=>$request->kasir
	//$check = Periode kolom counter_kk +1, sesuai dengan $periode
//setelah menambah km, ubah di tabel periode untuk kolom counter_km =+1 sesuai dengan $periode
 
			]);
			Periode::where('kode_periode', $periode)->update(['counter_km'=>$check+1]);
			return redirect('/kasmasuk')->with('status', 'Data berhasil ditambahkan');
	}
	public function simpanmutasi(Request $request)
	{
		$validator = Validator::make($request->all(), [			
		
			'periode' => 'required',
			'keterangan' => 'required',
			// 'sumber' => 'required',
			'jumlah' => 'required|numeric'

		],[
			"periode.required"=>"Periode tidak boleh kosong",
			"keterangan.required"=>"Keterangan tidak boleh kosong",			
			// "sumber.required"=>"Sumber tidak boleh kosong",
			"jumlah.required"=>"Jumlah tidak boleh kosong",
			"jumlah.numeric"=>"Jumlah arus berupa nilai rupiah"
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahmutasi')->withErrors($validator);
			
		}
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        // // $check = KasMasuk::count();
		// $check = KasMasuk::count();
		// $no_bukti = 'BKM'.$tanggalhariini.$check + 1;	
		$periode = $request->periode;
		$ambilkm = Periode::where('kode_periode',$periode)->get();
		$check = 0;
		foreach ($ambilkm as $km) {
			
			$check = $km->counter_km;
		}
		$no_bukti = 'BKM' . $tanggalhariini . $check + 1;
		KasMasuk::create([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$tanggalhariinis,
			'keterangan'=>$request->keterangan,
			// 'progja'=>0,
			'akun'=>'421001',
			'sumber'=>2,
			'jumlah'=>$request->jumlah,
			'kasir'=>0,
			'diterimadari'=>'Neny Widijawati',
	//$check = Periode kolom counter_kk +1, sesuai dengan $periode
//setelah menambah km, ubah di tabel periode untuk kolom counter_km =+1 sesuai dengan $periode
 
			]);
			Periode::where('kode_periode', $periode)->update(['counter_km'=>$check+1]);
			return redirect('/kasmasuk')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkasmasuk($no_bukti)
	{	
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		$akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		$kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kasmasuk/editkasmasuk',  ['periode'=>$periode,'akun'=>$akun,'kasmasuk'=>$kasmasuk,'murid'=>$murid]);
	}
	public function updatekasmasuk(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        $check = KasMasuk::count();
		$no_bukti = "BKM".$tanggalhariini.$check+1;
        $kasmasuk = KasMasuk::where('no_bukti', $request->no_bukti)->update([
			'no_bukti'=>$request->no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$tanggalhariinis,
			'keterangan'=>$request->keterangan,
			// 'progja'=>$request->progja,
			'akun'=>$request->akun,
			'sumber'=>$request->sumber,
			'jumlah'=>$request->jumlah,
			'kasir'=>$request->kasir
		]);
		return redirect('/kasmasuk')->with('status', 'Data berhasil diubah');
	}
	public function lihatkasmasuk($no_bukti)
	{
		$murid = Murid::orderBy('created_at','desc')->get();
		$kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kasmasuk/lihatkasmasuk', compact('kasmasuk','murid'));
	}
	public function cetakkasmasuk($no_bukti)
	{
		$murid = Murid::orderBy('created_at','desc')->get();
		$kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->get();
		// $kasmasuk = KasMasuk::join("murid","kas_masuk.kasir","=","murid.nomor_induk")
		// ->where('no_bukti', $no_bukti)->get();		
		return view('realisasi/kasmasuk/cetakkasmasuk',compact('kasmasuk','murid'));
	}
	public function hapuskasmasuk($no_bukti)
	{
        $kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->delete();
		return redirect('/kasmasuk') -> with ('status', 'Data berhasil dihapus');
	}
	public function pilihprokerkm(Request $request)
	{
		$kode = $request->kode;
		$data = Akuns::where("kode_proker", $kode)->where('status_amandemens','!=','Amandemen')->first();
		return response()->json([
			"progja" => $data,

		]);
	}
}