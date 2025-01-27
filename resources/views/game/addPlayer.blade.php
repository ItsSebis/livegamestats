<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add new Player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('game.storePlayer') }}">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input id="name" class="block mt-1 w-full text-gray-900" type="text" name="name" value="{{old('home')}}"
                                   required autofocus/>
                        </div>
                        <div class="mt-4">
                            <label for="number">Nummer</label>
                            <input id="number" class="block mt-1 w-full text-gray-900" type="number" name="number" value="{{old('guest')}}"
                                   required/>
                        </div>
                        <input type="hidden" name="gameId" value="{{ $game }}">
                        <input type="hidden" name="teamId" value="{{ $team }}">
                        <label for="goalkeeper">Torwart</label>
                        <input id="goalkeeper" type="checkbox" name="goalkeeper">
                        <div class="flex items">
                            <button class="ml-4">
                                {{ __('Add') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
