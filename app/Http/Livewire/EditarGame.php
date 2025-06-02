<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Game;
use Carbon\Carbon;
use Livewire\Component;

class EditarGame extends Component
{
    public $game_id;
    public $titulo;
    public $desarrolladora;
    public $categoria;
    public $fechalanzamiento;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    protected $rules = [
        'titulo' => 'required|string|min:3|max:100',
        'desarrolladora' => 'required|string|min:3|max:100',
        'categoria' => 'required',
        'fechalanzamiento' => 'required',
        'descripcion' => 'required|min:10|max:500',
        'imagen' => 'nullable|image|max:1024' // 1MB Max
    ];
    
    public function mount(Game $game)
    {
        $this->game_id = $game->id;
        $this->titulo = $game->titulo;
        $this->desarrolladora = $game->desarrolladora;
        $this->categoria = $game->categoria_id;
        $this->fechalanzamiento = Carbon::parse($game->fechalanzamiento)->format('Y-m-d');
        $this->descripcion = $game->descripcion;
        $this->imagen = $game->imagen;
    }
    public function editarGame(){
        $datos = $this->validate();
        //Si hay una nueva Imagen
        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/games');
            $datos['imagen'] = str_replace('public/games/', '', $imagen);
        } 
        //Encontrar el juego a editar
        $game = Game::find($this->game_id);
        //Asignar los valores
        $game->titulo = $datos['titulo'];
        $game->desarrolladora = $datos['desarrolladora'];
        $game->categoria_id = $datos['categoria'];
        $game->fechalanzamiento = $datos['fechalanzamiento'];
        $game->descripcion = $datos['descripcion'];
        $game->imagen = $datos['imagen'] ?? $game->imagen; // Mantener la imagen actual si no se subió una nueva
        //Guardar la vacante
        $game->save();
        //Redireccionar
        session()->flash('mensaje', 'Juego editado correctamente');
        return redirect()->route('games.index');
    }
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.editar-game', [
            'categorias' => $categorias,
        ]);
    }
}
