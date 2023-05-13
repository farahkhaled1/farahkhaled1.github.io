<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Niche_ar extends Model
{
    protected $table2 = 'given_niche_ar';
    
    /**
     * Retrieve the last niche for the currently authenticated user.
     *
     * @return string|null
     */
    public static function getLastNiche()
    {
        $user_id = Auth::id();
        $niche = DB::table('given_niche_ar')
                    ->where('uid', $user_id)
                    ->orderBy('id', 'desc')
                    ->value('niche');

        return $niche;
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;


// class Niche extends Model
// {
//     protected $table2 ='given_niche';
//     /**
//      * Retrieve keywords for the 'cars' niche.
//      *
//      * @return \Illuminate\Database\Eloquent\Collection
//      */
//     public static function getLastNiche()
//     {
//         $niche = DB::table('given_niche')
//                     ->orderBy('id', 'desc')
//                     ->value('niche');

//         return $niche;

//     }
// }

?>
