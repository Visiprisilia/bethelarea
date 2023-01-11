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
        // cek form validation
        $this->validate($request, [
            'nama_user' => 'required',
            'password' => 'required'
        ]);

        // cek apakah email dan password benar
        if (auth()->attempt(request(['nama_user', 'password']))) {
            return redirect('/dashboard');
        }

        // jika salah, kembali ke halaman login
        return redirect()->back()->with('error', 'Username atau Password Anda salah!');
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