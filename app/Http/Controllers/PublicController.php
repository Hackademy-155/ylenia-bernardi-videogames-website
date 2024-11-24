<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return[
            new Middleware('auth')
        ];
    }

    public function homepage(){
        return view('welcome');
    }

    public function dashboard(){
        return view('auth.dashboard');
    }
}
