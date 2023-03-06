<?php

namespace App\Http\Controllers\Temporada;

use App\Models\Temporada;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemporadaController
{
    public function store(Request $request){
        $temporada = new Temporada();
        $temporada->create($request->all());
        return Inertia::render('Temporada/Temporades');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            return Temporada::all();
        }else{
            return Inertia::render('Temporada/Temporades');
        }
    }

    public function destroy($id){
        //$team->delete();
        $temporada = Temporada::find($id);
        $temporada->delete();
        return Inertia::render('Temporada/Temporades');
    }

    public function edit($id){
        //$team->delete();
        $temporada = Temporada::find($id);
//        dd($temporada);
        return Inertia::render('Temporada/EditTemporada'.$temporada);
    }
}
