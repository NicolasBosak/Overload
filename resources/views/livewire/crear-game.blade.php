<form class="md:w-1/2 spcace-y-5">
        <div>
            <x-input-label for="titulo" :value="__('Titulo Juego')" />
            <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            name="titulo" 
            :value="old('titulo')" 
            placeholder="Titulo Juego" />           
        </div>
        <div>
            <x-input-label for="desarrolladora" :value="__('Desarrolladora')" />
            <x-text-input 
            id="desarrolladora" 
            class="block mt-1 w-full" 
            type="text" 
            name="desarrolladora" 
            :value="old('desarrolladora')" 
            placeholder="Desarrolladora: ej. Playstation, Bethesda, FromSoftware." />           
        </div>
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select 
                id="categoria" 
                name="categoria" 
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-500 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            </select>         
        </div>
        <div>
            <x-input-label for="fechalanzamiento" :value="__('Fecha de Lanzamiento')" />
            <input 
                id="fechalanzamiento" 
                class="block mt-1 w-full"
                type="date"
                name="fechalanzamiento" 
                :value="old('fechalanzamiento')">
        </input>         
        </div>
        <div>
            <x-input-label for="descripcion" :value="__('Descripcion Juego')" />
            <textarea
                name="descripcion"
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
            name="imagen"/>           
        </div>
        <x-primary-button class="w-full justify-center">
            Crear Juego
        </x-primary-button>
</form>
