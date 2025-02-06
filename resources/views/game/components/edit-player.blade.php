<div>
    <h2 class="text-2xl">{{ $player->number . ": ".$player->name }} <a href="{{ route('game.rmPlayer', $player->id) }}">❌</a></h2>
    <div class="text-center overflow-x-auto">
        <table class="player-table">
            <thead>
            <tr>
                <th>Tore</th>
                <th>Würfe</th>
                @if($player->goalkeeper)
                    <th>Paraden</th>
                    <th>Würfe auf Tor</th>
                @endif
                <th>7m Tore</th>
                <th>7m Würfe</th>
                <th>Gelbe Karte</th>
                <th>Zwei Minuten</th>
                <th>Rote Karte</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td >
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'goals', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-goals">{{ $player->goals }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'goals', false)" name="exec" value="-">-</button>
                </td>
                <td >
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'shots', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-shots">{{ $player->shots }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'shots', false)" name="exec" value="-">-</button>
                </td>
                @if($player->goalkeeper)
                    <td >
                        <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'saves', true)" name="exec" value="+">+</button>
                        <span id="{{ $player->id }}-saves">{{ $player->saves }}</span>
                        <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'saves', false)" name="exec" value="-">-</button>
                    </td>
                    <td >
                        <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'shotsOnGoal', true)" name="exec" value="+">+</button>
                        <span id="{{ $player->id }}-shotsOnGoal">{{ $player->shotsOnGoal }}</span>
                        <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'shotsOnGoal', false)" name="exec" value="-">-</button>
                    </td>
                @endif
                <td>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'sevenGoals', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-sevenGoals">{{ $player->sevenGoals }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'sevenGoals', false)" name="exec" value="-">-</button>
                </td>
                <td >
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'sevenShots', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-sevenShots">{{ $player->sevenShots }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'sevenShots', false)" name="exec" value="-">-</button>
                </td>
                <td >
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'yellowCard', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-yellowCard" class="yellowCard">{{ $player->yellowCard }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'yellowCard', false)" name="exec" value="-">-</button>
                </td>
                <td >
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'twoMinutes', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-twoMinutes">{{ $player->twoMinutes }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'twoMinutes', false)" name="exec" value="-">-</button>
                </td>
                <td >
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'redCard', true)" name="exec" value="+">+</button>
                    <span id="{{ $player->id }}-redCard" class="redCard">{{ $player->redCard }}</span>
                    <button class="submit_btn" onclick="updatePlayer({{ $player->id }}, 'redCard', false)" name="exec" value="-">-</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
