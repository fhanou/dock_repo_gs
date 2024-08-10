<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Immobilier extends Model{
    public static function getImmobilier(){
        $_sQl = "SELECT * FROM immobiliers";
        $result = DB::select($_sQl);
        return $result;
    } 

    public static function getCompte(){
        $_sQl = "SELECT COUNT(*) AS 'nbr' FROM `immobiliers` ";
        $result = DB::select($_sQl);

        $nbr = 0;
        foreach($result as $results){
            $nbr = $results->nbr;
        }
        return $nbr; 
    } 
}
