<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\Component;

class HomeGames extends Component
{

    public $termino;
    public $categoria;

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
    }

    public function render()
    {
        //$games = Game::all();
        $games = Game::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->termino, function($query){
            $query->orWhere('desarrolladora', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->paginate(10);
        return view('livewire.home-games', ['games'=> $games]);
    }
}
