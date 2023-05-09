<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Niche extends Model
{
    protected $table = 'given_niche';

    public static function getLastNiche()
    {
        $user_id = auth()->id(); // get the user ID
        $niche = DB::table('given_niche')
            ->orderBy('id', 'desc')
            ->value('niche');

        Session::put("user_$user_id.niche", $niche); // store the niche value in the user's session

        return $niche;
    }
}
?>

<?
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