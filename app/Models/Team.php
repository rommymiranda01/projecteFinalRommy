<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_equip',
        'logo',
    ];

    public function jugador()
    {
        $this->hasMany(Jugador::class);
    }
}
