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
            $delta = $validated['increase'] ? 1 : -1;
            if ($player->{$validated['column']} === 0 && $delta === -1) {
                return response()->json(['success' => true, 'player' => $player]);
            }
            switch ($validated['column']) {
                case 'goals':
                    $player->shots = $player->shots+$delta;
                    if ($player->shots < 0) {
                        $player->shots = 0;
                    }
                    break;
                case 'sevenGoals':
                    $player->sevenShots = $player->sevenShots+$delta;
                    if ($player->sevenShots < 0) {
                        $player->sevenShots = 0;
                    }
                    break;
                case 'saves':
                    $player->shotsOnGoal = $player->shotsOnGoal+$delta;
                    if ($player->shotsOnGoal < 0) {
                        $player->shotsOnGoal = 0;
                    }
                    break;
                case 'shots':
                    if ($delta === -1) {
                        if ($player->goals >= $player->shots-1) {
                            $player->goals = $player->shots-1;
                        }
                    }
                    break;
                case 'sevenShots':
                    if ($delta === -1) {
                        if ($player->sevenGoals >= $player->sevenShots-1) {
                            $player->sevenGoals = $player->sevenShots-1;
                        }
                    }
                    break;
                case 'shotsOnGoal':
                    if ($delta === -1) {
                        if ($player->saves >= $player->shotsOnGoal-1) {
                            $player->saves = $player->shotsOnGoal-1;
                        }
                    }
                    break;
            }
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
