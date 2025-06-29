<?php

namespace App\Listeners;

use App\Events\GameCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendGameCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }
    public function handle(GameCreated $event)
    {
        // Aquí puedes enviar una notificación, email, etc.
        Log::info('Nuevo juego creado: ' . $event->game->titulo);
    }
}
