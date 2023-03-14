<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'cognom',
        'dorsal',
        'data_naixement',
        'posicio',
        'foto',
        'id_equip',
    ];

    public function team()
    {
        $this->belongsTo(Team::class);
    }
}
