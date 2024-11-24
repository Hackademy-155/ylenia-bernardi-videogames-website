<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Console;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class GameController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return[
            /* new Middleware('auth'), -> blocca tutte le pagine ai guest */ 
            new Middleware('auth', only:['create']),
        ];
    }

    public function create(){
        $consoles = Console::all();
        return view('game.create', compact('consoles'));
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
            'released' => $request->released,
            'cover'=> $request->file('cover')->store('covers-games','public'),
            'user_id'=> Auth::user()->id
        ]);

        $game->consoles()->attach($request->consoles);
        return redirect(route('homepage'))->with('message', 'Il tuo gioco è stato inserito con successo.');
    }

    public function index(){
        $games = Game::all();
        /* return view('game.index', ['games'=> $games]); */
        return view('game.index', compact('games'));
    }

    /* funzione show rinominata "details" */
    public function details(Game $game){
        $consoles = $game->consoles;
        return view('game.details', compact('game','consoles'));
    }

    public function edit(Game $game){
        $consoles = Console::all();
        return view('game.edit', compact('game','consoles'));
    }

    public function update(Request $request, Game $game){
        $game->update([
            'title' => $request->title,
            'producer' => $request->producer,
            'price' => $request->price,
            'description' => $request->description,
            'released' => $request->released,
            'cover' => $request->file('cover') ? $request->file('cover')->store('covers-games', 'public') : $game->cover
        ]);

        $game->consoles()->detach();
        $game->consoles()->attach($request->consoles);
        return redirect(route('game.details', ['game' => $game->id]))->with('message', 'Il gioco è stato modificato con successo.');
    }
    

    public function delete(Game $game){
        $game->consoles()->detach();
        $game->delete();
        return redirect(route('game.index'))->with('message', 'Il gioco è stato eliminato con successo.');
    }
}
