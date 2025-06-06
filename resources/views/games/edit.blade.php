<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Una Publicacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <h1 class="text-2xl font-bold text-center my-10">Editar Juego: {{$game->titulo}}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <livewire:editar-game
                            :game="$game"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>