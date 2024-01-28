<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\TeamFormRequest;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::get();

        return view('teams.index', compact('teams'));
    }

    public function create()
    {

        return view('teams.create');
    }

    public function store(TeamFormRequest $request)
    {

        $team = new Team();
        $team->name = $request->name;
        $team->founded_in = $request->founded_in;

        if ($team->save()) {
            return redirect()->route('teams.index')->with('success', 'Team created successfuly!');
        }

        return view('teams.create');
    }

    public function edit(string $id)
    {
        $team = Team::where('id', $id)->first();

        return view('teams.edit', compact('team'));
    }

    public function update(TeamFormRequest $request, Team $team)
    {

        $team->name = $request->name;
        $team->founded_in = $request->founded_in;

        if ($team->save()) {
            return redirect()->route('teams.index')->with('success', 'Team updated successfuly!');
        }

        return redirect()->route('teams.index')->with('error', 'Something went wrong!');
    }

    public function destroy(Team $team)
    {

        if ($team->delete()) {
            return redirect()->route('teams.index')->with('success', 'Team deleted successfuly!');
        }
        return redirect()->route('teams.index')->with('error', 'Something went wrong!');
    }
}
