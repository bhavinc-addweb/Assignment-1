<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapdemo;

class MapController extends Controller
{
    public function index(Request $request)
    {
    	$data = Mapdemo::all();
    	return view('dashboard',compact(data));
    }

}
