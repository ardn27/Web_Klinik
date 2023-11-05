<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Resep;
use App\Models\Obat;
use App\Models\UserKlinik;
use App\Models\SpesialisAnak;
use Illuminate\Support\Facades\Auth;

class SpesialisAnakController extends Controller
{
    //fungsi login sp anak
    public function LoginSpAnak()
    {
        return view ('dokterAnak/login');
    }

    public function TindakanIndexAnak(Request $request)
    {
        $Data=UserKlinik::all();
        $Data=Obat::all();
        $Data=Resep::all();
        $Data=SpesialisAnak::all();
        return view('dokterAnak/index-tindakan-anak',['tindakan'=>$Data]);
    }

    //fungsi view add dokter umum
    public function TindakanAddAnak(Request $request)
    {
        $dataPasien=UserKlinik::whereHas('dokter', function($query)
        {
            $query->where('spesialis', 'anak');
        })->get();
        $dataDokter=Dokter::all();
        $dataResep=Resep::all();
        $dataTindakan=SpesialisAnak::all();

        return view('dokterAnak/add-tindakan-anak',
        [
            'pasien'=>$dataPasien,
            'dokter'=>$dataDokter,
            'resep'=>$dataResep,
            'tindakan'=>$dataTindakan,
        ]);
    }

    public function TindakanEditAnak($id)
    {
        $pasienEdit = Userklinik::whereHas('dokter', function($query)
        {
            $query->where('spesialis', 'anak');
        })->get();
        $resepEdit = Resep::all();
        $tindakanEdit = SpesialisAnak::find($id);

        return view('/dokterAnak/edit-tindakan-anak',
        [
            'pasien'=> $pasienEdit,
            'resep'=> $resepEdit,
            'tindakan'=>$tindakanEdit
        ]);
    }

    //fungsi add dokter umum
    public function addTindakanAnak(Request $request)
    {
        $newData = new SpesialisAnak();
        $newData->id_pasien =$request->id_pasien;
        $newData->diagnosa = $request->diagnosa;
        $newData->tindakan = $request->tindakan;
        $newData->status = $request->status;

        $newData->resep_1()->associate($request->id_resep_1);
        $newData->resep_2()->associate($request->id_resep_2);
        $newData->resep_3()->associate($request->id_resep_3);
        $newData->save();
        return redirect('/tindakan-anak-index')->with('sukses', 'Tindakan pasien spesialis anak berhasil ditambahkan');
    }

    public function editTindakanAnak(Request $request)
    {
        $editData = SpesialisAnak::findOrfail($request->id);
        $editData->id_pasien =$request->id_pasien;
        $editData->diagnosa = $request->diagnosa;
        $editData->tindakan = $request->tindakan;
        $editData->status = $request->status;

        $editData->resep_1()->associate($request->id_resep_1);
        $editData->resep_2()->associate($request->id_resep_2);
        $editData->resep_3()->associate($request->id_resep_3);
        $editData->save();

        return redirect('/tindakan-anak-index');
    }

    public function deleteTindakanAnak($id)
    {
        $tindakanDel = SpesialisAnak::find($id);
        $tindakanDel->delete();

        return redirect('/tindakan-anak-index');
    }

    //fungsi login aksi
    public function loginSp(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];


        if(Auth::attempt($credentials)) {
            return redirect('tindakan-anak-index');
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
        return redirect('/login-sp-anak');
    }
}
