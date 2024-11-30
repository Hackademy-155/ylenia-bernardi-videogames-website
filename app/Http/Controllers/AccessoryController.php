<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AccessoryController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return[
            /* new Middleware('auth'), -> blocca tutte le pagine ai guest */ 
            new Middleware('auth'),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = Accessory::all();
        return view('accessory.index', compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accessory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Accessory $accessory)
    {
        return view('accessory.show', compact('accessory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessory $accessory)
    {
        return view('accessory.edit', compact('accessory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accessory $accessory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessory $accessory)
    {
        //
    }
}
