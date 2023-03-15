<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Nette\Utils\Image;

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
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo->storeAs('public/images', $logo->getClientOriginalName());
            $team->logo = $logo->getClientOriginalName();
        }
        $team->nom_equip = $request->input('nom_equip');

//        die(dd($team));
        $team->save();
        return Inertia::render('Team/Teams');
    }
}
