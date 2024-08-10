<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Eleve extends Model
{
    public static function getEleve(){
    	$_sQl = "SELECT 
    					el.id,
    					cl.nom_classe,
                        cl.niveau_2,
                        cl.niveau_3,
    					el.nom,
    					el.prenoms,
    					el.date_nais,
    					el.lieu_nais,
    					el.adresse,
    					el.sexe,
    					el.status,
    					el.date_entree 
    			FROM eleves el 
    			INNER JOIN classes cl ON el.id_classe=cl.id_classe";


    	$result = DB::select($_sQl);
    	return $result;
    }

    public static function getCompte(){
        $_sQl = "SELECT COUNT(*) AS 'nbr' FROM `eleves` ";
        $result = DB::select($_sQl);

        $nbr = 0;
        foreach($result as $results){
            $nbr = $results->nbr;
        }
        

        return $nbr; 
    }

    public static function getListeParClasse($classe){
        $_sQl = "SELECT 
                        el.id,
                        cl.nom_classe,
                        el.nom,
                        el.prenoms,
                        el.date_nais,
                        el.lieu_nais,
                        el.adresse,
                        el.sexe,
                        el.status,
                        el.date_entree 
                FROM eleves el 
                INNER JOIN classes cl ON el.id_classe=cl.id_classe 
                WHERE cl.id_classe = $classe";


        $result = DB::select($_sQl);
        return $result;
    }

    public static function getClasse($im){
        $_sQl = "SELECT 
                        el.nom,
                        el.prenoms,
                        el.date_nais,
                        el.lieu_nais,
                        el.sexe,
                        el.id,
                        el.status,
                        cl.nom_classe as classe
                FROM eleves el 
                INNER JOIN classes cl ON el.id_classe=cl.id_classe
                WHERE el.id = $im";

        $result = DB::select($_sQl);

        $classe = "";
        foreach($result as $results){
            $classe = $results->classe;
        }
        
        return $classe; 
    }

     public static function getId($im){
        $_sQl = "SELECT id FROM eleves WHERE id = $im";

        $result = DB::select($_sQl);
        
        
        $id = 0;
        foreach($result as $results){
            $id = $results->id;
        }
        
        return $id;
    }



}
