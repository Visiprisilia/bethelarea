<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesarAnggaranPendapatan;
use App\Http\Controllers\Controller;

class BukuBesarAnggaranPendapatanController extends Controller
{
    public function bukubesaranggaranpendapatan()
    {
        $bukubesaranggaranpendapatan = BukuBesarAnggaranPendapatan::orderBy('created_at','desc')->get();
        return view('bukubesar/bukubesar', compact('bukubesaranggaranpendapatan'));
    }
}