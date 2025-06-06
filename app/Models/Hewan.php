<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'berat',
        'mata',
        'hidung',
        'mulut',
        'tanduk',
        'kaki',
        'pernafasan',
        'feses',
        'status',
    ];
}
