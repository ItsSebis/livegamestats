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
                    <form method="POST" action="{{ route('game.update', $game->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <h3>Home</h3>
                            <p>{{ $game->home }}</p>
                        </div>
                        <div class="mt-4">
                            <h3>Guest</h3>
                            <p>{{ $game->guest }}</p>
                        </div>
                        <div class="flex items">
                            <button class="ml-4">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
