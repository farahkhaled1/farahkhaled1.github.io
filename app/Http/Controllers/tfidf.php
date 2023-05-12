<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class tfidf extends Controller
{
    
    public function index(){

        
        return redirect('http://127.0.0.1:4000/tfidf');
        
        // return view('tfidf');
    }


}
