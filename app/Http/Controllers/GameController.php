<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\GameFormRequest;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::get();
        $teams = Team::get();

        return view('matches.index', compact('games', 'teams'));
    }

    public function create()
    {

        $teams = Team::get();

        return view('matches.create', compact('teams'));
    }

    public function store(GameFormRequest $request)
    {

        $game = new Game();
        $game->home_team_id = $request->home_team_id;
        $game->guest_team_id = $request->guest_team_id;
        $game->date = $request->date;
        $game->host_score = $request->host_score;
        $game->guest_score = $request->guest_score;

        if ($game->home_team_id == $game->guest_team_id) {
            return redirect()->route('matches.create')->with('error', 'One team can not play against itself!');
        }

        if ($game->save()) {
            return redirect()->route('matches.index')->with('success', 'Match created successfuly!');
        }

        return view('matches.create');
    }

    public function edit(string $id)
    {
        $teams = Team::get();

        $game = Game::where('id', $id)->first();

        return view('matches.edit', compact('game', 'teams'));
    }

    public function update(GameFormRequest $request, Game $game)
    {

        $game->home_team_id = $request->home_team_id;
        $game->guest_team_id = $request->guest_team_id;
        $game->date = $request->date;
        $game->host_score = $request->host_score;
        $game->guest_score = $request->guest_score;

        if ($game->save()) {
            return redirect()->route('matches.index')->with('success', 'Match updated successfuly!');
        }

        return redirect()->route('matches.index')->with('error', 'Something went wrong!');
    }

    public function destroy(Game $game)
    {

        if ($game->delete()) {
            return redirect()->route('matches.index')->with('success', 'Match deleted successfuly!');
        }
        return redirect()->route('matches.index')->with('error', 'Something went wrong!');
    }
}
