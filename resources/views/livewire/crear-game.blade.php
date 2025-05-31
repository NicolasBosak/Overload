<form class="md:w-1/2 spcace-y-5" wire:submit.prevent="crearGame">
        <div>
            <x-input-label for="titulo" :value="__('Titulo Juego')" />
            <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            placeholder="Titulo Juego" />    
            @error('titulo')
                {{$message}}
            @enderror       
        </div>
        <div>
            <x-input-label for="desarrolladora" :value="__('Desarrolladora')" />
            <x-text-input 
            id="desarrolladora" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="desarrolladora" 
            :value="old('desarrolladora')" 
            placeholder="Desarrolladora: ej. Playstation, Bethesda, FromSoftware." />           
        </div>
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select 
                id="categoria" 
                wire:model="categoria" 
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                <option>--Seleccione una Categoria--</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>         
        </div>
        <div>
            <x-input-label for="fechalanzamiento" :value="__('Fecha de Lanzamiento')" />
            <input 
                id="fechalanzamiento" 
                class="block mt-1 w-full"
                type="date"
                wire:model="fechalanzamiento" 
                :value="old('fechalanzamiento')">
        </input>         
        </div>
        <div>
            <x-input-label for="descripcion" :value="__('Descripcion Juego')" />
            <textarea
                wire:modoel="descripcion"
                placeholder="Descripcion del Juego"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72">
            </textarea>       
        </div>
        <div>
            <x-input-label for="imagen" :value="__('Imagen del Juego')" />
            <x-text-input 
            id="imagen" 
            class="block mt-1 w-full my-5" 
            type="file" 
            wire:model="imagen"/>           
        </div>
        <x-primary-button class="w-full justify-center">
            Crear Juego
        </x-primary-button>
</form>
