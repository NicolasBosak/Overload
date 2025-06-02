<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('games.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('games.create');
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
