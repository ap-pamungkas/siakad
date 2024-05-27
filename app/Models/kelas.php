<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory, HasUuids;

    protected $table="kelas";

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }


    function siswa(){
        return $this->hasMany(siswa::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'kelas_id');
    }

    function semester(){
        return $this->belongsTo(Semester::class, 'semester_id');
    }

}
