<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Comentario</h3>
    @if(session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100
        text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{session('mensaje')}}
        </p>        
    @else
        <form wire:submit.prevent='comentar' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="comentario" :value="__('Comentario')" />
            <textarea 
            id="comentario"
            wire:model="comentario"
            placeholder="Escribe algun comentario del juego...." 
            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm 
            focus:border-indigo-500 focus:ring-indigo-500" 
            rows="4"></textarea>
        </div>
        @error('comentario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
        <x-primary-button class="my-5">
            {{ __('Publicar Comentario') }}
        </x-primary-button>
    </form>
    @endif
</div>
