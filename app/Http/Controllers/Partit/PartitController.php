<?php

namespace App\Http\Controllers\Partit;

use App\Models\Partit;
use Illuminate\Http\Request;
use Inertia\Inertia;
class PartitController
{
    public function create()
    {
        return Inertia::render('Jornada/NewPartit');
    }

    public function store(Request $request)
    {
        $partit = new Partit();
        $partit->create($request->all());
        return Inertia::render('Partit/Partits');
    }

    public function index()
    {
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

    public function edit($id)
    {
        $partit = Partit::find($id);
        return Inertia::render('Partit/EditPartit', ['partit' => $partit]);
    }

    public function update(Request $request, $id)
    {
        $partit = Partit::find($id);
        $partit->update($request->all());
        return Inertia::render('Partit/Partits');
    }
}
