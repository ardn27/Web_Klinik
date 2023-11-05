<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserKlinik;
use App\Models\Dokter;
use App\Models\registrasi;
use App\Models\User;
use Illuminate\Support\Carbon;
use Dompdf\Dompdf;

class UserKlinikController extends Controller
{
    public function index(){
        $showData= Dokter::all();
        return view('users/home', ['data'=> $showData]);
    }
    public function registrasion(Request $request){
        $addData = Userklinik::all();
        $showData = Dokter::all();
        return view('users/data-pasien',
        [
        'data'=>$addData,
        'spesialis'=>$showData,
        ]);
    }
    public function antri()
    {
        $userData = UserKlinik::orderBy('jadwal_kedatangan', 'asc')->get();
        $dokterData = Dokter::all();

        return view('users/antrian', compact('userData', 'dokterData'));
    }

    public function indexPasien(Request $request){
        $showData = Dokter::all();
        $showData = UserKlinik::all();
        return view('adminPasien/pasien-index', ['data'=>$showData]);
    }

    public function editPasien($id)
    {
        $editData = UserKlinik::find($id);{
            return view('adminPasien/pasien-edit',[
                'data'=>$editData,
                'dataDokter'=>Dokter::all()
            ]);
        }
    }

    public function create(Request $request)
    {
        $newData = new UserKlinik();
        $newData->id_spesialis = $request->id_spesialis;
        $newData->jadwal_kedatangan = $request->jadwal_kedatangan;
        $newData->keluhan = $request->keluhan;
        $newData->nama_lengkap= $request->nama_lengkap;
        $newData->jns_kelamin= $request->jns_kelamin;
        $newData->tgl_lahir=date('Y-m-d', strtotime ($request->tgl_lahir));
        $newData->nik= $request->nik;
        $newData->no_telp = $request->no_telp;
        $newData->alamat = $request->alamat;
        $newData->pembayaran = $request->pembayaran;
        $newData->save();

        return redirect('/registrasi')->with('success', 'Pendaftaran Berhasil, Silahkan datang ke klinik sesuai dengan jadwal kedatangan Anda');
    }

    public function edit(Request $request)
    {
        $editData = UserKlinik::findOrFail($request->id);
        $editData->id_spesialis= $request->id_spesialis;
        $editData->jadwal_kedatangan=date('Y-m-d', strtotime($request->jadwal_kedatangan));
        $editData->keluhan= $request->keluhan;
        $editData->nama_lengkap= $request->nama_lengkap;
        $editData->jns_kelamin= $request->jns_kelamin;
        $editData->tgl_lahir=date('Y-m-d', strtotime ($request->tgl_lahir));
        $editData->nik= $request->nik;
        $editData->email= $request->email;
        $editData->no_telp = $request->no_telp;
        $editData->alamat = $request->alamat;
        $editData->pembayaran = $request->pembayaran;
        $editData->save();
        return redirect('index-pasien');
    }

    public function delete($id)
    {
        $dataDelete = UserKlinik::find($id);
        $dataDelete->delete();
        return redirect ('index-pasien');
    }
}
