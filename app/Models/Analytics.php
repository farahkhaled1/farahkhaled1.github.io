<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Analytics extends Model
{
    protected $table = 'domain_analytics'; 
    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAnalytics()
    {
        $uid = Auth::id();

        $analytics = DB::table('domain_analytics')
                    ->where('uid', $uid);

        return static::where('uid', $uid) ->get(['id','domain_url', 'domain_rank', 'domain_auth', 'ctr_scope']);

    }


    // public static function getDetails($domain_url)
    // {
    //     return static::where('domain_url', $domain_url)->get();
    // }

    public static function getDetails()

{

   $domain_url= DB::table('domain_url');
    
   return static::where('domain_url', $domain_url) -> get(['id','domain_url', 'domain_rank', 'domain_auth', 'ctr_scope']);
}

    
    


}

?>
