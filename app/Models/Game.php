<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $casts = ['fechalanzamiento' => 'date',];

    protected $fillable = [
        'titulo',
        'desarrolladora',
        'categoria_id',
        'fechalanzamiento',
        'descripcion',
        'imagen',
        'user_id'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public  function jugadores()
    {
        return $this->hasMany(Jugador::class)->orderBy('created_at', 'DESC');
    }
    public function empresa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
