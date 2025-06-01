<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Game;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearGame extends Component
{
    public $titulo;
    public $desarrolladora;
    public $categoria;
    public $fechalanzamiento;
    public $descripcion;
    public $imagen;
    use WithFileUploads;
    //Validacion de campos
    protected $rules = [
        'titulo' => 'required|string|min:3|max:100',
        'desarrolladora' => 'required|string|min:3|max:100',
        'categoria' => 'required',
        'fechalanzamiento' => 'required',
        'descripcion' => 'required|min:10|max:500',
        'imagen' => 'required|image|max:1024', // 1MB Max
    ];
    public function crearGame()
    {
        $datos = $this->validate();
        //Almacenar la imagen
        $imagen = $this->imagen->store('public/games');
        $nombre_imagen = str_replace('public/games/', '', $imagen);
        //Crear el Juego
        Game::create([
            'titulo' => $datos['titulo'],
            'desarrolladora' => $datos['desarrolladora'],
            'categoria_id' => $datos['categoria'],
            'fechalanzamiento' => $datos['fechalanzamiento'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,          
        ]);
        //Crear un mensaje de éxito
        session()->flash('mensaje', 'Juego publicado correctamente');
        //Redireccionar al usuario
        return redirect()->route('games.index');
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
