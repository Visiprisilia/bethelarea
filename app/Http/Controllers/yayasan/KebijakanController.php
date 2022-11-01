<?php

namespace App\Http\Controllers\yayasan;

use Illuminate\Http\Request;
use App\Models\Yayasan\Kebijakan;
use App\Http\Controllers\Controller;

class KebijakanController extends Controller
{
    public function kebijakan()
    {
        $kebijakan = Kebijakan::all();
        return view('yayasan/kebijakan/kebijakan', compact('kebijakan'));
    }
    public function tambahkebijakan()
	{
		return view('yayasan/kebijakan/tambahkebijakan');
	}
    public function simpankebijakan(Request $request)
	{
		Kebijakan::create([
			'kode_kebijakan'=>$request->kode_kebijakan,
			'file_kebijakan'=>$request->file_kebijakan,
			'keterangan'=>$request->keterangan			
			]);
			return redirect('/kebijakan')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkebijakan($kode_kebijakan)
	{
		$kebijakan = Kebijakan::where('kode_kebijakan', $kode_kebijakan)->get();
		return view('yayasan/kebijakan/editkebijakan', compact('kebijakan'));
	}
	public function updatekebijakan(Request $request)
	{
		$kebijakan = Kebijakan::where('kode_kebijakan', $request->kode_kebijakan)->update([
			'kode_kebijakan'=>$request->kode_kebijakan,
			'file_kebijakan'=>$request->file_kebijakan,
			'keterangan'=>$request->keterangan		
		]);
		return redirect('/kebijakan')->with('status', 'Data berhasil diubah');
	}
	public function hapuskebijakan($kode_kebijakan)
	{
		$kebijakan = Kebijakan::where('kode_kebijakan', $kode_kebijakan)->delete();
		return redirect('/kebijakan') -> with ('status', 'Data berhasil dihapus');
	}
}