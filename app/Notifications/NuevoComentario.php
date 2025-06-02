<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoComentario extends Notification
{
    use Queueable;

    private $id_game;
    private $nombre_game;
    private $usuario_id;
    public function __construct($id_game, $nombre_game, $usuario_id)
    {
        $this->id_game = $id_game;
        $this->nombre_game = $nombre_game;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notificaciones');
        return (new MailMessage)
                    ->line('Has recibido un nuevo comentario en tu juego.')
                    ->line('El juego es: ' . $this->nombre_game)
                    ->action('Ver Notificaciones', $url)
                    ->line('Gracias por su comentario!');
    }
    //Almacena las notificaciones en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'id_game' => $this->id_game,
            'nombre_game' => $this->nombre_game,
            'usuario_id' => $this->usuario_id
        ];
    }
}
