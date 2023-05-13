<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Keyword_ar extends Model
{
    protected $table = 'keyword_ar'; // the name of the MySQL table where keywords are stored
    protected $table2 ='given_niche_ar';
    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getKeywords()
    {
        $user_id = Auth::id();

        $niche = DB::table('given_niche_ar')
                    ->where('uid', $user_id)
                    ->orderBy('id', 'desc')
                    ->value('niche');

        return static::where('niche', $niche) ->orderBy('id', 'desc')  ->take(35)->get(['word', 'average_tfidf', 'max_tfidf', 'frequency']);
        // return view('analyzer', ['result' => $data]);

    }

//     public static function getBestKeyword(){
//         $userId = Auth::id();
// $niche = Niche::getLastNiche();
// $highestTfidfKeyword = DB::table('keywords')
//                         ->where('uid', $userId)
//                                             ->where('niche', $niche)
//                                             ->orderBy('max_tfidf', 'desc')
//                                             ->first()
//                                             ->word;
// return $highestTfidfKeyword;
                    

//     }
}

?>
