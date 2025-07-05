<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Kosar extends Model
{
    use HasFactory;
    protected $table = 'kosar';
    protected $fillable = [
        'kosar_id',
        'termek_id',
        'profil_id',
        'mennyiseg',
        'meret',
        'fizetve',
    ];
    public function termek()
    {
        return $this->belongsTo(Termek::class, 'termek_id');
    }
}
