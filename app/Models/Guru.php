<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'guru';



// protected $fillable = [
//     'nip',
//     'nama',
//     'jk',
//     'nama',
//     'nama',
//     'password',
// ];


// Access related mapels by ID


// Custom accessor to display subject name


// Access related mapels by ID




static $inputan=[
   'tlp' => 'max:12',
];

static $pesan=[
    'tlp.max' => 'no hp maximal 12 digit',
];

public function mapel()
{
    return $this->belongsTo(Mapel::class);
}


function kelas(){
    return $this->hasMany(Kelas::class);

}
}
