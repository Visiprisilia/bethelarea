<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesarKas;
use App\Http\Controllers\Controller;

class BukuBesarKasController extends Controller
{
    public function bukubesarkas()
    {
        $bukubesarkas = BukuBesarKas::orderBy('created_at','desc')->get();
        return view('bukubesar/bukubesarkas', compact('bukubesarkas'));
    }
}