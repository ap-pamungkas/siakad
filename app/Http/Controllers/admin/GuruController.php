<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request)
  {


    $photoPath = null;
    if ($request->hasFile('foto')) {
        $photo = $request->file('foto');
        $fileName = time(). '_'. $photo->getClientOriginalName();  // Unique filename
        $path = Storage::disk('public')->put('images/guru', $photo);  // Save to 'public/images/guru'
        $photoPath = $path;
    }

    // Save teacher data to the database
    $guru = new Guru;
    $guru->nama = $request->nama;
    $guru->nip = $request->nip;
    $guru->jk = $request->jk;
    $guru->alamat = $request->alamat;
    $guru->tlp = $request->tlp;
    $guru->mapel_id = $request->mapel_id;
    $guru->password = Hash::make($request->password);
    $guru->foto = $photoPath;
    // $guru->kelas->id = $request->kelas_id;
    $guru->save();

    return redirect('/admin/guru')->with('create', 'Data Berhasilahkan');
  }
    public function dataTableLogic(Request $request)
{
    if ($request->ajax()) {
        $guru = Guru::with('mapel', 'kelas') // Eager load the related Mapel model
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
    function update(Request $request, Guru $guru)
    {
        $guru = Guru::findOrFail($guru->id);


        $existingPhotoPath = $guru->foto; // Get existing photo path

        // Process uploaded photo
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $fileName = time(). '_'. $photo->getClientOriginalName();
            $path = Storage::disk('public')->put('images/guru', $photo);
            $photoPath = $path;
        } else {
            // If no new file uploaded, retain existing photo path
            $photoPath = $existingPhotoPath;
        }
        
        // Delete old photo if not present in new set
        if ($existingPhotoPath!== $photoPath) {
            Storage::disk('public')->delete($existingPhotoPath);
        }

        // Update teacher data
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->tlp = $request->tlp;
        $guru->foto = $photoPath;
        $guru->mapel_id = $request->mapel_id;


        if ($request->filled('password')) {
            $guru->password = Hash::make($request->password);
        }

        $guru->save();

        return redirect('/admin/guru')->with('update', 'Data Berhasil disimpan');
    }




    function destroy(Guru $guru)

    {
        $foto_paths = json_decode($guru->foto, true);

        // Delete the files
        foreach ($foto_paths as $foto_path) {
            Storage::disk('public')->delete($foto_path);
        }
        $guru->delete();

        return redirect('/admin/guru')->with('delete', 'Data Berhasil Dihapus');
    }
}
