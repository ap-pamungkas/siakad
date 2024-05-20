<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\KepalaSekolah;
 use Illuminate\Support\Facades\Hash;
class KepalaSekolahController extends Controller
{
function index(KepalaSekolah $kepalaSekolah){

    $data['list'] = $kepalaSekolah->all();
    return view('admin.kepala-sekolah.index', $data);

}

function create(KepalaSekolah $kepalaSekolah){

    return view('admin.kepala-sekolah.create');


}


function store(Request $request, KepalaSekolah $kepalaSekolah){
    $request ->validate($kepalaSekolah::$input, $kepalaSekolah::$pesan);

    $kps = New $kepalaSekolah;
    $kps->nama = $request->nama;
    $kps->nip = $request->nip;

    $kps->password = Hash::make($request->password);



    $kps->save();
    return redirect('/kepala-sekolah')->with('success', 'Data Berhasilahkan');

}
function edit(String $id){
    $data['kps'] = KepalaSekolah::findOrFail($id);


    return view('admin.kepala-sekolah.edit', $data);
}

function update(KepalaSekolah $kepalaSekolah, Request $request, $kps){

    $request ->validate($kepalaSekolah::$input, $kepalaSekolah::$pesan);

    $kps = $kepalaSekolah->findOrFail($kps);
    $kps->nama = $request->nama;
    $kps->nip = $request->nip;

    if ($request->filled('password')) {
        $kps->password = Hash::make($request->password);
      }

    $kps->save();
    return redirect('/kepala-sekolah')->with('success', 'Data Berhasilahkan');
}


}
