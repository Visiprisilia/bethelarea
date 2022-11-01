<?php

namespace App\Http\Controllers\pengajuan;

use Illuminate\Http\Request;
use App\Models\Pengajuan\Pengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    public function pengajuan()
    {
        $pengajuan = DB::table('pengajuan')
		->join('periode','periode.kode_periode', '=', 'pengajuan.kode_pengajuan')
		->get();
        return view('pengajuan/pengajuan')->with('pengajuan', $pengajuan);
    }
    public function tambahpengajuan()
	{
		return view('pengajuan/tambahpengajuan');
	}
    public function simpanpengajuan(Request $request)
	{
		Pengajuan::create([
			'kode_pengajuan'=>$request->kode_pengajuan,
			'kegiatan'=>$request->kegiatan,
			'nominal'=>$request->nominal	
			
			]);
			return redirect('/pengajuan')->with('status', 'Data berhasil ditambahkan');
	}
	public function editpengajuan($kode_pengajuan)
	{
		$pengajuan = Pengajuan::where('kode_pengajuan', $kode_pengajuan)->get();
		return view('pengajuan/editpengajuan', compact('pengajuan'));
	}
	public function updatepengajuan(Request $request)
	{
		$pengajuan = Pengajuan::where('kode_pengajuan', $request->kode_pengajuan)->update([
			'kode_pengajuan'=>$request->kode_pengajuan,
			'kegiatan'=>$request->kegiatan,
			'nominal'=>$request->nominal	
		
		]);
		return redirect('/pengajuan')->with('status', 'Data berhasil diubah');
	}
	public function hapuspengajuan($kode_pengajuan)
	{
		$pengajuan = Pengajuan::where('kode_pengajuan', $kode_pengajuan)->delete();
		return redirect('/pengajuan') -> with ('status', 'Data berhasil dihapus');
	}
}