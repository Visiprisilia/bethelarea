<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranBiayaController extends Controller
{
    public function bukubesaranggaranpendapatan()
    {
        $bukubesaranggaranbiaya = ProgramKerja::orderBy('created_at','desc')->get();
        return view('bukubesar/bukubesar', compact('bukubesaranggaranpendapatan'));
    }
}