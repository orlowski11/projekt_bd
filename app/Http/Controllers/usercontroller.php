<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class usercontroller extends Controller
{
    public function index(){ // listowanie wszystkich uzytkownikow
        $users = users::all();
        dd($users);
    }
    
    public function search(){ // Wyszukiwarka uzytkownikow
        $users = users::all();
        
        return view('searchuser', compact('users'));
    }
    
    public function show($id){ // wyswietlanie konkretnego uzytkownika
        $user = users::findOrFail($id);
        
        return view('userpage', compact('user'));
    }
}
