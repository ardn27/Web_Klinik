<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Resep;
use App\Models\Obat;
use App\Models\UserKlinik;
use App\Models\SpesialisKandungan;
use Illuminate\Support\Facades\Auth;

class SpesialisKandunganController extends Controller
{
    public function LoginSpKandungan()
    {
        return view('/dokterKandungan/login');
    }

    public function TindakanIndex(Request $request)
    {
        $Data=UserKlinik::all();
        $Data=Obat::all();
        $Data=Resep::all();
        $Data=SpesialisKandungan::all();
        return view('dokterKandungan/index-tindakan-kandungan',['tindakan'=>$Data]);
    }

    //fungsi view add dokter umum
    public function TindakanAdd(Request $request)
    {
        $dataPasien=UserKlinik::whereHas('dokter', function($query)
        {
            $query->where('spesialis', 'kandungan');
        })->get();
        $dataDokter=Dokter::all();
        $dataResep=Resep::all();
        $dataTindakan=SpesialisKandungan::all();

        return view('dokterKandungan/add-tindakan-kandungan',
        [
            'pasiens'=>$dataPasien,
            'dokters'=>$dataDokter,
            'reseps'=>$dataResep,
            'tindakans'=>$dataTindakan,
        ]);
    }

    public function TindakanEditKandungan($id)
    {
        $pasienEdit = Userklinik::whereHas('dokter', function($query)
        {
            $query->where('spesialis', 'kandungan');
        })->get();
        $resepEdit = Resep::all();
        $tindakanEdit = SpesialisKandungan::find($id);

        return view('/dokterKandungan/edit-tindakan-kandungan',
        [
            'pasien'=> $pasienEdit,
            'resep'=> $resepEdit,
            'tindakan'=>$tindakanEdit
        ]);
    }

    //fungsi edit dokter kandungan
    public function editTindakan(Request $request)
    {
        $editData = SpesialisKandungan::findOrfail($request->id);
        $editData->id_pasien =$request->id_pasien;
        $editData->diagnosa = $request->diagnosa;
        $editData->tindakan = $request->tindakan;
        $editData->status = $request->status;

        $editData->resep1()->associate($request->id_resep_1);
        $editData->resep2()->associate($request->id_resep_2);
        $editData->resep3()->associate($request->id_resep_3);
        $editData->save();

        return redirect('/tindakan-kandungan-index');
    }


    //fungsi add dokter kandungan
    public function addTindakan(Request $request)
    {
        $newData = new SpesialisKandungan();
        $newData->id_pasien =$request->id_pasien;
        $newData->diagnosa = $request->diagnosa;
        $newData->tindakan = $request->tindakan;
        $newData->status = $request->status;

        $newData->resep1()->associate($request->id_resep_1);
        $newData->resep2()->associate($request->id_resep_2);
        $newData->resep3()->associate($request->id_resep_3);
        $newData->save();
        return redirect('/tindakan-kandungan-index')->with('sukses', 'Tindakan pasien spesialis kandungan berhasil ditambahkan');
    }

    //fungsi delete
    public function deleteTindakan($id)
    {
        $tindakanDel = SpesialisKandungan::find($id);
        $tindakanDel->delete();

        return redirect('/tindakan-kandungan-index');
    }

    //fungsi add
    public function loginKandungan(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];


        if(Auth::attempt($credentials)) {
            return redirect('tindakan-kandungan-index');
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
        return redirect('/login-sp-kandungan');
    }
}
