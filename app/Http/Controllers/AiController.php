<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class AiController extends Controller
{
    public function show(){
        return view('laravel-examples.ai');
    }
    
    public function display(Request $request){

        $topic = $request->topic;
        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
        $promt="Create blog ideas about ". $topic." \n";

        $openAiOutput = $open_ai->complete([
            'engine' => 'davinci-instruct-beta-v3',
            'prompt' => $promt,
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        
        $output= json_decode($openAiOutput,true);
        $outputText= $output['choices'][0]['text'];

        return view('laravel-examples.ai',['display'=> $outputText]);
    }
}
