<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Jugador;
use App\Notifications\NuevoComentario;
use Livewire\Component;

class PostularComentario extends Component
{
    public $comentario;
    public $game;

    protected $rules = ['comentario' => 'required|string|max:255'];

    public function mount(Game $game)
    {
        $this->game = $game;
    }

    public function comentar()
    {
        $datos = $this->validate();
        //Postular comentario   
        $this->game->jugadores()->create([
            'user_id' => auth()->user()->id,
            'comentario' => $datos['comentario'],
        ]);
        //Crear notificacion y enviar email
        $this->game->empresa->notify(new NuevoComentario($this->game->id, $this->game->titulo, auth()->user()->id));
        //Mostrar mensaje de éxito
        session()->flash('mensaje', 'Comentario enviado correctamente.');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-comentario');
    }
}