<?php

namespace App\Http\Controllers\posisianggaran;

use Illuminate\Http\Request;
use App\Models\PosisiAnggaran\PosisiAnggaran;
use App\Http\Controllers\Controller;

class PosisiAnggaranController extends Controller
{
    public function posisianggaran()
    {
        $posisianggaran = PosisiAnggaran::orderBy('created_at','desc')->get();
        return view('posisianggaran/posisianggaran', compact('posisianggaran'));
    }
}