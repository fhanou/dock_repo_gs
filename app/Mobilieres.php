<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Mobilieres extends Model
{
    public static function getMobilier(){
        $_sQl = "SELECT * FROM mobiliers" ;

        $result = DB::select($_sQl);
        return $result;
    }

}
