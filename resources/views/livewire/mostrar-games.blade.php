<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Filtrar por rango de fechas</h2>
            <div class="flex gap-4 items-center">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Desde:</label>
                    <input type="date" wire:model="fechaInicio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hasta:</label>
                    <input type="date" wire:model="fechaFin" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
        </div>

        @if($juegoMasComentadoHoy)
            <div class="bg-yellow-100 p-4 rounded-lg shadow mb-6">
                <h2 class="text-lg font-bold text-yellow-900 mb-2">
                    Juego más comentado hoy
                </h2>
            <a href="{{ route('games.show', $juegoMasComentadoHoy->id) }}" class="text-2xl font-bold text-gray-800">
                {{ $juegoMasComentadoHoy->titulo }}
            </a>
            <p class="text-sm text-gray-600">Desarrolladora: {{ $juegoMasComentadoHoy->desarrolladora }}</p>
            <p class="text-sm text-gray-600">Comentarios hoy: {{ $juegoMasComentadoHoy->jugadores_count }}</p>
            </div>
        @endif
        @if($juegoMasComentadoEnRango)
            <div class="bg-green-100 p-4 rounded-lg shadow mb-6">
                <h2 class="text-lg font-bold text-green-900 mb-2">Juego más comentado en el rango</h2>
                <a href="{{ route('games.show', $juegoMasComentadoEnRango->id) }}" class="text-2xl font-bold text-gray-800">
                    {{ $juegoMasComentadoEnRango->titulo }}
                </a>
                <p class="text-sm text-gray-600">Desarrolladora: {{ $juegoMasComentadoEnRango->desarrolladora }}</p>
                <p class="text-sm text-gray-600">Comentarios: {{ $juegoMasComentadoEnRango->jugadores_count }}</p>
            </div>
        @endif

        @forelse ($games as $game)      
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between
        md:items-center">
            <div class="space-y-3">
                <a href="{{route('games.show', $game->id)}}" class="text-xl font-bold">
                    {{ $game->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{$game->desarrolladora}}</p>
                <p class="text-sm text-gray-500">Fecha de Lanzamiento: {{$game->fechalanzamiento->format('d/m/Y')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                <a href="{{route('jugadores.index', $game)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs 
                font-bold uppercase text-center">
                {{$game->jugadores->count()}}
                Comentarios</a>
                <a href="{{route('games.edit', $game->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs 
                font-bold uppercase text-center">Editar</a>
                <button wire:click="$emit('mostrarAlerta', {{ $game->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs 
                font-bold uppercase text-center">Eliminar</button>
            </div>
        </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay juegos disponibles.</p>
        @endforelse
    </div>
    <div class="mt-5">
        {{ $games->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', gameId => {
            Swal.fire({
                title: 'Eliminar Juego?',
                text: "Esta accion no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar Juego
                Livewire.emit('eliminarGame', gameId);
                Swal.fire(
                    'Se elimino el Juego!',
                    'Eliminado Correctamente',
                    'success'
                    )
                }
            })
        });
    </script>
@endpush