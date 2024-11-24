<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ConsoleController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return[
            /* new Middleware('auth'), -> blocca tutte le pagine ai guest */ 
            new Middleware('auth', only:['create']),
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consoles = Console::all();
        return view('console.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        return view('console.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $console=Console::create([
            'name'=> $request->name,
            'brand'=> $request->brand,
            'photo'=> $request->file('photo')->store('photo-consoles','public'),
            'logo'=> $request->file('logo')->store('logo-consoles','public'),
            'description'=> $request->description
        ]);

        $console->games()->attach($request->games);
        return redirect(route('homepage'))->with('message', 'La tua console è stata inserita con successo.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Console $console)
    {
        $games = $console->games;
        return view('console.show', compact('console','games'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Console $console)
    {
        $games = Game::all();
        return view('console.edit', compact('console', 'games'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Console $console)
    {
        $console->update([
            'name'=> $request->name,
            'brand'=> $request->brand,
            'photo'=> $request->file('photo') ? $request->file('photo')->store('photo-consoles', 'public') : $console->photo,
            'logo'=>  $request->file('logo') ? $request->file('logo')->store('logo-consoles', 'public') : $console->logo,
            'description'=> $request->description,
        ]);

        $console->games()->detach();
        $console->games()->attach($request->games);
        return redirect(route('homepage'))->with('message', 'La console è stata modificata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Console $console)
    {
        $console->games()->detach();
        $console->delete();
        return redirect(route('console.index'))->with('message', 'La console è stata eliminata con successo.');
    }
}
