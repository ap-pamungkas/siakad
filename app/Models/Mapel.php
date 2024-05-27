<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Mapel extends Model
{
    use HasFactory, HasUuids;




    protected $table = 'mapel';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel'
    ];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'mapel_id');
    }
}
