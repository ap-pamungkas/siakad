<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\Guru;


class KelasController extends Controller
{
    function index(){
        return view('admin.kelas.index');
    }

    function create(){

        $data['guru'] = Guru::all();
        return view('admin.kelas.create', $data);
    }

    function store(Request $request)
    {

            $kelas = New Kelas;
            $kelas->tingkat_kelas = $request->tingkat_kelas;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->guru_id = $request->guru_id;
            $kelas->save();


        return redirect('/kelas')->with('create', 'Data Berhasil Ditambah');
    }

    function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $kelas = Kelas::with('guru')->orderBy('updated_at', 'desc')->select('*');

            return datatables()->of($kelas)
                ->addColumn('nama_kelas', function ($kelas) {
                    return $kelas->nama_kelas; // Display class name directly
                })
                ->addColumn('guru_nama', function ($kelas) {
                    return $kelas->guru ? $kelas->guru->nama : ''; // Add teacher name column
                })
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
        $kelas->guru_id = $request->guru_id;
        $kelas->save();

        return redirect('/kelas')->with('update', 'Data Berhasil Diubah');
    }


    function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect('/kelas')->with('delete', 'Data Berhasil Dihapus');
    }

}
