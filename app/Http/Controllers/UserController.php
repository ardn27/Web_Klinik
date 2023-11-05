<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserKlinik;


class UserController extends Controller
{
    public function index()
    {
        return view('users/form-regis');
    }

    public function register(Request $request)
    {
        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'password'=>$request->password,
        ];

        User::create($data);

        return redirect('/login');
    }

    public function indexLogin()
    {
        return view('users/login');
    }

    public function auth(Request $request)
    {

                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    return redirect('/registrasi');
                } else {
                    return redirect()->back()->with(['pesan' => 'Username/Password Salah']);
                }
    }

    public function userProfile($id)
    {
        $user = User::find($id);
        $pasien = UserKlinik::where('user_id', $id)->first();

        return view('users/profil', compact('user', 'pasien'));
    }

        public function logout()
    {
        // Menghapus session yang terkait dengan user atau sesi login
        auth()->logout();

        // Menghapus semua data sesi dan menghancurkan sesi
        session()->flush();
        session()->regenerate();

        // Redirect ke halaman login atau halaman lain yang Anda tentukan
        return redirect('/login');
    }

}
