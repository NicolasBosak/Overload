<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CrearGame extends Component
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
        'descripcion' => 'required|min:10|max:500',
        'imagen' => 'required',
    ];
    public function crearGame()
    {
        $datos = $this->validate();
    }
    public function render()
    {
        //Consultar BD
        $categorias = Categoria::all();

        return view('livewire.crear-game', [
            'categorias' => $categorias,
        ]);
    }
}
