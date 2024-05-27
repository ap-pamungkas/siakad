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
    // $validatedData = $request->validate([
    //   'nama' => 'required',
    //   'nip' => 'required|unique:guru,nip',  // Ensure unique NIP
    //   'jk' => 'required|in:L,P',  // Validate gender (L/P)
    //   'alamat' => 'required',
    //   'tlp' => 'required',
    //   'mapel_id' => 'required|exists:mapel,id',  // Ensure valid mapel ID
    //   'password' => 'required|min:8|confirmed',  // Validate password
    //   'foto' => 'required|array|mimes:jpeg,png,jpg|max:2048',  // Validate multiple photos
    // ]);

    $photoPaths = [];
    foreach ($request->file('foto') as $key => $photo) {
      $fileName = time() . '_' . $photo->getClientOriginalName();  // Unique filename
      $path = Storage::disk('public')->put('images/guru', $photo);  // Save to 'public/images/guru'
      $photoPaths[] = $path;
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
    $guru->foto = json_encode($photoPaths);
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



        $existingPhotoPaths = json_decode($guru->foto, true); // Get existing photo paths

        // Process uploaded photos
        $photoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $key => $photo) {
                $fileName = time() . '_' . $photo->getClientOriginalName();
                $path = Storage::disk('public')->put('images/guru', $photo);
                $photoPaths[] = $path;
            }
        } else {
            // If no new files uploaded, retain existing photo paths
            $photoPaths = $existingPhotoPaths;
        }

        // Delete old photos if not present in new set
        foreach ($existingPhotoPaths as $existingPath) {
            if (!in_array($existingPath, $photoPaths)) {
                Storage::disk('public')->delete($existingPath);
            }
        }

        // Update teacher data
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $guru->tlp = $request->tlp;
        $guru->foto = json_encode($photoPaths);
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
