<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comentarios de Jugadores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <h1 class="text-3xl font-bold text-center my-10">
                        Comentarios: {{$game->titulo}}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200">
                            @forelse ($game->jugadores as $jugador)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{$jugador->user->name}}</p>
                                        <p class="text-sm text-gray-600">{{$jugador->user->email}}</p>
                                        <p class="text-sm text-gray-600">Fecha del Comentario: {{$jugador->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div>
                                        <a 
                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm
                                        leading-5 font-medium rounded-full text-gray-700 bg-white  hover:bg-gray-50" 
                                        href="{{asset($jugador->comentario)}}"
                                        target="_blank"
                                        rel="noreferrer noopener">
                                            Ver Comentario
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay comentarios aun.</p>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>