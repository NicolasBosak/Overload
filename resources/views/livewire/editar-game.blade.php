<form class="md:w-1/2 spcace-y-5" wire:submit.prevent="editarGame">
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
                <livewire:mostrar-alerta :message="$message"/>
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
            @error('desarrolladora')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror      
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
            @error('categoria')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror             
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
            @error('fechalanzamiento')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror                    
        </div>
        <div>
            <x-input-label for="descripcion" :value="__('Descripcion del Juego')" />
            <textarea
                wire:model="descripcion"
                placeholder="Descripcion del Juego"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72">
            </textarea>    
            @error('descripcion')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror         
        </div>
        <div>
            <x-input-label for="imagen" :value="__('Imagen del Juego')" />
            <x-text-input 
            id="imagen" 
            class="block mt-1 w-full my-5" 
            type="file" 
            wire:model="imagen_nueva"
            accept="image/*"/> 
            <div class="my-5 w-80">
                <x-input-label :value="__('Imagen Actual')" />
                <img src="{{ asset('storage/games/' . $imagen) }}" alt="Imagen del Juego {{ $titulo }}">
            </div>

            <div class="my-5 w-80">
                @if ($imagen_nueva)
                    Imagen Nueva:
                    <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="Imagen del Juego" class="w-full h-auto">
                @endif
            </div>

            @error('imagen_nueva')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror                
        </div>
        <x-primary-button class="w-full justify-center">
            Guardar Cambios
        </x-primary-button>
</form>
