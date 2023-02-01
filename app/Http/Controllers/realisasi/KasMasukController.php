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
		->where('sumber',$id)->get();
        return view('realisasi/kasmasuk/sumberkasmasuk', ['periode'=>$periode,'coa'=>$coa,'kasmasuk'=>$kasmasuk,'sumber'=>$sumber]);
    }
    public function tambahkasmasuk()
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

		return view('realisasi/kasmasuk/tambahkasmasuk',['periode'=>$periode,'programkerja'=>$programkerja,'murid'=>$murid,'sumber'=>$sumber]);
	}
    public function simpankasmasuk(Request $request)
	{
		$validator = Validator::make($request->all(), [			
		
			'periode' => 'required',
			'keterangan' => 'required',
			'progja' => 'required',
			'akun' => 'required',
			'sumber' => 'required',
			'jumlah' => 'required|numeric'

		],[
			"periode.required"=>"Periode tidak boleh kosong",
			"keterangan.required"=>"Keterangan tidak boleh kosong",
			"progja.required"=>"Program kerja tidak boleh kosong",
			"akun.required"=>"Akun tidak boleh kosong",
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
			'progja'=>$request->progja,
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
			'progja'=>$request->progja,
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
		$data = Akuns::where("kode_proker", $kode)->first();
		return response()->json([
			"progja" => $data,

		]);
	}
}