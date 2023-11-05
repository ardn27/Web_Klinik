<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Resep;
use App\Models\Obat;
use App\Models\UserKlinik;
use App\Models\Tindakan;
use Illuminate\Support\Facades\Auth;

class TindakanController extends Controller
{
    public function LoginUmum()
    {
        return view('/dokter/login');
    }

        //fungsi index dokter umum
    public function TindakanIndex(Request $request)
    {
        $Data=UserKlinik::all();
        $Data=Obat::all();
        $Data=Resep::all();
        $Data=Tindakan::all();
        return view('dokter/index-tindakan',['tindakan'=>$Data]);
    }

    //fungsi view add dokter umum
    public function TindakanAdd(Request $request)
    {
        $dataPasien=UserKlinik::whereHas('dokter', function($query)
        {
            $query->where('spesialis', 'umum');
        })->get();
        $dataDokter=Dokter::all();
        $dataResep=Resep::all();
        $dataTindakan=Tindakan::all();

        return view('/dokter/add-tindakan',
        [
            'pasiens'=>$dataPasien,
            'dokters'=>$dataDokter,
            'reseps'=>$dataResep,
            'tindakans'=>$dataTindakan,
        ]);
    }

    public function TindakanEdit($id)
    {
        $pasienEdit = Userklinik::whereHas('dokter', function($query)
        {
            $query->where('spesialis', 'umum');
        })->get();
        $resepEdit = Resep::all();
        $tindakanEdit = Tindakan::find($id);

        return view('/dokter/edit-tindakan',
        [
            'pasien'=> $pasienEdit,
            'resep'=> $resepEdit,
            'tindakan'=>$tindakanEdit
        ]);
    }

    //fungsi add dokter umum
    public function addTindakan(Request $request)
    {
        $newData = new Tindakan();
        $newData->id_pasien =$request->id_pasien;
        $newData->diagnosa = $request->diagnosa;
        $newData->tindakan = $request->tindakan;
        $newData->status = $request->status;
        $newData->resep1()->associate($request->id_resep_1);
        $newData->resep2()->associate($request->id_resep_2);
        $newData->resep3()->associate($request->id_resep_3);
        $newData->save();
        return redirect('/tindakan-index')->with('sukses', 'Tindakan pasien umum berhasil ditambahkan');
    }

    public function editTindakan(Request $request)
    {
        $editData = Tindakan::findOrfail($request->id);
        $editData->id_pasien =$request->id_pasien;
        $editData->diagnosa = $request->diagnosa;
        $editData->tindakan = $request->tindakan;
        $editData->status = $request->status;

        $editData->resep1()->associate($request->id_resep_1);
        $editData->resep2()->associate($request->id_resep_2);
        $editData->resep3()->associate($request->id_resep_3);
        $editData->save();

        return redirect('/tindakan-index');
    }

    public function deleteTindakan($id)
    {
        $tindakanDel = Tindakan::find($id);
        $tindakanDel->delete();

        return redirect('/tindakan-index');
    }

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];


        if(Auth::attempt($credentials)) {
            return redirect('tindakan-index');
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
        return redirect('/login-umum');
    }
}
