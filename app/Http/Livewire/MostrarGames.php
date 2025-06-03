<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Carbon\Carbon;
use Livewire\Component;

class MostrarGames extends Component
{
    public $fechaInicio;
    public $fechaFin;

    protected $listeners = ['eliminarGame'];
    public function eliminarGame(Game $game)
    {
        $game->delete();
    }

    public function getJuegoMasComentadoHoyProperty()
    {
        $hoy = Carbon::today();

        return Game::withCount(['jugadores' => function ($query) use ($hoy) {
            $query->whereDate('created_at', $hoy);
        }])
        ->orderByDesc('jugadores_count')
        ->first();
    }
    public function getJuegoMasComentadoEnRangoProperty()
    {
        if (!$this->fechaInicio || !$this->fechaFin) {
            return null;
        }

        return Game::withCount(['jugadores' => function ($query) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->fechaInicio)->startOfDay(),
                Carbon::parse($this->fechaFin)->endOfDay(),
            ]);
        }])
        ->orderByDesc('jugadores_count')
        ->first();
    }


    public function render()
    {
        $games = Game::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-games', [
            'games' => $games,
            'juegoMasComentadoHoy' => $this->juegoMasComentadoHoy,
            'juegoMasComentadoEnRango' => $this->juegoMasComentadoEnRango,
        ]);
    }
}
