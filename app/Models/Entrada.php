<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_partit',
        'id_user',
    ];

    public function partit()
    {
        $this->hasMany(Partit::class);
    }
}
