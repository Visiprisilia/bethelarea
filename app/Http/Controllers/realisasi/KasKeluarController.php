<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasKeluar;
use App\Http\Controllers\Controller;

class KasKeluarController extends Controller
{
    public function kaskeluar()
    {
        $kaskeluar = KasKeluar::orderBy('created_at','desc')->get();
        return view('realisasi/kaskeluar/kaskeluar', compact('kaskeluar'));
    }
    public function tambahkaskeluar()
	{
		return view('realisasi/kaskeluar/tambahkaskeluar');
	}
    public function simpankaskeluar(Request $request)
	{
		KasKeluar::create([
			'no_bukti'=>$request->no_bukti,
			'tanggal'=>$request->tanggal,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'jumlah'=>$request->jumlah

			]);
			return redirect('/kaskeluar')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkaskeluar($no_bukti)
	{
		$kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kaskeluar/editkaskeluar', compact('kaskeluar'));
	}
	public function updatekaskeluar(Request $request)
	{
        $kaskeluar = KasKeluar::where('no_bukti', $request->no_bukti)->update([
			'no_bukti'=>$request->no_bukti,
			'tanggal'=>$request->tanggal,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'jumlah'=>$request->jumlah
		]);
		return redirect('/kaskeluar')->with('status', 'Data berhasil diubah');
	}
	public function hapuskaskeluar($no_bukti)
	{
        $kaskeluar = KasKeluar::where('no_bukti', $no_bukti)->delete();
		return redirect('/kaskeluar') -> with ('status', 'Data berhasil dihapus');
	}
}