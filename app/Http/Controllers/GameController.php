<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create(){
        return view('game.create');
    }

    public function store(Request $request){
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
}
