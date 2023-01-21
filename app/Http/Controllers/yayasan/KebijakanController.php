<?php

namespace App\Http\Controllers\yayasan;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Models\Yayasan\Kebijakan;
use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\Storage;
Use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;



class KebijakanController extends Controller

{
   
	public function kebijakan()
    {
        $kebijakan = Kebijakan::orderBy('created_at','desc')->get();
        return view('yayasan/kebijakan/kebijakan', compact('kebijakan'));
    }
    public function tambahkebijakan()
	{		
		return view('yayasan/kebijakan/tambahkebijakan');
	}
    public function simpankebijakan(Request $request)
	{  
		$validator = Validator::make($request->all(), [	
			'file_kebijakan' => 'required',
			'keterangan' => 'required'
		],[
			"file_kebijakan.required"=>"Anda belum mengupload file kebijakan",
			"keterangan.required"=>"Keterangan tidak boleh kosong"
			
		]);

		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahkebijakan')->withErrors($validator);
			
		}
		$tanggalhariini = Carbon::now()->format('Ymd');
        $check = Kebijakan::count();
		$kode_kebijakan = $tanggalhariini. $check + 1;
		$file_kebijakan = $request->file_kebijakan;			
		$destinationPath = 'assets/images/kebijakan/';
		$kebijakans = 'kebijakan_'.$kode_kebijakan.$check.'.'.$file_kebijakan->getClientOriginalExtension();
		$file_kebijakan->move($destinationPath, $kebijakans);
					
	
		Kebijakan::create([
			'kode_kebijakan'=>$kode_kebijakan,
			'file_kebijakan'=>$kebijakans,
			'keterangan'=>$request->keterangan			
			]);
			return redirect('/kebijakans')->with('status', 'Data berhasil ditambahkan');
		
	}
	public function editkebijakan($kode_kebijakan)
	{
		$kebijakan = Kebijakan::where('kode_kebijakan', $kode_kebijakan)->get();
		return view('yayasan/kebijakan/editkebijakan', compact('kebijakan'));
	}
	public function updatekebijakan(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
        $check = Kebijakan::count();
		$kode_kebijakan = $tanggalhariini. $check + 1;
		$file_kebijakan = $request->file_kebijakan;			
		$destinationPath = 'assets/images/kebijakan/';
		$kebijakans = 'kebijakan_'.$kode_kebijakan.$check.'.'.$file_kebijakan->getClientOriginalExtension();
		$file_kebijakan->move($destinationPath, $kebijakans);

		$kebijakan = Kebijakan::where('kode_kebijakan', $request->kode_kebijakan)->update([
			'kode_kebijakan'=>$request->kode_kebijakan,
			'file_kebijakan'=>$kebijakans,
			'keterangan'=>$request->keterangan		
		]);
		return redirect('/kebijakans')->with('status', 'Data berhasil diubah');
		
	}
	public function hapuskebijakan($kode_kebijakan)
	{
		$kebijakan = Kebijakan::where('kode_kebijakan', $kode_kebijakan)->delete();
		return redirect('/kebijakans') -> with ('status', 'Data berhasil dihapus');
	}

	public function download($kode_kebijakan)
    {
		$kebijakan = Kebijakan::where('kode_kebijakan', $kode_kebijakan)->first();
        $destinationPath = 'assets/images/kebijakan/'.$kebijakan->file_kebijakan;
        return response()->download($destinationPath);  
    }
}