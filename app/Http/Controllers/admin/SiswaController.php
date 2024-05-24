<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index(){
        return view('admin.siswa.index');
    }

    function create(){
        return view('admin.siswa.create');
    }
}
