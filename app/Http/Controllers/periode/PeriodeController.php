<?php

namespace App\Http\Controllers\periode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriodeController extends Controller
{
    public function periode()
    {
        return view('periode/periode', [
            "title" => "Periode"
        ]);
    }
}
