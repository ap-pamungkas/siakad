<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\Semester;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    function index(){
        return view('admin.siswa.index');
    }

    function create(){
        $data['kelas'] = Kelas::all();
        $data['semester'] = Semester::all();
        return view('admin.siswa.create', $data);
    }

    public function store(Request $request)
  {
    // $validatedData = $request->validate([
    //   'nama' => 'required',
    //   'nip' => 'required|unique:siswa,nip',  // Ensure unique NIP
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
      $path = Storage::disk('public')->put('images/siswa', $photo);  // Save to 'public/images/siswa'
      $photoPaths[] = $path;
    }

    // Save teacher data to the database
    $siswa = new Siswa;
    $siswa->nama = $request->nama;
    $siswa->nisn = $request->nisn;
    $siswa->jk = $request->jk;
    $siswa->alamat = $request->alamat;
    $siswa->tlp = $request->tlp;

    $siswa->foto = json_encode($photoPaths);
    $siswa->tempat_lahir = $request->tempat_lahir;
    $siswa->tgl_lahir = $request->tgl_lahir;
    $siswa->semester_id = $request->semester_id;
    $siswa->orang_tua_wali = $request->orang_tua_wali;
    $siswa->agama = $request->agama;
    $siswa->password= Hash::make($request->password);
    $siswa->save();


    return redirect('admin/siswa')->with('create', 'Data Berhasilahkan');
  }

  public function dataTableLogic(Request $request)
  {
      if ($request->ajax()) {
          $siswa = Siswa::with(['kelas', 'semester'])->orderBy('updated_at', 'desc')->get();

          return datatables($siswa)
              ->addColumn('kelas', function ($siswa) {
                  return $siswa->kelas ? $siswa->kelas->nama_kelas : '';
              })
              ->addColumn('periode', function ($kelas) {
                  return $kelas->semester ? $kelas->semester->periode : '';
              })
              ->make(true);
      }
      return view('index');
  }



  function show($id){
    $data['siswa'] = Siswa::findOrFail($id);
    return view('admin.siswa.show', $data);
  }

  function edit($id){
    $data['siswa'] = Siswa::findOrFail($id);
    $data['kelas'] = Kelas::all();
    $data['semester'] = Semester::all();
    return view('admin.siswa.edit', $data);
  }

  function update(Request $request, Siswa $siswa)
  {
      $siswa = Siswa::findOrFail($siswa->id);

      $existingPhotoPaths = json_decode($siswa->foto, true); // Get existing photo paths

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
      $siswa->nama = $request->nama;
      $siswa->nisn = $request->nisn;
      $siswa->jk = $request->jk;
      $siswa->alamat = $request->alamat;
      $siswa->tlp = $request->tlp;
      $siswa->foto = json_encode($photoPaths);
      $siswa->tempat_lahir = $request->tempat_lahir;
      $siswa->tgl_lahir = $request->tgl_lahir;
      $siswa->semester_id = $request->semester_id;
      $siswa->orang_tua_wali = $request->orang_tua_wali;
      $siswa->agama = $request->agama;
      $siswa->save();



      $siswa->save();

      return redirect('admin/siswa')->with('update', 'Data Berhasil disimpan');
  }

  public function destroy(Siswa $siswa)
  {
      $foto_paths = json_decode($siswa->foto, true);

      if (is_null($foto_paths)) {
          $siswa->delete();
          return redirect('admin/siswa')->with('delete', 'Data Berhasil Dihapus');
      }

      // Delete the files
      foreach ($foto_paths as $foto_path) {
          Storage::disk('public')->delete($foto_path);
      }

      $siswa->delete();

      return redirect('admin/siswa')->with('delete', 'Data Berhasil Dihapus');
  }

}
