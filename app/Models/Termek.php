<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termek extends Model
{
    use HasFactory;

    protected $table = 'termek';

    protected $fillable = [
        'nev',
        'ar',
        'mennyiseg',
        'leiras',
        'mutatokep',
        'egerkep',
        'kep_1',
        'kep_2',
        'kep_3',
    ];
}
