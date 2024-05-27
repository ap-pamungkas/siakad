<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function(){
    require __DIR__.'/admin/guru.php';
    require __DIR__.'/admin/kepala-sekolah.php';
    require __DIR__.'/admin/mapel.php';
    require __DIR__.'/admin/siswa.php';
    require __DIR__.'/admin/kelas.php';
    require __DIR__.'/admin/semester.php';
    require __DIR__.'/admin/nilai.php';

});

