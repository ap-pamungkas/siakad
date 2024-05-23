<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/admin/guru.php';
require __DIR__.'/admin/kepala-sekolah.php';
require __DIR__.'/admin/mapel.php';
