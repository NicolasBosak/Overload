<div>
    <livewire:filtrar-games />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-3xl text-gray-800 mb-12">
                Catalogo de Juegos</h3>
                <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-300">
                    @forelse ($games as $game)
                        <div class="md:flex md:justify-between md:items-center py-5">
                            <div class="md:flex-1">
                                <a class="text-2xl font-extrabold text-gray-600"
                                href="{{route('games.show', $game->id)}}">
                                    {{$game->titulo}}
                                </a>
                                <p class="text-base text-gray-600 mb-3">{{$game->desarrolladora}}</p>
                                <p class="text-xs font-bold mb-3">{{$game->categoria->categoria}}</p>
                                <p class="font-bold text-xs text-gray-600">Fecha de Lanzamiento:
                                    <span class="font-normal">
                                        {{$game->fechalanzamiento->format('d/m/Y')}}
                                    </span>
                                </p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{route('games.show', $game->id)}}" 
                                    class="bg-teal-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center">
                                    Ver Juego
                                </a>
                                    
                            </div>
                        </div>
                    @empty
                        <p class="p-3 text-center text-sm text-gray-600">No hay Juegos aun.</p>
                    @endforelse
                </div>
        </div>
    </div>
</div>
