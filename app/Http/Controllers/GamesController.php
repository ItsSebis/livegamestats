<?php

namespace App\Http\Controllers;

use App\Models\Games;

class GamesController extends Controller {
    public function index() {
        return view('game.index', ['games' => Games::query()->where('owner', auth()->user()->id)->orderBy('id', 'desc')->get()]);
    }

    public function create() {
        return view('game.create');
    }

    public function edit($game) {
        return view('game.edit', ['game' => Games::where('id', $game)->first()]);
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

        $game->save();

        return redirect(route('game.index'));
    }
}
