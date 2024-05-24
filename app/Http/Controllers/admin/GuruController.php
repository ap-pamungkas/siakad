<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use App\Models\Mapel;

class GuruController extends Controller
{
    function index()
    {
        $nama_mapel = Mapel::get('nama_mapel');
        return view('admin.guru.index', $nama_mapel);

    }


    function create()
    {
        $data['mapel'] = Mapel::all();
        return view('admin.guru.create', $data);
    }

    function store(Request $request)
    {

        $request->validate(Guru::$inputan, Guru::$pesan);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images/guru'), $imageName);
        $guru = new Guru;

        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->tlp = $request->tlp;
        $guru->mapel_id = $request->mapel_id;
        $guru->password = Hash::make($request->password);
        $guru->foto = 'images/guru/' . $imageName;
        $guru->save();
        return redirect('/guru')->with('create', 'Data Berhasilahkan');
    }

    public function dataTableLogic(Request $request)
{
    if ($request->ajax()) {
        $guru = Guru::with('mapel') // Eager load the related Mapel model
            ->orderBy('updated_at', 'desc');

            return datatables()->of($guru)
            ->addColumn('nama_mapel', function ($guru) {
                return $guru->mapel ? $guru->mapel->nama_mapel : '';
            })
            ->make(true);
    }

    return view('index');
}
    public function show($id)
    {
        $data['guru'] = Guru::findOrFail($id);

        return view('admin.guru.show', $data);
    }


    function edit($id)
    {
        $data['guru'] = Guru::findOrFail($id);
        $data['mapel'] = Mapel::all();
        return view('admin.guru.edit', $data);
    }

    function update(Request $request, $guru)
    {
        $guru = Guru::findOrFail($guru);



        if ($request->hasFile('foto')) {

            $fotoLama = $guru->foto;

            if ($fotoLama && file_exists(storage_path($fotoLama))) {
                unlink(storage_path($fotoLama));
            }

            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/guru'), $imageName);

            $guru->foto = 'images/guru/' . $imageName;
        }

        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->tlp = $request->tlp;
        $guru->mapel_id = $request->mapel_id;

        if ($request->filled('password')) {
            $guru->password = Hash::make($request->password);
        }

        $guru->save();
        return redirect('/guru')->with('upadate', 'Data Berhasil disimpan');
    }


    function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect('/guru')->with('delete', 'Data Berhasil Dihapus');
    }
}
