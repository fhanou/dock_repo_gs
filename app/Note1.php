<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Note1 extends Model
{

    public static function getNote1($im){
        $_sQl = "SELECT n1.*
                FROM Note1s n1 
                WHERE n1.id = $im";

        $result = DB::select($_sQl);
        
        return $result; 
    }
    
    public static function getNote($im){
        $_sQl = "SELECT n1.* ,n2.*
                FROM Note1s n1 
                INNER JOIN Note2s n2 ON n1.id=n2.id
                WHERE n1.id = $im";

        $result = DB::select($_sQl);
        
        return $result; 
    }

    public static function getId($im){
        $_sQl = "SELECT id FROM Note1s n1 
                INNER JOIN Note2s n2 ON n1.id=n2.id
                WHERE n1.id = $im";

        $result = DB::select($_sQl);
        
        
        $id = 0;
        foreach($result as $results){
            $id = $results->id;
        }
        
        return $id;
    }

    
}
