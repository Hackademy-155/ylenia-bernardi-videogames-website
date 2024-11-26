<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return[
            new Middleware('auth', only:['dashboard'])
        ];
    }

    public function homepage(){
        return view('welcome');
    }

    public function dashboard(User $user){
        return view('auth.dashboard', compact('user'));
    }
}
