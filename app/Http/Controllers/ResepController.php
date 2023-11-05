<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Obat;

class ResepController extends Controller
{
    public function resepIndex(Request $request)
    {
        $showData = Obat::all();
        $showData = Resep::all();
        return view('adminObat/resep-index',
        [
        'reseps'=>$showData,
        ]);
    }

    public function tambahResep(Request $request)
    {
        $addData = Obat::all();
        $tambahData = Resep::all();
        return view('adminObat/add-resep',
        ['reseps'=>$addData,
         'obat'=>$tambahData,
        ]);
    }
    public function editResep($id)
    {
        $dataEdit = Resep::find($id);
        return view('adminObat/edit-resep',
         [
            'datas'=>$dataEdit,
         ]);
    }

    public function addResep(Request $request)
    {
        $newData = new Resep();
        $newData->id_obat = $request->id_obat;
        $newData->resep = $request->resep;
        $newData->save();

        return redirect('/index-resep');
    }

    public function edit(Request $request)
    {
        $edit = Resep::findOrFail($request->id);
        $edit->id_obat = $request->id_obat;
        $edit->resep = $request->resep;
        $edit->save();

        return redirect('/index-resep');
    }

    public function deleteResep($id)
    {
        $dataDelete = Obat::find($id);
        $dataDelete->delete();

        return redirect('/index-resep');
    }
}
