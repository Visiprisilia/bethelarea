<?php

namespace App\Http\Controllers\pegawai;

use Illuminate\Http\Request;
use App\Models\Pegawai\Pegawai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
	public function pegawai()
	{
		$pegawai = Pegawai::orderBy('created_at', 'asc')->get();
		return view('pegawai/pegawai', compact('pegawai'));
	}
	public function cetakpegawai()
	{
		$pegawai = Pegawai::orderBy('created_at', 'asc')->get();
		return view('pegawai/cetakpegawai', compact('pegawai'));
	}
	public function tambahpegawai()
	{
		return view('pegawai/tambahpegawais');
	}
	public function simpanpegawai(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'niy' => 'required|numeric|min:11|unique:pegawai',
			'nama' => 'required',
			'tempat_lahir' => 'required',
			'ttl' => 'required',
			'jk' => 'required',
			'agama' => 'required',
			'pendidikan' => 'required',
			'file_ijasah' => 'required',
			'alamat' => 'required',
			'penempatan' => 'required',
			'file_skpenempatan' => 'required',
			'jabatan' => 'required',
			'file_skjabatan' => 'required',
			// 'file_skgolongan' => 'required',
			'tanggal_masuk' => 'required',
			'status_kepegawaian' => 'required',
			// 'tanggal_ppt' => 'required',
			// 'file_suket' => 'required',
			'status' => 'required',
			'foto_pegawai' => 'required',
			'file_ktp' => 'required'
		], [
			"niy.required" => "Nomor Induk Pegawai tidak boleh kosong",
			"niy.numeric" => "Nomor Induk Pegawai harus berupa angka",
			// "niy.max"=>"Nomor Induk Pegawai tidak boleh lebih dari 11 karakter",
			"niy.min" => "Nomor Induk Pegawai tidak boleh kurang dari 11 karakter",
			"niy.unique" => "Data Tersebut Sudah Terdaftar",
			"nama.required" => "Nama tidak boleh kosong",
			"tempat_lahir.required" => "Tempat Lahir tidak boleh kosong",
			"ttl.required" => "Tempat Tanggal Lahir tidak boleh kosong",
			"jk.required" => "Data Jenis kelamin tidak boleh kosong",
			"agama.required" => "Agama tidak boleh kosong",
			"pendidikan.required" => "Pendidikan Terakhir tidak boleh kosong",
			"file_ijasah.required" => "Anda belum mengupload Ijasah Terakhir",
			"alamat.required" => "Alamat tidak boleh kosong",
			"penempatan.required" => "Penempatan tidak boleh kosong",
			"file_skpenempatan.required" => "Anda belum mengupload File SK Penempatan",
			"jabatan.required" => "Jabatan tidak boleh kosong",
			"file_skjabatan.required" => "Anda belum mengupload File SK Jabatan",
			// "file_skgolongan.required" => "Anda belum mengupload File SK Golongan/Pangkat",
			"tanggal_masuk.required" => "Tanggal masuk tidak boleh kosong",
			"status_kepegawaian.required" => "Status kepegawaian tidak boleh kosong",
			// "tanggal_ppt.required" => "Tanggal Penempatan Pegawai Tetap tidak boleh kosong",
			// "file_suket.required" => "Anda belum mengupload File Surat Keterangan Pegawai",
			"status.required" => "Status tidak boleh kosong",
			"foto_pegawai.required" => "Anda belum mengupload foto pegawai",
			"file_ktp.required" => "Anda belum mengupload file KTP"

		]);

		if ($validator->fails()) {
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahpegawai')->withErrors($validator);
		}
		$foto_pegawai = $request->foto_pegawai;
		$niy = $request->niy;
		$file_suket = $request->file_suket;
		$file_suketstaf = $request->file_suketstaf;
		$file_ktp = $request->file_ktp;
		$file_ijasah = $request->file_ijasah;
		$file_skpenempatan = $request->file_skpenempatan;
		$file_skjabatan = $request->file_skjabatan;
		$file_skgolongan = $request->file_skgolongan;
		$file_skpemberhentian = $request->file_skpemberhentian;



		if ($request->hasFile('foto_pegawai')) {
			$destinationPath = 'assets/images/pegawai/fotopegawai/';
			$fotos = 'fotopegawai_' . $niy . '.' . $foto_pegawai->getClientOriginalExtension();
			$foto_pegawai->move($destinationPath, $fotos);
		} else {
			$fotos = null;
		}

		if ($request->hasFile('file_suket')) {
			$destinationPath = 'assets/images/pegawai/skpegawai/';
			$suket = 'filesuket_' . $niy . '.' . $file_suket->getClientOriginalExtension();
			$file_suket->move($destinationPath, $suket);
		} else {
			$suket = null;
		}
		if ($request->hasFile('file_suketstaf')) {
			$destinationPath = 'assets/images/pegawai/skstaf/';
			$suketstaf = 'filesuketstaf_' . $niy . '.' . $file_suketstaf->getClientOriginalExtension();
			$file_suketstaf->move($destinationPath, $suketstaf);
		} else {
			$suketstaf = null;
		}

		if ($request->hasFile('file_ktp')) {
			$destinationPath = 'assets/images/pegawai/ktppegawai/';
			$ktp = 'ktp_' . $niy . '.' . $file_ktp->getClientOriginalExtension();
			$file_ktp->move($destinationPath, $ktp);
		} else {
			$ktp = null;
		}

		if ($request->hasFile('file_ijasah')) {
			$destinationPath = 'assets/images/pegawai/ijasahpegawai/';
			$ijasah = 'ijasah_' . $niy . '.' . $file_ijasah->getClientOriginalExtension();
			$file_ijasah->move($destinationPath, $ijasah);
		} else {
			$ijasah = null;
		}

		if ($request->hasFile('file_skpenempatan')) {
			$destinationPath = 'assets/images/pegawai/skpenempatanpegawai/';
			$skpenempatan = 'skpenempatan_' . $niy . '.' . $file_skpenempatan->getClientOriginalExtension();
			$file_skpenempatan->move($destinationPath, $skpenempatan);
		} else {
			$skpenempatan = null;
		}

		if ($request->hasFile('file_skjabatan')) {
			$destinationPath = 'assets/images/pegawai/skjabatanpegawai/';
			$skjabatan = 'skjabatan_' . $niy . '.' . $file_skjabatan->getClientOriginalExtension();
			$file_skjabatan->move($destinationPath, $skjabatan);
		} else {
			$skjabatan = null;
		}

		if ($request->hasFile('file_skgolongan')) {
			$destinationPath = 'assets/images/pegawai/skgolonganpegawai/';
			$skgolongan = 'skgolongan_' . $niy . '.' . $file_skgolongan->getClientOriginalExtension();
			$file_skgolongan->move($destinationPath, $skgolongan);
		} else {
			$skgolongan = null;
		}

		if ($request->hasFile('file_skpemberhentian')) {
			$destinationPath = 'assets/images/pegawai/skpemberhentianpegawai/';
			$skpemberhentian = 'skpemberhentian_' . $niy . '.' . $file_skpemberhentian->getClientOriginalExtension();
			$file_skpemberhentian->move($destinationPath, $skpemberhentian);
		} else {
			$skpemberhentian = null;
		}
		Pegawai::create([
			'niy' => $request->niy,
			'nama' => $request->nama,
			'tempat_lahir' => $request->tempat_lahir,
			'ttl' => $request->ttl,
			'jk' => $request->jk,
			'agama' => $request->agama,
			'pendidikan' => $request->pendidikan,
			'file_ijasah' => $ijasah,
			'alamat' => $request->alamat,
			'penempatan' => $request->penempatan,
			'file_skpenempatan' => $skpenempatan,
			'jabatan' => $request->jabatan,
			'file_skjabatan' => $skjabatan,
			'file_skgolongan' => $skgolongan,
			'tanggal_masuk' => $request->tanggal_masuk,
			'status_kepegawaian' => $request->status_kepegawaian,
			'tanggal_ppt' => $request->tanggal_ppt,
			'tanggal_pst' => $request->tanggal_pst,
			'file_suket' => $suket,
			'file_suketstaf' => $suketstaf,
			'status' => $request->status,
			'tanggal_terminasi' => $request->tanggal_terminasi,
			'file_skpemberhentian' => $skpemberhentian,
			'foto_pegawai' => $fotos,
			'file_ktp' => $ktp,
			'keterangan_pegawai' => $request->keterangan_pegawai
		]);
		return redirect('/pegawai')->with('status', 'Data berhasil ditambahkan');
	}
	public function lihatpegawai($niy)
	{
		$pegawai = Pegawai::where('niy', $niy)->get();
		return view('pegawai/lihatpegawai', compact('pegawai'));
	}
	public function editpegawai($niy)
	{
		$pegawai = Pegawai::where('niy', $niy)->get();
		return view('pegawai/editpegawai', compact('pegawai'));
	}
	public function updatepegawai(Request $request)
	{
		$foto_pegawai = $request->foto_pegawai;
		$niy = $request->niy;
		$file_suket = $request->file_suket;
		$file_suketstaf = $request->file_suketstaf;
		$file_ktp = $request->file_ktp;
		$file_ijasah = $request->file_ijasah;
		$file_skpenempatan = $request->file_skpenempatan;
		$file_skjabatan = $request->file_skjabatan;
		$file_skgolongan = $request->file_skgolongan;
		$file_skpemberhentian = $request->file_skpemberhentian;

		if ($request->hasFile('foto_pegawai')) {
			$destinationPath = 'assets/images/pegawai/fotopegawai/';
			$fotos = 'fotopegawai_' . $niy . '.' . $foto_pegawai->getClientOriginalExtension();
			$foto_pegawai->move($destinationPath, $fotos);
		} else {
			$fotos = null;
		}

		if ($request->hasFile('file_suket')) {
			$destinationPath = 'assets/images/pegawai/skpegawai/';
			$suket = 'filesuket_' . $niy . '.' . $file_suket->getClientOriginalExtension();
			$file_suket->move($destinationPath, $suket);
		} else {
			$suket = null;
		}
		if ($request->hasFile('file_suketstaf')) {
			$destinationPath = 'assets/images/pegawai/skstaf/';
			$suketstaf = 'filesuketstaf_' . $niy . '.' . $file_suketstaf->getClientOriginalExtension();
			$file_suketstaf->move($destinationPath, $suketstaf);
		} else {
			$suketstaf = null;
		}
		if ($request->hasFile('file_ktp')) {
			$destinationPath = 'assets/images/pegawai/ktppegawai/';
			$ktp = 'ktp_' . $niy . '.' . $file_ktp->getClientOriginalExtension();
			$file_ktp->move($destinationPath, $ktp);
		} else {
			$ktp = null;
		}

		if ($request->hasFile('file_ijasah')) {
			$destinationPath = 'assets/images/pegawai/ijasahpegawai/';
			$ijasah = 'ijasah_' . $niy . '.' . $file_ijasah->getClientOriginalExtension();
			$file_ijasah->move($destinationPath, $ijasah);
		} else {
			$ijasah = null;
		}

		if ($request->hasFile('file_skpenempatan')) {
			$destinationPath = 'assets/images/pegawai/skpenempatanpegawai/';
			$skpenempatan = 'skpenempatan_' . $niy . '.' . $file_skpenempatan->getClientOriginalExtension();
			$file_skpenempatan->move($destinationPath, $skpenempatan);
		} else {
			$skpenempatan = null;
		}

		if ($request->hasFile('file_skjabatan')) {
			$destinationPath = 'assets/images/pegawai/skjabatanpegawai/';
			$skjabatan = 'skjabatan_' . $niy . '.' . $file_skjabatan->getClientOriginalExtension();
			$file_skjabatan->move($destinationPath, $skjabatan);
		} else {
			$skjabatan = null;
		}

		if ($request->hasFile('file_skgolongan')) {
			$destinationPath = 'assets/images/pegawai/skgolonganpegawai/';
			$skgolongan = 'skgolongan_' . $niy . '.' . $file_skgolongan->getClientOriginalExtension();
			$file_skgolongan->move($destinationPath, $skgolongan);
		} else {
			$skgolongan = null;
		}

		if ($request->hasFile('file_skpemberhentian')) {
			$destinationPath = 'assets/images/pegawai/skpemberhentianpegawai/';
			$skpemberhentian = 'skpemberhentian_' . $niy . '.' . $file_skpemberhentian->getClientOriginalExtension();
			$file_skpemberhentian->move($destinationPath, $skpemberhentian);
		} else {
			$skpemberhentian = null;
		}
		$pegawai = Pegawai::where('niy', $request->niy)->update([
			'niy' => $request->niy,
			'nama' => $request->nama,
			'tempat_lahir' => $request->tempat_lahir,
			'ttl' => $request->ttl,
			'jk' => $request->jk,
			'agama' => $request->agama,
			'pendidikan' => $request->pendidikan,
			'file_ijasah' => $ijasah,
			'alamat' => $request->alamat,
			'penempatan' => $request->penempatan,
			'file_skpenempatan' => $skpenempatan,
			'jabatan' => $request->jabatan,
			'file_skjabatan' => $skjabatan,
			'file_skgolongan' => $skgolongan,
			'tanggal_masuk' => $request->tanggal_masuk,
			'status_kepegawaian' => $request->status_kepegawaian,
			'tanggal_ppt' => $request->tanggal_ppt,
			'tanggal_pst' => $request->tanggal_pst,
			'file_suket' => $suket,
			'file_suketstaf' => $suketstaf,
			'status' => $request->status,
			'tanggal_terminasi' => $request->tanggal_terminasi,
			'file_skpemberhentian' => $skpemberhentian,
			'foto_pegawai' => $fotos,
			'file_ktp' => $ktp,
			'keterangan_pegawai' => $request->keterangan_pegawai
		]);
		return redirect('/pegawai')->with('status', 'Data berhasil diubah');
	}
	public function hapuspegawai($niy)
	{
		$pegawai = Pegawai::where('niy', $niy)->delete();
		return redirect('/pegawai')->with('status', 'Data berhasil dihapus');
	}
}
