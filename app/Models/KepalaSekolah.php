<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class KepalaSekolah extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'kepala_sekolah';

    protected $fillable = [
        'nip',
        'nama',
        'password',
    ];

    static $input = [
        'nip' => [
            'required',
            // 'min:18',
            'max:18',


        ],
'foto'=>[
   'max:2048',
   'mimes:jpeg,png,jpg'
],
        'nama' => 'required',
        'password' =>
        [
            'required',
            'min:8',
        ],

    'tlp'=>'required | max:12',

    ];


    static $pesan=[
        'nama.required' => 'Nama harus wajib di isi',
        'nip.required' => 'NIP harus wajib di isi',
        'nip.min' => 'NIP minimal 18 karakter',
        'nip.max' => 'NIP tidak boleh lebih dari 18 karakter',
        'password.required' => 'Password harus wajib di isi',
        'password.min' => 'password minimal 8 digit',
        'foto.mimes' => 'format foto harus berupa jpeg, png, jpg ',
        'foto.max' => 'ukuran file terlalu besar ',
        'tlp.max' => 'no hp maksimal 12 digit  ',

    ];
}


