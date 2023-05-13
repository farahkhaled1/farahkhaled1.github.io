<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Scrape extends Model
{
    protected $table = 'synonyms'; // the name of the MySQL table where keywords are stored
    // protected $table2 ='given_niche';
    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getWords()
    {
        $user_id = Auth::id();

        $words = DB::table('synonyms')
                    ->where('uid', $user_id)
                    ->orderBy('id', 'desc')
                    ->value('words');

        return static::where('words', $words) ->orderBy('id', 'desc')  ->take(35)->get(['words_before', 'words_after']);
        // return view('analyzer', ['result' => $data]);

    }
    // protected $table = 'synonyms'; // the name of the MySQL table where keywords are stored
    // protected $table2 ='given_url';
    // /**
    //  * Retrieve keywords for the 'cars' niche.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Collection
    //  */
    // public static function getWords()
    // {
    //     $user_id = Auth::id();

    //     $words = DB::table('synonyms')
    //     ->where('uid', $user_id)
    //     ->orderBy('id', 'desc')
    //     ->value('words');

    //     return static::where('words', $words) ->orderBy('id', 'desc')  ->take(35)->get(['words']);

    // }

    // public static function getWordsAfter()
    // {
    //     $user_id = Auth::id();

    //     $words_after = DB::table('synonyms')
    //     ->where('uid', $user_id)
    //     ->orderBy('id', 'desc')
    //     ->value('words_after');

    //     return static::where('words_after', $words_after) ->orderBy('id', 'desc')  ->take(35)->get(['words_after']);

    // }
    // public static function getWordsBefore()
    // {
    //     $user_id = Auth::id();

    //     $words_before = DB::table('synonyms')
    //     ->where('uid', $user_id)
    //     ->orderBy('id', 'desc')
    //     ->value('words_before');

    //     return static::where('words_before', $words_before) ->orderBy('id', 'desc')  ->take(35)->get(['words_before']);

    // }


}

?>