<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Utilisateur extends Model
{
    
    public static function getUtilisateur(){
        $_sQl = "SELECT * FROM users" ;

        $result = DB::select($_sQl);
        return $result;
    }
}
