<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
class SemesterController extends Controller
{

    function index(){
        return view('admin.semester.index');
    }

    function create(){
        return view('admin.semester.create');
    }



    function store(Request $request){
        $semester = new Semester;
        $semester->periode = $request->periode;
        $semester->tahun_ajaran = $request->tahun_ajaran;
        $semester->save();
        return redirect('admin/semester')->with('create', 'data berhasil di tambah');
    }
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $smtr = Semester::orderBy('updated_at', 'desc');

            return datatables()->of($smtr)
                ->make(true);
        }

        return view('index');
    }


    function edit($id){
        $data['smtr'] = Semester::findOrFail($id);
        return view('admin.semester.edit', $data);
    }

    function update($smtr, Request $request){
        $smtr = Semester::findOrFail($smtr);
        $smtr->periode = $request->periode;
        $smtr->tahun_ajaran = $request->tahun_ajaran;
        $smtr->save();
        return redirect('admin/semester')->with('update', 'data berjasil di update');
    }

    function destroy(Semester $smtr){
        $smtr->delete();
        return redirect('admin/semester')->with('delete', 'data berhasil dinhapus');
    }
}
