<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;


class MapelController extends Controller
{
    function index(){


        return view('admin.mapel.index');
    }

    function create(){
        return view('admin.mapel.create');
    }

    function store(Request $request){
        $mapel = new Mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->nama_mapel = $request->nama_mapel;

        $mapel->save();
        return redirect('admin/mapel')->with('create', 'data berhasil di tambah');
    }

    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $mapel = Mapel::orderBy('updated_at', 'desc');

            return datatables()->of($mapel)
                ->make(true);
        }

        return view('index');
    }


function edit($id){

    $mapel['mapel'] = Mapel::findOrFail($id);
    return view('admin.mapel.edit',$mapel);

}

 public function update(Request $request, $mapel){
    $mapel = Mapel::findOrFail($mapel) ;

    $mapel->kode_mapel = $request->kode_mapel;
    $mapel->nama_mapel = $request->nama_mapel;
    $mapel->save();

    return redirect('admin/mapel')->with('update', 'data berhasil di Edit');
}


function destroy(Mapel $mapel)
{
    $mapel->delete();

    return redirect('admin/mapel')->with('delete', 'Data Berhasil Dihapus');
}

}
