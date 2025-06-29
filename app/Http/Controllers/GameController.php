<?php

namespace App\Http\Controllers;

use App\Events\GameCreated;
use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use App\Repositories\GameRepository;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class GameController extends Controller
{

    protected $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function index()
    {
        $games = $this->gameRepository->all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('viewAny', Game::class);
        return view('games.create');
    }

    public function store(StoreGameRequest $request)
    {
    $game = Game::create([
        'titulo' => $request->titulo,
        'desarrolladora' => $request->desarrolladora,
        'categoria_id' => $request->categoria_id,
        'fechalanzamiento' => $request->fechalanzamiento,
        'descripcion' => $request->descripcion,
        'imagen' => $request->imagen,
        'user_id' => auth()->id(),
    ]);
    // Lanza el evento
    event(new GameCreated($game));
    return redirect()->route('games.index')->with('success', 'Juego creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show',[
            'game' => $game,
        ]);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $this->authorize('update', $game);

        return view('games.edit',[
            'game' => $game,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    } 
}
