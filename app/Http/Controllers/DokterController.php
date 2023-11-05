<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function LoginDokter()
    {
        return view ('adminDokter/dokter-login');
    }

    public function AddDokter(Request $request)
    {
        return view('adminDokter/dokter-add');
    }

    public function IndexDokter()
    {
        $allData= Dokter::all();
        return view('adminDokter/dokter-index',['data'=>$allData]);
    }

    public function EditDokter($id)
    {
        $editData= Dokter::find($id);
        return view('adminDokter/dokter-edit',['data'=> $editData]);
    }
    //add
    public function DokterAdd(Request $request)
    {
        $newData = new Dokter();
        $newData->nama_dokter = $request->nama_dokter;
        $newData->spesialis = $request->spesialis;
        $newData->alamat = $request->alamat;
        $newData->no_telp = $request->no_telp;
        $newData->jadwal_dokter = date('Y-m-d', strtotime ($request->jadwal_dokter));
        $newData->save();

        return redirect('index-dokter');
    }

    public function DokterEdit(Request $request)
    {
        $dataEdit = Dokter::findOrFail($request->id);
        $dataEdit->nama_dokter = $request->nama_dokter;
        $dataEdit->spesialis = $request->spesialis;
        $dataEdit->alamat = $request->alamat;
        $dataEdit->no_telp = $request->no_telp;
        $dataEdit->jadwal_dokter = date('Y-m-d', strtotime ($request->jadwal_dokter));
        $dataEdit->save();

        return redirect('index-dokter');
    }

    public function DokterDelete($id)
    {
        $dataDelete = Dokter::find($id);
        $dataDelete->delete();
        return redirect ('index-dokter');
    }

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];


        if(Auth::attempt($credentials)) {
            return redirect('index-dokter');
        } else {
            return redirect()->back()->with(['pesan' => 'Username/Password Salah']);
        }

    }

    public function logout()
    {
        // Menghapus session yang terkait dengan user atau sesi login
        auth()->logout();

        // Menghapus semua data sesi dan menghancurkan sesi
        session()->flush();
        session()->regenerate();

        // Redirect ke halaman login atau halaman lain yang Anda tentukan
        return redirect('/login-dokter');
    }

}
