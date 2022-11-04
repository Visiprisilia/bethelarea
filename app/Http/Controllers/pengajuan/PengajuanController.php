<?php

namespace App\Http\Controllers\pengajuan;

use Illuminate\Http\Request;
use App\Models\Pengajuan\Pengajuan;
use App\Models\Pengajuan\Pegawaiid;
use App\Models\Pegawai\Pegawai;
use App\Models\Coa\Coa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    public function pengajuan()
    {
		$pengajuan = Pengajuan::all();
		$pengajuan = Pengajuan::with('pegawai');
		$pegawai = Pegawai::all();
        return view('pengajuan/pengajuan', compact('pengajuan'));
		}
    public function tambahpengajuan()
	{
		$pegawai = Pegawai::all();
		$coa = Coa::all();
		return view('pengajuan/tambahpengajuan', compact('pegawai','coa'));
	}
    public function simpanpengajuan(Request $request)
	{
		Pengajuan::create([
			'kode_proker'=>$request->kode_proker,
			'proker'=>$request->proker,
			'pegawai_id'=>$request->pegawai_id,
			'tujuan'=>$request->tujuan,
			'akun_kode'=>$request->akun_kode,
			'anggaran'=>$request->anggaran,
			'waktu'=>$request->waktu,	
			'indikator'=>$request->indikator	
			
			]);
			return redirect('/pengajuan')->with('status', 'Data berhasil ditambahkan');
	}
	public function editpengajuan($kode_proker)
	{
		$pegawai = Pegawai::all();
		$pengajuan = Pengajuan::with('pegawai')->findOrFail('pegawai_id');
		$pengajuan = Pengajuan::where('kode_proker', $kode_proker)->get();
		return view('pengajuan/editpengajuan', compact('pengajuan', 'pegawai'));
	}
	public function updatepengajuan(Request $request)
	{
		$pengajuan = Pengajuan::where('kode_proker', $request->kode_proker)->update([
			'kode_proker'=>$request->kode_proker,
			'proker'=>$request->proker,
			'pegawai_id'=>$request->pegawai_id,
			'tujuan'=>$request->tujuan,
			'akun_kode'=>$request->akun_kode,
			'anggaran'=>$request->anggaran,
			'waktu'=>$request->waktu,
			'indikator'=>$request->indikator		
		
		]);
		return redirect('/pengajuan')->with('status', 'Data berhasil diubah');
	}
	public function hapuspengajuan($kode_proker)
	{
		$pengajuan = Pengajuan::where('kode_proker', $kode_proker)->delete();
		return redirect('/pengajuan') -> with ('status', 'Data berhasil dihapus');
	}
}