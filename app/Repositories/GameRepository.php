<?php
namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
    public function all()
    {
        return Game::all();
    }

    public function find($id)
    {
        return Game::find($id);
    }

    public function create(array $data)
    {
        return Game::create($data);
    }
}