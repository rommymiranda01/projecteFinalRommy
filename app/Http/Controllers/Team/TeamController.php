<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController
{
    public function index(Request $request){
        if ($request->ajax()) {
            return Team::all();
        }else{
            return Inertia::render('Teams');        }
    }

    public function destroy($id){
        //$team->delete();
        $team = Team::find($id);
        $team->delete();
        return Inertia::render('Teams');
    }

    public function update(Request $request, Team $team){
        $team->update($request->all());
    }

    public function store(Request $request){
        $team = new Team();
        $team->create($request->all());
    }
}
