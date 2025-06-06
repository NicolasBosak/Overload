<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Una Nueva Publicacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <h1 class="text-3xl font-bold text-center my-10">Crear Nuevo Juego</h1>
                    <div class="md:flex md:justify-center p-5">
                    <livewire:crear-game />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>