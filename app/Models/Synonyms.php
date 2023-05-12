<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Synonyms extends Model
{

    public static function getSynonyms()
    {
        $user_id = Auth::id();

        $url = DB::table('given_url')
                    ->where('uid', $user_id)
                    ->orderBy('id', 'desc')
                    ->value('url');

                    return $url;
    }
}

?>
