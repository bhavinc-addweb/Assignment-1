<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class tic_taccontroller extends Controller
{
   public function index(Request $request)
    {
        $user = User::where('id',2)->get();
        return view('game', compact('user'));
    }   
}
