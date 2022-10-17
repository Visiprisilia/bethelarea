<?php

namespace App\Http\Controllers\unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function unit()
    {
        return view('unit/unit' , [
            "title" => "Unit"
        ]);
    }
}
