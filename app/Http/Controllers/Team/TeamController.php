<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController
{
    public function index()
    {
        if(request()->wantsJson()) {
            return Team::all();
        }
        else {
            return Inertia::render('Team/Teams');
        }
    }

    public function destroy($id){
        //$team->delete();
        $team = Team::find($id);
        $team->delete();
        return Inertia::render('Team/Teams');
    }

    public function edit($id)
    {
        $team = Team::find($id);
        return Inertia::render('Team/EditTeam', ['team' => $team]);
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->update($request->all());
        return Inertia::render('Team/Teams');
    }

    public function create()
    {
        return Inertia::render('Team/NewTeam');
    }
    public function store(Request $request){
        $team = new Team();
        $team->create($request->all());
        return Inertia::render('Team/Teams');
    }
}
