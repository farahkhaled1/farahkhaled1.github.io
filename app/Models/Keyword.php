<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords'; // the name of the MySQL table where keywords are stored

    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getCarsKeywords()
    {
        // return static::where('niche', 'cars')->get(['word', 'average_tfidf', 'max_tfidf', 'frequency']);
        return static::where('niche', 'cars')->get(['word', 'average_tfidf', 'max_tfidf', 'frequency']);

    }
}

?>
