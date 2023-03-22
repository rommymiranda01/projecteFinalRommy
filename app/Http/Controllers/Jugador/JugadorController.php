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
//        $jugador->create($request->all());
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = $photo->getClientOriginalName();
            $photo->move(public_path('images'), $filename);
        }
        $jugador->nom = $request->input('nom');
        $jugador->cognom = $request->input('cognom');
        $jugador->dorsal = $request->input('dorsal');
        $jugador->data_naixement = $request->input('data_naixement');
        $jugador->posicio = $request->input('posicio');
        $jugador->foto = $filename;
        $jugador->id_team = $request->input('id_team');
//        die(dd($jugador));
        $jugador->save();
        return Inertia::render('Jugador/Jugadors');
    }
}
