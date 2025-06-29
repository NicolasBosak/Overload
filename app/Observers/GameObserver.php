<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Facades\Log;

class GameObserver
{
    public function created(Game $game)
    {
        Log::info('Se ha creado un nuevo juego: ' . $game->titulo);
        // Aquí puedes agregar más acciones, como enviar notificaciones
    }

    /**
     * Handle the Game "updated" event.
     */
    public function updated(Game $game): void
    {
        //
    }

    /**
     * Handle the Game "deleted" event.
     */
    public function deleted(Game $game): void
    {
        //
    }

    /**
     * Handle the Game "restored" event.
     */
    public function restored(Game $game): void
    {
        //
    }

    /**
     * Handle the Game "force deleted" event.
     */
    public function forceDeleted(Game $game): void
    {
        //
    }
}
