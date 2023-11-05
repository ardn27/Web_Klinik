<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
class ObatController extends Controller
{
    public function obatIndex()
    {
        $showObat=Obat::all();
        return view('adminObat/obat-index', ['obats'=>$showObat]);
    }

    public function editObat($id)
    {
        $EditData=Obat::find($id);
        return view('adminObat/edit-obat', ['obats'=>$EditData]);
    }

    public function tambahObat()
    {
        return view('adminObat/add-obat');
    }

    public function tambah(Request $request)
    {
        $newObat = new Obat();
        $newObat->nama_obat = $request->nama_obat;
        $newObat->keterangan = $request->keterangan;
        $newObat->save();

        return redirect('/indexObat');
    }

    public function edit(Request $request)
    {
        $dataEdit = Obat::findOrFail($request->id);
        $dataEdit->nama_obat = $request->nama_obat;
        $dataEdit->keterangan = $request->keterangan;
        $dataEdit->save();

        return redirect('/indexObat');
    }
    public function deleteObat($id)
    {
        $dataDelete = Obat::find($id);
        $dataDelete->delete();

        return redirect('/indexObat');
    }
}
