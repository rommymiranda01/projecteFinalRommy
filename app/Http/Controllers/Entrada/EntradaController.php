<?php

namespace App\Http\Controllers\Entrada;

use App\Models\Entrada;
use App\Models\Partit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
class EntradaController
{
    public function index()
    {

    }
    public function create()
    {
        return Inertia::render('Entrada/NewEntrada');
    }

    public function store(Request $request)
    {
        $entrada = new Entrada();
        $entrada->create($request->all());
        return Inertia::render('Partit/Partits');
    }

    public function show($id)
    {
        $partit = Partit::find($id);
        //dd($id);
//        dd($partit);
        return Inertia::render('Entrada/Entrades', ['partit', $partit]);
    }

    public function destroy($id)
    {
        $entrada = Entrada::find($id);
        $entrada->delete();
        return Inertia::render('Entrada/Entrades');
    }

    public function PartitsEntrada($id)
    {
        $partit = Partit::select('partits.*', 'local_teams.nom_equip as nom_equip_local', 'visitant_teams.nom_equip as nom_equip_visitant', 'jornadas.data_jornada as data', 'local_teams.logo as logo_equip_local', 'visitant_teams.logo as logo_equip_visitant')
            ->join('teams as local_teams', 'partits.id_equip_local', '=', 'local_teams.id')
            ->join('teams as visitant_teams', 'partits.id_equip_visitant', '=', 'visitant_teams.id')
            ->join('jornadas', 'jornadas.id', '=', 'partits.id_jornada')
            ->where('partits.id', $id)
            ->get()
            ->toArray();

        if (request()->wantsJson()) {
            return $partit;
        } else {
            return Inertia::render('Entrada/Entrades', ['partit', $partit]);
        }
    }

}
