<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $game->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Desarrolladora: 
                <span class="normal-case font-normal">{{ $game->desarrolladora }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Fecha de Lanzamiento: 
                <span class="normal-case font-normal">{{ $game->fechalanzamiento->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria: 
                <span class="normal-case font-normal">{{ $game->categoria->categoria }}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-4">
            <img src="{{ asset('storage/games/' . $game->imagen) }}" alt={{'Imagen de ' . $game->titulo}}>
        </div>
        <div class="md:col-span-2">
            <h2 class="text-2xl font-bold mb-5">Descripción del Juego</h2>
            <p>{{$game->descripcion}}</p>
        </div>
    </div>
</div>
