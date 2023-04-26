<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class LoadTimeController extends Controller
{

    
    public function front(){
        return view('loadtime');
    }
    
    public function back(Request $request){
        $url = $request->url;
        $regex = '/^[a-zA-Z0-9]+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/i';
          // Validate URL with regex
    if (!preg_match($regex, $url)) {
        return view('loadtime', ['back' => 'Invalid URL format.']);
    }

        $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $start_time = microtime(true);
    $response = curl_exec($ch);
    $end_time = microtime(true);
    curl_close($ch);
    
    // Calculate the load time
    $load_time = $end_time - $start_time;
    $load_time_sec = round($load_time, 2);  



    // if ($load_time_sec == 0) {
    //     return view('loadtime', ['back' => 'This domain does not exist.']);
    // } 
    // else {
    return view('loadtime', ['back' => $load_time_sec ]);
    // }

    // return view('loadtime', ['back' => $load_time_sec]);

     
    }
}
