<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($games as $game)      
    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between
    md:items-center">
        <div class="space-y-3">
            <a href="#" class="text-xl font-bold">
                {{ $game->titulo }}
            </a>
            <p class="text-sm text-gray-600 font-bold">{{$game->desarrolladora}}</p>
            <p class="text-sm text-gray-500">Fecha de Lanzamiento: {{$game->fechalanzamiento->format('d/m/Y')}}</p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs 
            font-bold uppercase text-center">Calificacion</a>
            <a href="{{route('games.edit', $game->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs 
            font-bold uppercase text-center">Editar</a>
            <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs 
            font-bold uppercase text-center">Eliminar</a>
        </div>
    </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay juegos disponibles.</p>
    @endforelse
</div>
<div class="mt-5">
    {{ $games->links() }}
</div>
