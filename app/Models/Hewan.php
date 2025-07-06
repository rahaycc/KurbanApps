<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    protected $table = 'hewans';

    protected $fillable = [
        'nama',
        'jenis_hewan',
        'jenis_kelamin',
        'umur',
        'berat',
        'warna',
        'poel',
        'mata',
        'kaki',
        'tanduk',
        'ekor',
        'telinga',
        'status',
        'skor'
    ];
    
}
