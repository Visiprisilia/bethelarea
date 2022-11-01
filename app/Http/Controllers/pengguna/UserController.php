<?php

namespace App\Http\Controllers\pengguna;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        return view('user/user');
    }
   

    public function editprofile($id)
	{
		$user = User::findOrFail(Auth::id());
		return view('pengguna/editprofile', compact('profile'));
	}
    public function updateprofile(Request $request)
    {
        $user = User::where('id', $request->id)->update([           
            'name' => $request->name,           
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/profile')->with('status', 'Data berhasil diubah');
    }
   
}
