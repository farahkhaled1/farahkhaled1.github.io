<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Keyword extends Model
{
    protected $table = 'keywords'; // the name of the MySQL table where keywords are stored
    protected $table2 ='given_niche';
    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getKeywords()
    {
        $user_id = Auth::id();

        $niche = DB::table('given_niche')
                    ->where('uid', $user_id)
                    ->orderBy('id', 'desc')
                    ->value('niche');

        return static::where('niche', $niche)->get(['word', 'average_tfidf', 'max_tfidf', 'frequency']);
        // return view('analyzer', ['result' => $data]);

    }
}

?>
