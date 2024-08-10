<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Mobilier extends Model
{
    public static function getMobilier(){
        $_sQl = "SELECT * FROM mobiliers" ;

        $result = DB::select($_sQl);
        return $result;
    }

    public static function getCompte(){
        $_sQl = "SELECT COUNT(*) AS 'nbr' FROM `mobiliers`";
        $result = DB::select($_sQl);

        $nbr = 0;
        foreach($result as $results){
            $nbr = $results->nbr;
        }
        return $nbr; 
    }

    

}
