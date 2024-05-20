<?php

use App\Http\Controllers\admin\GuruController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('');
});

Route::controller(GuruController::class)->group(function () {

    Route::get('/guru', 'index');
});

