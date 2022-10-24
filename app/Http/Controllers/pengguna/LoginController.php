<?php

namespace App\Http\Controllers\pengguna;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
	{
	if (Auth::attempt($request->only('email','password'))){
		return redirect('/bethelarea');
	}
	return redirect('login');
	}

	public function logout (Request $request)
	{
	Auth::logout();
	return redirect('login');
	
	}
}
