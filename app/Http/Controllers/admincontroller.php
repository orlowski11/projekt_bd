<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\film;

class admincontroller extends Controller
{
    
    public function show(){ 
        
        return view('adminpanel');
    }
    

}
