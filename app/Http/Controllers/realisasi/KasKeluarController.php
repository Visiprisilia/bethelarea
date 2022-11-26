<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Models\Periode\Periode;
use App\Models\Pegawai\Pegawai;
use App\Models\Akuns;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class KasKeluarController extends Controller
{
    public function kaskeluar()
    {
		$periode = Periode::orderBy('created_at','desc')->get();
		$pegawai = Pegawai::orderBy('created_at','desc')->get();
		$akun = Akuns::orderBy('created_at','desc')->get();
        $kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        return view('realisasi/kaskeluar/kaskeluar', ['periode'=>$periode,'pegawai'=>$pegawai,'akun'=>$akun,'kaskeluar'=>$kaskeluar,]);
    }
    public function tambahkaskeluar()
	{
		$periode = Periode::orderBy('created_at','desc')->get();
		$pegawai = Pegawai::orderBy('created_at','desc')->get();
		$akun = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->get();
		return view('realisasi/kaskeluar/tambahkaskeluar', ['periode'=>$periode,'akun'=>$akun,'pegawai'=>$pegawai]);
	}
    public function simpankaskeluar(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
        $check = KasKeluar::count();
		$no_bukti = 'BKK'.$tanggalhariini.$check + 1;
		KasKeluar::create([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$request->tanggal_pencatatan,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'jumlah'=>$request->jumlah,
			'bukti'=>$request->bukti,
			'kasir'=>$request->kasir


			]);
			return redirect('/kaskeluar')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkaskeluar($no_bukti)
	{
		$periode = Periode::orderBy('created_at','desc')->get();
		$pegawai = Pegawai::orderBy('created_at','desc')->get();
		$akun = Akuns::orderBy('created_at','desc')->get();
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/editkaskeluar', ['periode'=>$periode,'pegawai'=>$pegawai,'akun'=>$akun,'kaskeluar'=>$kaskeluar,]);
	}
	public function updatekaskeluar(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
        $check = KasKeluar::count();
		$no_bukti = 'BKK'.$tanggalhariini.$check + 1;
        $kaskeluar = KasKeluar::where('no_bukti', $request->no_bukti)->update([
			'no_bukti'=>$request->no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$request->tanggal_pencatatan,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'jumlah'=>$request->jumlah,
			'bukti'=>$request->bukti,
			'kasir'=>$request->kasir
		]);
		return redirect('/kaskeluar')->with('status', 'Data berhasil diubah');
	}
	public function lihatkaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/lihatkaskeluar', compact('kaskeluar'));
	}
	public function cetakkaskeluar()
	{
		return view('realisasi/kaskeluar/cetakkaskeluar');
	}
	public function hapuskaskeluar($no_bukti)
	{
        $kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->delete();
		return redirect('/kaskeluar') -> with ('status', 'Data berhasil dihapus');
	}
}