<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Blog extends Model
{
    protected $table = 'blog'; // the name of the MySQL table where keywords are stored
  
    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function get_blog()
    {
        $user_id = Auth::id();

        $blog = DB::table('blog')
                    ->where('uid', $user_id);
                    

        return $blog;
        // return view('analyzer', ['result' => $data]);

    }


}

?>
