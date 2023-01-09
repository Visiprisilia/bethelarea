<?php

namespace App\Http\Controllers\pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function postlogin(Request $request)
	{
	if (Auth::attempt($request->only('nama_user','password'))){
		return redirect('/dashboard');
	}
	return redirect('bethelarea');
	}

	public function logout (Request $request)
	{
	Auth::logout();
	return redirect('bethelarea');
	
	}
	public function registrasi()
	{
	return view('pengguna/registrasi');
	
	}

	public function simpanregistrasi(Request $request)
	{
		// dd($request->all());	
		User::create([
			'nama_user'=>$request->nama_user,
			'password'=>bcrypt($request->password),
			'level'=>$request->level,
			'nama_lengkap'=>$request->nama_lengkap,			
			

			]);
			return redirect('/dashboard');
	}

	}