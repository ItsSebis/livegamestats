<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function updateApi(Request $request, $player)
    {
        $validated = $request->validate([
            'column' => 'required',
            'increase' => 'required|boolean',
        ]);

        $player = Players::where('id', $player)->first();
        if ($player && Players::getDbTableSchema()->hasColumn($validated['column'])) {
            if ($validated['increase']) {
                if ($player[$validated['column']] >= 1) {
                    if ($validated['column'] !== 'yellowCard' && $validated['column'] !== 'redCard' && $validated['column'] !== 'twoMinutes') {
                        $player->{$validated['column']}++;
                    } elseif (($validated['column'] === 'redCard' || $validated['column'] === 'twoMinutes') && $player[$validated['column']] < 3) {
                        $player->{$validated['column']}++;
                    }
                } else {
                    $player->{$validated['column']}++;
                }
            } else if ($player->{$validated['column']} > 0) {
                $player->{$validated['column']}--;
            }
            if ($player->twoMinutes === 3) {
                $player->redCard = 2;
            }
            $player->save();
        } else {
            return response()->json(['success' => false]);
        }

        return response()->json(['success' => true, 'player' => $player]);
    }
}
