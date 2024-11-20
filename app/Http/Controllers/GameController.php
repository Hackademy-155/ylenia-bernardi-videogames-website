<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create(){
        return view('game.create');
    }

    public function store(GameRequest $request){
        /*
            $game = new Game();
            $game->title = $request->title;
            $game->proudcer = $request->proudcer;
            $game->price = $request->price;
            $game->description = $request->description;
            $game->save();
        */

        $game=Game::create([
            'title'=> $request->title,
            'producer'=> $request->producer,
            'price'=> $request->price,
            'description'=> $request->description,
            'cover'=> $request->file('cover')->store('covers-games','public')
        ]);

        return redirect(route('homepage'))->with('message', 'Il tuo gioco è stato inserito con successo.');
    }

    public function index(){
        $games = Game::all();
        /* return view('game.index', ['games'=> $games]); */
        return view('game.index', compact('games'));
    }

    /* funzione show rinominata "details" */
    public function details(Game $game){
        return view('game.details', compact('game'));
    }

    public function edit(Game $game){
        return view('game.edit', compact('game'));
    }

    public function update(Request $request, Game $game){
        $game->update([
            'title' => $request->title,
            'producer' => $request->producer,
            'price' => $request->price,
            'description' => $request->description,
            'cover' => $request->file('cover') ? $request->file('cover')->store('covers-games', 'public') : $game->cover
        ]);
        return redirect(route('game.details', ['game' => $game->id]))->with('message', 'Il gioco è stato modificato con successo.');
    }
    

    public function delete(Game $game){
        $game->delete();
        return redirect(route('game.index'))->with('message', 'Il gioco è stato eliminato con successo.');
    }
}
