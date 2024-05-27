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

    /**
     * Return all kelas that belongs to this semester
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function kelas(){
        return $this->hasMany(Kelas::class, 'semester_id', 'id');

    }
}
