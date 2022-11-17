<?php

namespace App\Http\Controllers\bukubesar;

use Illuminate\Http\Request;
use App\Models\BukuBesar\BukuBesar;
use App\Http\Controllers\Controller;

class BukuBesarController extends Controller
{
    public function bukubesar()
    {
        $bukubesar = BukuBesar::orderBy('created_at','desc')->get();
        return view('bukubesar/bukubesar', compact('bukubesar'));
    }
}