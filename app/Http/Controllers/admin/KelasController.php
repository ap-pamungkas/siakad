<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\Guru;
use App\Models\Semester;


class KelasController extends Controller
{
    function index(){
 $data = Kelas::with('guru', 'semester')->get();

        return view('admin.kelas.index');
    }

    function create(){
        $data['semester']= Semester::all();
        $data['guru'] = Guru::all();
        return view('admin.kelas.create', $data);
    }

    function store(Request $request)
    {

            $kelas = New Kelas;
            $kelas->tingkat_kelas = $request->tingkat_kelas;
            $kelas->semester_id = $request->semester_id;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->guru_id = $request->guru_id;
            $kelas->save();


        return redirect('admin/kelas')->with('create', 'Data Berhasil Ditambah');
    }

    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $kelas = Kelas::with('guru', 'semester')->orderBy('updated_at', 'desc');

            return datatables()->of($kelas)
                ->make(true);
        }

        return view('index');
    }




    function edit($id){
        $data['kelas'] = Kelas::findOrFail($id);
        $data['guru'] = Guru::all();
        $guru = Guru::select('id', 'nama')->where('id', $data['kelas']->guru_id)->first();
        if(!$guru ){
            return back()->with('error', 'Data Tidak Ditemukan');
        }
        return view('admin.kelas.edit', $data);
    }


    function update(Request $request, $kelas){

        $kelas = Kelas::findOrFail($kelas);


        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->semester_id = $request->semester_id;

        $kelas->guru_id = $request->guru_id;
        $kelas->save();

        return redirect('admin/kelas')->with('update', 'Data Berhasil Diubah');
    }


    function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect('admin/kelas')->with('delete', 'Data Berhasil Dihapus');
    }

}
