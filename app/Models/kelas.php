<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory, HasUuids;

    protected $table="kelas";

    function guru(){
        return $this->belongsTo(guru::class);
    }
}
