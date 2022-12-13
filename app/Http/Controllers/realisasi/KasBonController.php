<?php

namespace App\Http\Controllers\realisasi;

use Illuminate\Http\Request;
use App\Models\Realisasi\KasBon;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Periode\Periode;
use App\Models\Pegawai\Pegawai;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class KasBonController extends Controller
{
	public function kasbon()
    {
        $kasbon = KasBon::orderBy('created_at','desc')->get();
        return view('realisasi/kasbon/kasbon', compact('kasbon'));
    }
    public function tambahkasbon()
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		// $programkerja = ProgramKerja::orderBy('created_at','desc')->get();
		$programkerja = ProgramKerja::join("periode","program_kerja.periode","=","periode.kode_periode")->where('status', 'LIKE', 'AKTIF')->get();
		return view('realisasi/kasbon/tambahkasbon', ['periode'=>$periode,'pegawai'=>$pegawai,'programkerja'=>$programkerja]);
	}
    public function simpankasbon(Request $request)
	{
		$tanggalhariini = Carbon::now()->format('Ymd');
        $check = KasBon::count();
		$no_bukti = 'BON'.$tanggalhariini.$check + 1;;
		KasBon::create([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pengajuan'=>$request->tanggal_pengajuan,
			'proker'=>$request->proker,
			'anggaran'=>$request->anggaran,
			'penanggungjawab'=>$request->penanggungjawab,
			'tanggal_ptj'=>$request->tanggal_ptj,
			'status'=>$request->status


			]);
			return redirect('/kasbon')->with('status', 'Data berhasil ditambahkan');
	}
	public function editkasbon($no_bukti)
	{
		$periode = Periode::where('status', 'LIKE', 'AKTIF')->get();
		$pegawai = Pegawai::where('status', 'LIKE', 'AKTIF')->get();
		$programkerja = ProgramKerja::orderBy('created_at','desc')->get();
		$kasbon = KasBon::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kasbon/editkasbon',  ['kasbon'=>$kasbon,'periode'=>$periode,'pegawai'=>$pegawai,'programkerja'=>$programkerja]);
	}
	public function updatekasbon(Request $request)
	{
        $tanggalhariini = Carbon::now()->format('Ymd');
        $check = KasBon::count();
		$no_bukti = 'BON'.$tanggalhariini.$check + 1;;
        $kasbon = KasBon::where('no_bukti', $request->no_bukti)->update([
			'no_bukti'=>$no_bukti,
			'periode'=>$request->periode,
			'tanggal_pengajuan'=>$request->tanggal_pengajuan,
			'proker'=>$request->proker,
			'anggaran'=>$request->anggaran,
			'penanggungjawab'=>$request->penanggungjawab,
			'tanggal_ptj'=>$request->tanggal_ptj,
			'status'=>$request->status

		]);
		return redirect('/kasbon')->with('status', 'Data berhasil diubah');
	}
	public function lihatkasbon($no_bukti)
	{
		$kasbon = KasBon::where('no_bukti', $no_bukti)->get();
		return view('realisasi/kasbon/lihatkasbon', compact('kasbon'));
	}
	public function cetakkasbon()
	{
		return view('realisasi/kasbon/cetakkasbon');
	}
	public function hapuskasbon($no_bukti)
	{
        $kasbon = KasBon::where('no_bukti', $no_bukti)->delete();
		return redirect('/kasbon') -> with ('status', 'Data berhasil dihapus');
	}
}