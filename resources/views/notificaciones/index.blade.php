<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <h1 class="text-3xl font-bold text-center my-10">Mis Notificaciones</h1>
                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div>
                            <p class="text-sm text-gray-500 mt-2">Tienes un nuevo comentario en:
                                <span class="font-bold">{{$notificacion->data['nombre_game']}}</span>
                            </p>
                            <p class="text-sm text-gray-500 mt-2">
                                <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                            </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="#" class="bg-teal-500 p-3 text-sm uppercase font-bold text-white rounded-lg">Ver Jugadores</a>
                            </div>
                        </div>          
                    @empty
                        <p class="text-center text-gray-600">No hay Notificaciones Nuevas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>