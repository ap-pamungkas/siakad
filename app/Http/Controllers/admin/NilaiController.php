<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Kelas;

class NilaiController extends Controller
{
    function index(){
        return view('admin.nilai.index');
    }



    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $kelas = Kelas::with( 'semester')
                ->orderBy('updated_at', 'desc')
                ->get();

            return datatables($kelas)

                ->addColumn('periode', function ($kelas) {
                    return $kelas->semester ? $kelas->semester->periode : '';
                })
                ->addColumn('tahun_ajaran', function ($kelas) {
                    return $kelas->semester ? $kelas->semester->tahun_ajaran : '';
                })

                ->make(true);
        }

        return view('index');
    }

    function showKelas($id){
        $data['kelas'] = Kelas::with('siswa')->findOrFail($id);
        $data['nama_kelas'] = $data['kelas']->nama_kelas;


        return view('admin.nilai.show-kelas', $data);
    }

    // public function dataTableSiswa(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $kelas = Kelas::with('siswa')
    //         ->orderBy('updated_at', 'desc')
    //         ->get();

    //         return datatables($kelas)

    //         ->addColumn('nisn', function ($kelas) {
    //             return $kelas->siswa->first() ? $kelas->siswa->first()->nisn : '';
    //         })
    //         ->addColumn('nama', function ($kelas) {
    //             return $kelas->siswa->first() ? $kelas->siswa->first()->nama : '';
    //         })

    //             ->make(true);
    //     }

    //     return view('index');
    // }


// function edit($nilai){
//     $data['nilai'] = Nilai::findOrFail($nilai);
//     $data['siswa'] = Siswa::with('kelas', 'semester')->get();
//     $data['mapel'] = Mapel::all();
//     return view('admin.nilai.edit', $data);
// }

// function update(Request $request,$nilai){
//     $nilai = Nilai::findOrFail($nilai);
//     $nilai->siswa_id = $request->input('siswa_id');
//     $nilai->mapel_id = $request->input('mapel_id');
//     $nilai->kelas_id = $request->input('kelas_id');
//     $nilai->semester_id = $request->input('semester_id');
//     $nilai->nilai_ulangan = $request->input('nilai_ulangan');
//     $nilai->nilai_uts = $request->input('nilai_uts');
//     $nilai->nilai_uas = $request->input('nilai_uas');
//     $nilai->nilai_akhir = ($nilai->nilai_ulangan + $nilai->nilai_uts + $nilai->nilai_uas) / 3;
//     $nilai->save();
//     return redirect('admin/nilai')->with('update', 'data berhasil di update');
// }

// function destroy(Nilai $nilai)
// {
//     $nilai->delete();

//     return redirect('admin/nilai')->with('delete', 'Data Berhasil Dihapus');
// }
}
