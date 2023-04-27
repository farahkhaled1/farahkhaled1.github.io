<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Niche extends Model
{
    protected $table2 ='given_niche';
    /**
     * Retrieve keywords for the 'cars' niche.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLastNiche()
    {
        $niche = DB::table('given_niche')
                    ->orderBy('id', 'desc')
                    ->value('niche');

        return $niche;

    }
}

?>
