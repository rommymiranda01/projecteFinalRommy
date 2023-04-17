<?php

namespace App\Http\Controllers\Jornada;

use App\Models\Jornada;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JornadaController
{
    public function create()
    {
        return Inertia::render('Jornada/NewJornada');
    }

    public function store(Request $request)
    {
        $jornada = new Jornada();
        $jornada->create($request->all());
        return Inertia::render('Jornada/Jornades');
    }

    public function index()
    {
        if(request()->wantsJson()) {
            return Jornada::all();
        }
        else {
            return Inertia::render('Jornada/Jornades');
        }
    }

    public function destroy($id)
    {
        $jornada = Jornada::find($id);
        $jornada->delete();
        return Inertia::render('Jornada/Jornades');
    }

    public function edit($id)
    {
        $jornada = Jornada::find($id);
        return Inertia::render('Jornada/EditJornada', ['jornada' => $jornada]);
    }

    public function update(Request $request, $id)
    {
        $jornada = Jornada::find($id);
        $jornada->update($request->all());
        return Inertia::render('Jornada/Jornades');
    }
}
