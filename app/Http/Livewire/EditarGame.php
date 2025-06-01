<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Game;
use Carbon\Carbon;
use Livewire\Component;

class EditarGame extends Component
{
    public $titulo;
    public $desarrolladora;
    public $categoria;
    public $fechalanzamiento;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required|string|min:3|max:100',
        'desarrolladora' => 'required|string|min:3|max:100',
        'categoria' => 'required',
        'fechalanzamiento' => 'required',
        'descripcion' => 'required|min:10|max:500'
    ];
    
    public function mount(Game $game)
    {
        $this->titulo = $game->titulo;
        $this->desarrolladora = $game->desarrolladora;
        $this->categoria = $game->categoria_id;
        $this->fechalanzamiento = Carbon::parse($game->fechalanzamiento)->format('Y-m-d');
        $this->descripcion = $game->descripcion;
        $this->imagen = $game->imagen;
    }
    public function editarGame(){
        $datos = $this->validate();
    }
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.editar-game', [
            'categorias' => $categorias,
        ]);
    }
}
