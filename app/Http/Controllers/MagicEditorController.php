<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use App\Models\Keyword;
use Illuminate\Support\Arr;

class MagicEditorController extends Controller
{
    public function sendSentence(Request $request)
    {
        $keywords = [];

        foreach (Keyword::getKeywords() as $keyword) {
            $keywords[] = $keyword->word;
        }

        $keywordsString = implode(', ', $keywords);

        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
        $response = $open_ai->complete([
                    'engine'=>"text-davinci-003",
                    'prompt'=>"generate a well-crafted blog with the following words. The words you should include are:". $keywordsString,
                    'temperature'=>1,
                    'max_tokens'=>256,
                    'top_p'=>1,
                    'frequency_penalty'=>0,
                    'presence_penalty'=>0
                ]);

        $output= json_decode($response,true);
        $outputText= $output['choices'][0]['text'];

        return view('magiceditor')->with('outputText', $outputText);
    }

    
}

    // Add this method to your controller


    // public function sendSentence(Request $request)
    // {
    //     $inputKeywords = $request->input('keywords');
    //     $keywords = Keyword::whereIn('id', $inputKeywords)->pluck('word')->toArray();

    //     $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
      
    //     $response = $open_ai->complete([
    //         'model'=>"text-davinci-003",
    //         'prompt'=>"generate coherent sentences with the following words that would form a piece of text:\nunited\nsee\nwhite\nend\nobsidian\ngreen\none\ninfo\nfluorite\nminerals\nstone\npurple\nalso\nred\nhome\nmake\nclear\nidentify\nblack\neye\ncolor\nlike\nquartz\nnew\ncontact\nrose\nshop\nblue\nuse\namethyst\nlearn\ncrystals\nstones\ncrystal\n\nHave you ever wanted to learn about crystals and stones? A quick look reveals a world of colorful fluorescence, from the reddish-pink of Rose Quartz to the sparkly Purple Amethyst. United together, they make a wonderful home decoration, or give a crystal collector a new way to identify and contact new minerals. Even the common white Quartz and Obsidian, as well as the bright Green Fluorite and the deep Black Obsidian draw one in with its unique crystal clarity. Even the most experienced crystal collector may find it beneficial to give their eyes a rest and use color to identify stones. Incorporating colors like Purple, Blue and Red in the quartz, rose and amethyst can also make it easier to learn and identify the crystal's unique characteristics. With a crystal eye, it's easy to see and learn all about the new and old crystals and stones.",
    //         'temperature'=>1,
    //         'max_tokens'=>256,
    //         'top_p'=>1,
    //         'frequency_penalty'=>0,
    //         'presence_penalty'=>0
    //     ]);
    //     $sentences = Arr::pluck($response['choices'], 'text');

    //     $blogContent = implode("\n\n", $sentences);

    //     // return view('editor', compact('keywords', 'blogContent'));
    //     // $blogContent = "test tes test est etst test ";

    //     return view('editor',['display'=> $blogContent]);
    // }

// }

  // $maxTokens = 50;
        // $temp = 0.6;
        // $prompt = 'Create a sentence using the following words: ' . implode(', ', $keywords);
