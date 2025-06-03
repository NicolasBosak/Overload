<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class FiltrarGames extends Component
{
    public $termino;
    public $categoria;

    public function leerDatosFormulario()
    {
        $this->emit('terminosBusqueda', $this->termino, $this->categoria);
    }
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.filtrar-games', [
            'categorias' => $categorias,
        ]);
    }
}
