<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Semester extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'semester';

    public function siswa(){
        return $this->hasMany(siswa::class);
    }
    function nilai(){
        return $this->hasMany(Nilai::class, 'semester_id', 'id');
    }

    function kelas(){
        return $this->HasMany(Kelas::class, 'kelas_id', 'id');
    }
}
