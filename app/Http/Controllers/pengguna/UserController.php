<?php

namespace App\Http\Controllers\pengguna;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        $user = User::orderBy('created_at','desc')->get();
        return view('user/user', compact('user'));
    }
    public function tambahuser()
	{
		return view('user/tambahuser');
	}
    public function simpanuser(Request $request)
	{
		$validator = Validator::make($request->all(), [	
			'nama_lengkap' => 'required',
			'nama_user' => 'required|unique:users',
			'password' => 'required',
			'level' => 'required',
			'status' => 'required'
		],[
			"nama_lengkap.required"=>"Nama Lengkap tidak boleh kosong",
			"nama_user.required"=>"Nama User tidak boleh kosong",
			"nama_user.unique"=>"Nama User Tersebut Sudah Terdaftar",
			"password.required"=>"Password tidak boleh kosong",
			"level.required"=>"Level tidak boleh kosong",
			"status.required"=>"Status tidak boleh kosong",
			
		]);
		if ($validator->fails()) {    
			$message = $validator->errors()->getMessages();
			$api = array(
				'message' => $message
			);
			return redirect('/tambahuser')->withErrors($validator);	
		}
		User::create([
			'nama_lengkap'=>$request->nama_lengkap,
			'nama_user'=>$request->nama_user,
			'password'=>bcrypt($request->password),
			'level'=>$request->level,	
            'last_login'=>$request->last_login,	
			'status'=>$request->status	
			]);
			return redirect('/user')->with('status', 'Data berhasil ditambahkan');
	}
	public function edituser($id)
	{
		$user = User::where('id', $id)->get();
		return view('user/edituser', compact('user'));
	}
	public function updateuser(Request $request)
	{
		$user = User::where('id', $request->id)->update([
			'nama_lengkap'=>$request->nama_lengkap,
			'nama_user'=>$request->nama_user,
			'password'=>bcrypt($request->password),
			'level'=>$request->level,	
            'last_login'=>$request->last_login,	
			'status'=>$request->status	
		]);
		return redirect('/user')->with('status', 'Data berhasil diubah');
	}
	public function hapususer($id)
	{
		$user = User::where('id', $id)->delete();
		return redirect('/user') -> with ('status', 'Data berhasil dihapus');
	}
}