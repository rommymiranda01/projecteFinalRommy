<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_temporada',
        'data_jornada',
    ];

    public function temporada(){
        $this->belongsTo(Temporada::class);
    }

    public function partit(){
        $this->belongsTo(Partit::class);
    }
}
