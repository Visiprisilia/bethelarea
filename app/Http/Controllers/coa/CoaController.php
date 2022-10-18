<?php

namespace App\Http\Controllers\coa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoaController extends Controller
{
    public function coa()
    {
        return view('coa/coa', [
            "title" => "Coa"
        ]);
    }
    public function tambah()
	{
		return view('coa/tambahcoa');
	}
}
