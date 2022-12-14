<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Models\Periode\Periode;
use App\Models\Pegawai\Pegawai;
use App\Models\Akuns;
use App\Models\Coa\Coa;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Realisasi\KasBon;

class KasKeluarController extends Controller
{
    public function kaskeluar()
    {
		$periode = Periode::orderBy('created_at','desc')->get();
		$pegawai = Pegawai::orderBy('created_at','desc')->get();
		$akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
        $kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        return view('realisasi/kaskeluar/kaskeluar', ['periode'=>$periode,'pegawai'=>$pegawai,'akun'=>$akun,'kaskeluar'=>$kaskeluar]);
    }
    public function tambahkaskeluar()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$kasbon = KasBon::where('status_bon', 'LIKE', 'Sudah Dipertanggungjawabkan')->get();	
		// $akun = Akuns::orderBy('created_at','desc')->get();
		$akun = Akuns::join("periode","akuns.periode","=","periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->get();
		// $akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		// $coa = Coa::orderBy('created_at','desc')->get();
		return view('realisasi/kaskeluar/tambahkaskeluar', ['periode'=>$periode,'akun'=>$akun,'pegawai'=>$pegawai,'kasbon'=>$kasbon]);
	}
    public function simpankaskeluar(Request $request)
	{
		
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        $check = KasKeluar::count();
		$bukti = $request->bukti ;		
		$no_bukti = 'BKK'.$tanggalhariini.$check + 1;		
		$destinationPath = 'assets/images/kaskeluar/';
		$buktis = 'BKK_'.$no_bukti.'.'.$bukti->getClientOriginalExtension();
		$bukti->move($destinationPath, $buktis);

		
		KasKeluar::create([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$tanggalhariinis,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'prokers'=>$request->prokers,
			'jumlah'=>$request->jumlah,
			'anggaran'=>$request->anggaran,
			'bukti'=>$buktis,
			'kasir'=>$request->kasir


			]);
			return redirect('/kaskeluar')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkaskeluar($no_bukti)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$kasbon = KasBon::where('status_bon', 'LIKE', 'Sudah')->get();
		$akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/editkaskeluar', ['periode'=>$periode,'pegawai'=>$pegawai,'akun'=>$akun,'kaskeluar'=>$kaskeluar,'kasbon'=>$kasbon]);
	}
	public function updatekaskeluar(Request $request)
	{	
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        $check = KasKeluar::count();
		$bukti = $request->bukti ;		
		$no_bukti = 'BKK'.$tanggalhariini.$check + 1;		
		$destinationPath = 'assets/images/kaskeluar/';
		$buktis = 'BKK_'.$no_bukti.'.'.$bukti->getClientOriginalExtension();
		$bukti->move($destinationPath, $buktis);
        
		$kaskeluar = KasKeluar::where('no_bukti', $request->no_bukti)->update([
			'no_bukti'=>$request->no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$tanggalhariinis,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'prokers'=>$request->prokers,
			'jumlah'=>$request->jumlah,
			'anggaran'=>$request->anggaran,
			'bukti'=>$buktis,
			'kasir'=>$request->kasir
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
		return view('realisasi/kaskeluar/cetakkaskeluar',compact('kaskeluar'));
	}
	public function hapuskaskeluar($no_bukti)
	{
        $kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->delete();
		return redirect('/kaskeluar') -> with ('status', 'Data berhasil dihapus');
	}
	public function pilihproker(Request $request)
	{
		$kode =$request->kode;
		$data =Akuns::where("kode_proker",$kode)->first();
		return response()->json([
			"proker"=>$data,

		]);
	}
	public function pilihbon(Request $request)
	{
		$no =$request->no;
		$data =KasBon::where("no_buktibon",$no)->first();
		return response()->json([
			"bon"=>$data,

		]);
	}
}