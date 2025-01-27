<div class="">
    <h2 class="text-2xl">{{ $player->number . ": ".$player->name }}</h2>
    <div class="text-center">
        <table class="player-table">
            <thead>
            <tr>
                <th>Torquote</th>
                @if($player->goalkeeper)
                    <th>Haltquote</th>
                @endif
                <th>7m Quote</th>
                <th>Gelbe Karte</th>
                <th>Zwei Minuten</th>
                <th>Rote Karte</th>
            </tr>
            </thead>
            <tbody>
            @php
            $shotRate = ($player->shots == 0) ? 0 : round($player->goals/$player->shots, 3)*100;
            $saveRate = ($player->shotsOnGoal == 0) ? 0 : round($player->saves/$player->shotsOnGoal, 3)*100;
            $sevenRate = ($player->sevenShots == 0) ? 0 : round($player->sevenGoals/$player->sevenShots, 3)*100;
            @endphp
            <tr>
                <td >
                    <span id="{{ $player->id }}-goalRate">{{ $shotRate."%" }}</span>
                </td>
                @if($player->goalkeeper)
                    <td >
                        <span id="{{ $player->id }}-saveRate">{{ $saveRate."%" }}</span>
                    </td>
                @endif
                <td >
                    <span id="{{ $player->id }}-sevenRate">{{ $sevenRate."%" }}</span>
                </td>
                <td >
                    <span id="{{ $player->id }}-yellowCard" class="yellowCard">{{ $player->yellowCard }}</span>
                </td>
                <td >
                    <span id="{{ $player->id }}-twoMinutes">{{ $player->twoMinutes }}</span>
                </td>
                <td >
                    <span id="{{ $player->id }}-redCard" class="redCard">{{ $player->redCard }}</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
