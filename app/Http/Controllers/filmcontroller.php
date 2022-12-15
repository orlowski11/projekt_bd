<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\film;

class filmcontroller extends Controller
{
    
    public function search(){ 
        $film = film::all();
        
        return view('searchfilm', compact('film'));
    }
    
    public function show($id){ 
        $film = film::findOrFail($id);
        
        return view('filmpage', compact('film'));
    }
}
