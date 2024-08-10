<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Note2 extends Model
{
    public static function getNote2($im){
        $_sQl = "SELECT n2.*
                FROM Note2s n2 
                WHERE n2.id = $im";

        $result = DB::select($_sQl);
        
        return $result; 
    }
}
