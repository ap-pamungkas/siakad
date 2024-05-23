<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepalaSekolah;
use Illuminate\Support\Facades\Hash;

class KepalaSekolahController extends Controller
{
    function index(KepalaSekolah $kepalaSekolah)
    {

        $data['list'] = $kepalaSekolah->all();
        return view('admin.kepala-sekolah.index', $data);
    }

    function create(KepalaSekolah $kepalaSekolah)
    {

        return view('admin.kepala-sekolah.create');
    }


    function store(Request $request, KepalaSekolah $kepalaSekolah)
    {
        $request->validate($kepalaSekolah::$input, $kepalaSekolah::$pesan);
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images/kepala-sekolah'), $imageName);


        $kps = new $kepalaSekolah;
        $kps->nama = $request->nama;
        $kps->nip = $request->nip;
        $kps->foto = 'images/kepala-sekolah/' . $imageName;

        $kps->password = Hash::make($request->password);

        $kps->save();
        return redirect('/kepala-sekolah')->with('create', 'Data Berhasil disimpan');
    }
    function edit(String $id)
    {
        $data['kps'] = KepalaSekolah::findOrFail($id);


        return view('admin.kepala-sekolah.edit', $data);
    }

  function update(KepalaSekolah $kepalaSekolah, Request $request, $kps)
{
    $kps = KepalaSekolah::findOrFail($kps);
  $request->validate($kepalaSekolah::$input, $kepalaSekolah::$pesan);

  if ($request->hasFile('foto')) {
    // Load the KepalaSekolah object if $kps is not an object



    // Now you can safely access $kps->foto
    $fotoLama = $kps->foto;

    if ($fotoLama && file_exists(storage_path($fotoLama))) {
      unlink(storage_path($fotoLama));
    }

    $imageName = time() . '.' . $request->foto->extension();
    $request->foto->move(public_path('images/kepala-sekolah'), $imageName);

    $kps->foto = 'images/kepala-sekolah/' . $imageName;
  }

  // Update KepalaSekolah object regardless of foto change

  $kps->nama = $request->nama;
  $kps->nip = $request->nip;

  if ($request->filled('password')) {
    $kps->password = Hash::make($request->password);
  }

  $kps->save();
  return redirect('/kepala-sekolah')->with('upadate', 'Data Berhasil disimpan');
}


    public function show($id)
    {
        $data['kps'] = KepalaSekolah::findOrFail($id);
        return view('admin.kepala-sekolah.show', $data);
    }

    function destroy(kepalaSekolah $kps,)
    {
        $kps->delete();

        return redirect('/kepala-sekolah')->with('delete', 'Data Berhasil Dihapus');
    }

}
