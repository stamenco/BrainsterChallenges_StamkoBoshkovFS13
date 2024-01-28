<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerFormRequest;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::get();

        return view('players.index', compact('players'));
    }

    public function create()
    {

        $teams = Team::get();

        return view('players.create', compact('teams'));
    }

    public function store(PlayerFormRequest $request)
    {

        $player = new Player();
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->date_of_birth = $request->date_of_birth;
        $player->team_id = $request->team_id;

        if ($player->save()) {
            return redirect()->route('players.index')->with('success', 'Player created successfuly!');
        }

        return view('players.create');
    }

    public function edit(string $id)
    {
        $teams = Team::get();

        $player = Player::where('id', $id)->first();

        return view('players.edit', compact('player', 'teams'));
    }

    public function update(PlayerFormRequest $request, Player $player)
    {

        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->date_of_birth = $request->date_of_birth;
        $player->team_id = $request->team_id;

        if ($player->save()) {
            return redirect()->route('players.index')->with('success', 'Player updated successfuly!');
        }

        return redirect()->route('players.index')->with('error', 'Something went wrong!');
    }

    public function destroy(Player $player)
    {

        if ($player->delete()) {
            return redirect()->route('players.index')->with('success', 'Player deleted successfuly!');
        }
        return redirect()->route('players.index')->with('error', 'Something went wrong!');
    }
}
