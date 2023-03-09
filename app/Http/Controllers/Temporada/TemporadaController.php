<?php

namespace App\Http\Controllers\Temporada;

use App\Models\Temporada;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemporadaController
{

    public function create()
    {
        return Inertia::render('Temporada/NewTemporada');
    }

    public function store(Request $request)
    {
        $temporada = new Temporada();
        $temporada->create($request->all());
        return Inertia::render('Temporada/Temporades');
    }

    public function index()
    {
        if(request()->wantsJson()) {
            return Temporada::all();
        }
        else {
            return Inertia::render('Temporada/Temporades');
        }
    }

    public function destroy($id)
    {
        $temporada = Temporada::find($id);
        $temporada->delete();
        return Inertia::render('Temporada/EditTemporada');
    }

    public function edit($id)
    {
        $temporada = Temporada::find($id);
        return Inertia::render('Temporada/EditTemporada', ['temporada' => $temporada]);
    }

    public function update(Request $request, $id)
    {
        $temporada = Temporada::find($id);
        $temporada->update($request->all());
        return Inertia::render('Temporada/Temporades');
    }
}
