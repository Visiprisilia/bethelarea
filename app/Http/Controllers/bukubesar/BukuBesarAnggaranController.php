<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesarAnggaran;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranController extends Controller
{
    public function bukubesaranggaran()
    {
        $bukubesaranggaran = BukuBesarAnggaran::orderBy('created_at','desc')->get();
        return view('bukubesar/bukubesaranggaran', compact('bukubesaranggaran'));
    }
}