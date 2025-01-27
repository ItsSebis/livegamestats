<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Players;

class GamesController extends Controller {
    public function index() {
        return view('game.index', ['games' => Games::query()->where('owner', auth()->user()->id)->orderBy('id', 'desc')->get()]);
    }

    public function create() {
        return view('game.create');
    }

    public function edit($game) {
        $game = Games::where('id', $game)->first();
        return view('game.edit', [
            'game' => $game,
            'home' => Players::query()
                ->where('gameId', $game->id)
                ->where('teamId', $game->home)
                ->orderBy('number')
                ->get(),
            'guest' => Players::query()
                ->where('gameId', $game->id)
                ->where('teamId', $game->guest)
                ->orderBy('number')
                ->get()]);
    }

    public function show($game) {
        return view('game.show', ['game' => Games::where('id', $game)->first()]);
    }

    public function store() {
        // Validate the request...
        $game = new Games();

        $game->home = request('home');
        $game->guest = request('guest');
        $game->owner = auth()->user()->id;

        if ($game->home === $game->guest) {
            return redirect(route('game.create'));
        }

        $game->save();

        return redirect(route('game.edit', ['game' => $game->id]));
    }

    public function storePlayer() {
        // Validate the request...
        $player = new Players();

        $player->gameId = request('gameId');
        $player->teamId = request('teamId');
        $player->name = request('name');
        $player->number = request('number');
        if (request('goalkeeper') === 'on') {
            $player->goalkeeper = true;
        } else {
            $player->goalkeeper = false;
        }

        $player->save();

        return redirect(route('game.edit', ['game' => request('gameId')]));
    }

    public function removePlayer($player) {
        $player = Players::where('id', $player)->first();
        $game = $player->gameId;
        $player->delete();
        return redirect(route('game.edit', ['game' => $game]));
    }

    public function addPlayer($game, $team) {
        return view('game.addPlayer', ['game' => $game, 'team' => $team]);
    }
}
