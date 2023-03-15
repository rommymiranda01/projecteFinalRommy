<?php

namespace App\Http\Controllers\Jugador;

use App\Models\Jugador;
use Illuminate\Http\Request;
use Inertia\Inertia;
class JugadorController
{
    public function index()
    {
        if(request()->wantsJson()) {
            return Jugador::all();
        }
        else {
            return Inertia::render('Jugador/Jugadors');
        }
    }

    public function destroy($id){
        $jugador = Jugador::find($id);
        $jugador->delete();
        return Inertia::render('Jugador/Jugadors');
    }

    public function edit($id)
    {
        $jugador = Jugador::find($id);
        return Inertia::render('Jugador/EditJugador', ['jugador' => $jugador]);
    }

    public function update(Request $request, $id)
    {
        $jugador = Jugador::find($id);
        $jugador->update($request->all());
        return Inertia::render('Jugador/Jugadors');
    }

    public function create()
    {
        return Inertia::render('Jugador/NewJugador');
    }
    public function store(Request $request){
        $jugador = new Jugador();
        $jugador->create($request->all());
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('public/images', $photo->getClientOriginalName());
        }
        return Inertia::render('Jugador/Jugadors');
    }
}
