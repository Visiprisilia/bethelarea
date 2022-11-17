<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasMasuk;
use App\Http\Controllers\Controller;

class KasMasukController extends Controller
{
    public function kasmasuk()
    {
        $kasmasuk = KasMasuk::orderBy('created_at','desc')->get();
        return view('realisasi/kasmasuk/kasmasuk', compact('kasmasuk'));
    }
    public function tambahkasmasuk()
	{
		return view('realisasi/kasmasuk/tambahkasmasuk');
	}
    public function simpankasmasuk(Request $request)
	{
		KasMasuk::create([
			'no_bukti'=>$request->no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$request->tanggal_pencatatan,
			'keterangan'=>$request->keterangan,
			'akun'=>$request->akun,
			'sumber'=>$request->sumber,
			'jumlah'=>$request->jumlah,
			'kasir'=>$request->kasir

			]);
			return redirect('/kasmasuk')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkasmasuk($no_bukti)
	{
		$kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kasmasuk/editkasmasuk', compact('kasmasuk'));
	}
	public function updatekasmasuk(Request $request)
	{
        $kasmasuk = KasMasuk::where('no_bukti', $request->no_bukti)->update([
			'no_bukti'=>$request->no_bukti,
			'periode'=>$request->periode,
			'tanggal_pencatatan'=>$request->tanggal_pencatatan,
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
		$kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kasmasuk/lihatkasmasuk', compact('kasmasuk'));
	}
	public function cetakkasmasuk()
	{
		return view('realisasi/kasmasuk/cetakkasmasuk');
	}
	public function hapuskasmasuk($no_bukti)
	{
        $kasmasuk = KasMasuk::where('no_bukti', $no_bukti)->delete();
		return redirect('/kasmasuk') -> with ('status', 'Data berhasil dihapus');
	}
}