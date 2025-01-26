<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('game.store') }}">
                        @csrf
                        <div>
                            <label for="home">Home</label>
                            <input id="home" class="block mt-1 w-full text-gray-900" type="text" name="home" value="{{old('home')}}"
                                     required autofocus/>
                        </div>
                        <div class="mt-4">
                            <label for="guest">Guest</label>
                            <input id="guest" class="block mt-1 w-full text-gray-900" type="text" name="guest" value="{{old('guest')}}"
                                     required/>
                        </div>
                        <div class="flex items">
                            <button class="ml-4">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
