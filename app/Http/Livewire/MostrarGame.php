<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarGame extends Component
{
    public $game;
    public function render()
    {
        return view('livewire.mostrar-game');
    }
}
