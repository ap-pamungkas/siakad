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
            // 'max:18',

        ],
        'nama' => 'required',
        'password' =>
        [
            'required',
            'min:8',
        ],
    ];


    static $pesan=[
        'nama.required' => 'Nama harus wajib di isi',
        'nip.required' => 'NIP harus wajib di isi',
        // 'nip.min' => 'NIP minimal 18 karakter',
        // 'nip.max' => 'NIP tidak boleh lebih dari 18 karakter',
        'password.required' => 'Password harus wajib di isi',

    ];
}


