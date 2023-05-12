<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class tfidf extends Controller
{
    
    public function index(){
   
// redirect into the flask webserver api
        return redirect('http://127.0.0.1:4000/tfidf');
        
        
    }


}
