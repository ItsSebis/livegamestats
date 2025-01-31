@php use App\Models\Teams; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Game ' . $game->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <p><a href="{{ route('game.show', $game->id) }}" target="_blank">Spiel Teilen</a></p>
                        <h2 class="text-3xl">Heim</h2>
                        <p class="text-gray-300">{{ Teams::where('id', $game->home)->first()->name }}</p>
                        <a href="{{ route('game.addPlayer', [$game->id, $game->home]) }}">Spieler hinzufügen</a>
                        <div class="text-center">
                            @foreach($home as $player)
                                @include('game.components.edit-player', ['player' => $player])
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4">
                        <h2 class="text-3xl">Auswärts</h2>
                        <p class="text-gray-300">{{ Teams::where('id', $game->guest)->first()->name }}</p>
                        <a href="{{ route('game.addPlayer', [$game->id, $game->guest]) }}">Spieler hinzufügen</a>
                        <div class="grid">
                            @foreach($guest as $player)
                                @include('game.components.edit-player', ['player' => $player])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    let csrf = "{{ csrf_token() }}";
    function updatePlayer(playerId, column, increase) {
        fetch('{{config("app.url")}}/api/player/' + playerId + '/update', {
            method: 'POST', headers: {
                'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf,
            }, body: JSON.stringify({'column': column, 'increase': increase})
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    let player = data.player;
                    for (const column of Object.keys(player)) {
                        if (document.getElementById(player.id + '-' + column) === null) {
                            continue;
                        }
                        document.getElementById(player.id + '-' + column).innerText = player[column];
                    }
                    updateCards();
                } else {
                    alert('Failed to update player');
                }
            })
            .catch((error) => console.error('Error:', error));
    }

    function updateCards() {
        for (const cardSpan of document.getElementsByClassName('yellowCard')) {
            if (cardSpan.innerText > 0) {
                cardSpan.innerText = '🟨';
            }
        }
        for (const cardSpan of document.getElementsByClassName('redCard')) {
            switch (cardSpan.innerText) {
                case '1':
                    cardSpan.innerText = '🟥';
                    break;
                case '2':
                    cardSpan.innerText = '2m';
                    break;
                case '3':
                    cardSpan.innerText = '🟥🟦';
                    break;
            }
        }
    }

    updateCards();
</script>
