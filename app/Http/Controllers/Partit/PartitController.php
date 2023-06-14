<?php

namespace App\Http\Controllers\Partit;

use App\Models\Partit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
class PartitController
{
    public function create()
    {
        return Inertia::render('Partit/NewPartit');
    }

    public function store(Request $request)
    {
        $partit = new Partit();
        $partit->create($request->all());
        return Inertia::render('Partit/Partits');
    }

    public function index()
    {
        //die(dd(Partit::all()));
        if(request()->wantsJson()) {
            return Partit::all();
        }
        else {
            return Inertia::render('Partit/Partits');
        }
    }

    public function destroy($id)
    {
        $partit = Partit::find($id);
        $partit->delete();
        return Inertia::render('Partit/Partits');
    }

    public function PartitsTeam()
    {
        if (request()->wantsJson()) {
            return Partit::select('partits.*', 'local_teams.nom_equip as nom_equip_local', 'visitant_teams.nom_equip as nom_equip_visitant', 'jornadas.data_jornada as data', 'local_teams.logo as logo_equip_local','visitant_teams.logo as logo_equip_visitant')
                ->join('teams as local_teams', 'partits.id_equip_local', '=', 'local_teams.id')
                ->join('teams as visitant_teams', 'partits.id_equip_visitant', '=', 'visitant_teams.id')
                ->join('jornadas', 'jornadas.id', '=', 'partits.id_jornada')
                ->get()->toArray();
        } else {
            return Inertia::render('Partit/Partits');
        }
    }
}
