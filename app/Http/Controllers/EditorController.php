<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class EditorController extends Controller
{
    public function show(){
        return view('editor');
    }
    
    public function display(){

        $openai = new OpenAi('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');
        $words = ['list', 'of', 'words', 'goes', 'here'];
        $maxTokens = 50;
        $temp = 0.6;
        $prompt = 'Create a sentence using the following words: ' . implode(', ', $words);
        $response = $openai->complete(
            'gpt-3.5-turbo',
            [
                'prompt' => $prompt,
                'max_tokens' => $maxTokens,
                'temperature' => $temp,
                'n' => 1
            ]
        );
        $sentence = $response['choices'][0]['text'];

        return view('sentence', compact('sentence'));
    }
}
