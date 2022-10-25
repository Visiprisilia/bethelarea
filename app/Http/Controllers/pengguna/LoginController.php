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
	if (Auth::attempt($request->only('email','password'))){
		return redirect('/dashboard');
	}
	return redirect('login');
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
			'name'=>$request->name,
			'level'=>'pegawai',
			'email'=>$request->email,
			'password'=>bcrypt($request->password),
			'remember_token'=> Str::random(60),

			]);
			return redirect('/coa')->with('success', 'Task Created Successfully!');
	}
	}
