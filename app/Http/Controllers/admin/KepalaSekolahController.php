<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepalaSekolah;
use Illuminate\Support\Facades\Storage;

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
        // $request->validate($kepalaSekolah::$input, $kepalaSekolah::$pesan);
     
    $photoPath = null;
    if ($request->hasFile('foto')) {
        $photo = $request->file('foto');
        $fileName = time(). '_'. $photo->getClientOriginalName();  // Unique filename
        $path = Storage::disk('public')->put('images/guru', $photo);  // Save to 'public/images/guru'
        $photoPath = $path;
    }

        $kps = new $kepalaSekolah;
        $kps->nama = $request->nama;
        $kps->nip = $request->nip;
        $kps->foto =$photoPath;
        $kps->tlp = $request->tlp;
        $kps->password = Hash::make($request->password);

        $kps->save();
        return redirect('admin/kepala-sekolah')->with('create', 'Data Berhasil disimpan');
    }
    function edit(String $id)
    {
        $data['kps'] = KepalaSekolah::findOrFail($id);


        return view('admin.kepala-sekolah.edit', $data);
    }

  function update(KepalaSekolah $kepalaSekolah, Request $request, $kps)
{
    $kps = KepalaSekolah::findOrFail($kps);
    $existingPhotoPath = $kps->foto; // Get existing photo path

    // Process uploaded photo
    if ($request->hasFile('foto')) {
        $photo = $request->file('foto');
        $fileName = time(). '_'. $photo->getClientOriginalName();
        $path = Storage::disk('public')->put('images/kepala-sekolah', $photo);
        $photoPath = $path;
    } else {
        // If no new file uploaded, retain existing photo path
        $photoPath = $existingPhotoPath;
    }
    
    // Delete old photo if not present in new set
    if ($existingPhotoPath!== $photoPath) {
        Storage::disk('public')->delete($existingPhotoPath);
    }


  // Update KepalaSekolah object regardless of foto change

  $kps->nama = $request->nama;
  $kps->nip = $request->nip;
  $kps->tlp = $request->tlp;
  $kps->foto = $photoPath;
  if ($request->filled('password')) {
    $kps->password = Hash::make($request->password);
  }

  $kps->save();
  return redirect('admin/kepala-sekolah')->with('update', 'Data Berhasil disimpan');
}


    public function show($id)
    {
        $data['kps'] = KepalaSekolah::findOrFail($id);
        return view('admin.kepala-sekolah.show', $data);
    }


    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $kps = KepalaSekolah::orderBy('updated_at', 'desc');

            return datatables()->of($kps)
                ->make(true);
        }

        return view('index');
    }
    function destroy(kepalaSekolah $kps,)
    {
        $foto_paths = json_decode($kps->foto, true);

        // Delete the files
        foreach ($foto_paths as $foto_path) {
            Storage::disk('public')->delete($foto_path);
        }

        $kps->delete();

        return redirect('admin/kepala-sekolah')->with('delete', 'Data Berhasil Dihapus');
    }

}
