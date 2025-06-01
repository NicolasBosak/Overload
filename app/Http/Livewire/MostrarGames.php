<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\Component;

class MostrarGames extends Component
{
    public function render()
    {
        $games = Game::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-games',[
            'games' => $games,
        ]);
    }
}
