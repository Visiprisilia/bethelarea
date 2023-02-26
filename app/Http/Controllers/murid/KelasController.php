<?php

namespace App\Http\Controllers\murid;

use Illuminate\Http\Request;
use App\Models\Murid\Kelas;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function kelas()
    {
        $kelas = Kelas::get();
        return view('kelas/kelas', compact('kelas'));
    }
    public function tambahkelas()
    {
        return view('kelas/tambahkelas');
    }
    public function simpankelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required|numeric|unique:kelas',
            'nama_kelas' => 'required|unique:kelas',
            'keterangan_kelas' => 'required'
        ], [
            "kode_kelas.required" => "Kode Kelas tidak boleh kosong",
            "kode_kelas.numeric" => "Kode Kelas harus berupa angka",
            "kode_kelas.unique" => "Data Tersebut Sudah Terdaftar",
            "nama_kelas.required" => "Nama Kelas tidak boleh kosong",
            "nama_kelas.unique" => "Data Tersebut Sudah Terdaftar",
            "keterangan_kelas.required" => "Keterangan Kelas tidak boleh kosong",

        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->getMessages();
            $api = array(
                'message' => $message
            );
            return redirect('/tambahkelas')->withErrors($validator);
        }

        Kelas::create([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
            'keterangan_kelas' => $request->keterangan_kelas,
        ]);
        return redirect('/kelas')->with('status', 'Data berhasil ditambahkan');
    }
    public function editkelas($kode_kelas)
    {
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->get();
        return view('kelas/editkelas', compact('kelas'));
    }
    public function updatekelas(Request $request)
    {
        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->update([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
            'keterangan_kelas' => $request->keterangan_kelas,
        ]);
        return redirect('/kelas')->with('status', 'Data berhasil diubah');
    }
    public function hapuskelas($kode_kelas)
    {
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->delete();
        return redirect('/kelas')->with('status', 'Data berhasil dihapus');
    }
}
