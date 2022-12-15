<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use Carbon\Carbon;
use App\Models\Periode\Periode;
use App\Models\Murid\Murid;
use App\Models\Akuns;
use App\Models\Pegawai\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Coa\Coa;

class KasMasukController extends Controller
{
    public function kasmasuk()
    {
		$periode = Periode::orderBy('created_at','desc')->get();
		// $akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		$coa = Coa::orderBy('created_at','desc')->get();
		$kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
		// $kasmasuk = KasMasuk::join("murid","kas_masuk.kasir","=","murid.nomor_induk")->get();
		// $kasmasuk = KasMasuk::join("murid","kas_masuk.no_bukti","=","murid.nomor_induk")->get();
        return view('realisasi/kasmasuk/kasmasuk', ['periode'=>$periode,'coa'=>$coa,'kasmasuk'=>$kasmasuk]);
    }
    public function tambahkasmasuk()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$murid = Murid::orderBy('created_at','desc')->get();
		// $akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		$coa = Coa::orderBy('created_at','desc')->get();
		return view('realisasi/kasmasuk/tambahkasmasuk',['periode'=>$periode,'coa'=>$coa,'murid'=>$murid]);
	}
    public function simpankasmasuk(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
		$tanggalhariinis = Carbon::now()->format('Y-m-d');
        $check = KasMasuk::count();
		$no_bukti = "BKM".$tanggalhariini.$check+1;
		KasMasuk::create([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$tanggalhariinis,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'sumber'=>$request->sumber,
			'jumlah'=>$request->jumlah,
			'kasir'=>$request->kasir
	//$check = Periode kolom counter_kk +1, sesuai dengan $periode
//setelah menambah km, ubah di tabel periode untuk kolom counter_kk =+1 sesuai dengan $periode
 
			]);
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
	
}