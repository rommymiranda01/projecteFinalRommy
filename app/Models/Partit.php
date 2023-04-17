<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partit extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jornada',
        'id_equip_local',
        'id_equip_visitant',
    ];

    public function jornada()
    {
        $this->hasMany(Jornada::class);
    }

    public function equip(){
        $this->belongsTo(Team::class);
    }
}
