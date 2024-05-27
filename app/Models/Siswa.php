<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'siswa';


    function semester(){
        return $this->belongsTo(semester::class, 'semester_id', 'id');
    }

    function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    function nilai(){
        return $this->hasMany(Nilai::class, 'siswa_id', 'id');
    }
}

