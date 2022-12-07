<?php

namespace App\Http\Controllers\programkerja;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramKerja\Evaluasi;
use App\Models\ProgramKerja\ProgramKerja;
use App\Models\Akuns;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Eval_;

class EvaluasiController extends Controller
{
    public function evaluasi()
    {
		$evaluasi = Evaluasi::orderBy('created_at','desc')->get();
        return view('programkerja/evaluasi/evaluasi', compact('evaluasi'));
		}
    public function tambahevaluasi()
	{
		$evaluasi = Evaluasi::join("pegawai","evaluasi.penanggungjawab","=","pegawai.niy")->get();
		$programkerja = ProgramKerja::orderBy('created_at','desc')->get();
		return view('programkerja/evaluasi/tambahevaluasi', ['evaluasi'=>$evaluasi,'programkerja'=>$programkerja]);
	}
    public function simpanevaluasi(Request $request)
	{
		$kode_proker = $request->kode_proker;
        $check = Evaluasi::count();
		$kode_evaluasi = "Evaluasi".$kode_proker.$check+1;
		Evaluasi::create([
			'kode_evaluasi'=>$kode_evaluasi,
			'kode_proker'=>$request->kode_proker,
			'periode'=>$request->periode,
			'nama_proker'=>$request->nama_proker,
			'penanggungjawab'=>$request->penanggungjawab,
			'tujuan'=>$request->tujuan,
            'akun_beban'=>$request->akun_beban,		
            'rencana_anggaran'=>$request->rencana_anggaran,		
            'realisasi_anggaran'=>$request->realisasi_anggaran,		
            'rencana_waktu'=>$request->rencana_waktu,		
            'realisasi_waktu'=>$request->realisasi_waktu,		
            'indikator_pencapaian'=>$request->indikator_pencapaian,		
            'kinerja_pencapaian'=>$request->kinerja_pencapaian,		
            'faktor_pendorong'=>$request->faktor_pendorong,		
            'faktor_penghambat'=>$request->faktor_penghambat,		
            'tindaklanjut'=>$request->tindaklanjut		

			]);
			return redirect('/evaluasi')->with('status', 'Data berhasil ditambahkan');
	}
	public function editevaluasi($kode_proker)
	{
		$evaluasi = Evaluasi::where('kode_proker', $kode_proker)->get();
		return view('programkerja/evaluasi/editevaluasi', compact('evaluasi'));
	}
	public function updateevaluasi(Request $request)
	{
		$kode_proker = $request->kode_proker;
        $check = Evaluasi::count();
		$kode_evaluasi = "Evaluasi".$kode_proker.$check+1;
		$evaluasi = Evaluasi::where('kode_proker', $request->kode_proker)->update([
			'kode_evaluasi'=>$kode_evaluasi,
			'kode_proker'=>$request->kode_proker,
			'periode'=>$request->periode,
			'nama_proker'=>$request->nama_proker,
			'penanggungjawab'=>$request->penanggungjawab,
			'tujuan'=>$request->tujuan,
            'akun_beban'=>$request->akun_beban,		
            'rencana_anggaran'=>$request->rencana_anggaran,		
            'realisasi_anggaran'=>$request->realisasi_anggaran,		
            'rencana_waktu'=>$request->rencana_waktu,		
            'realisasi_waktu'=>$request->realisasi_waktu,		
            'indikator_pencapaian'=>$request->indikator_pencapaian,		
            'kinerja_pencapaian'=>$request->kinerja_pencapaian,		
            'faktor_pendorong'=>$request->faktor_pendorong,		
            'faktor_penghambat'=>$request->faktor_penghambat,		
            'tindaklanjut'=>$request->tindaklanjut	
		]);
		return redirect('/evaluasi')->with('status', 'Data berhasil diubah');
	}
	public function pilihprogramkerja(Request $request)
	{
		$kode =$request->kode;
		$data =ProgramKerja::where("kode_proker",$kode)->first();
		$data2 = Akuns::join("coa","akuns.kode_akun","=","coa.kode_akun")->where("kode_proker",$kode)->get();
		return response()->json([
			"programkerja"=>$data,
			"akun"=>$data2,

		]);
	}
	public function hapusevaluasi($kode_proker)
	{
		$evaluasi = Evaluasi::where('kode_proker', $kode_proker)->delete();
		return redirect('/evaluasi') -> with ('status', 'Data berhasil dihapus');
	}
}