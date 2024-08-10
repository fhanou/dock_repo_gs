<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coefficient extends Model
{
    public static function getMatiereCoef($classe,$niv){
        $_sQl = "SELECT 
                    m.libelle as libelle,
                    m.name as cles,
                    c.$classe as coef
                    
                 FROM matieres m
                 INNER JOIN coefficients c ON m.id_matiere = c.id_matiere 
                 WHERE m.niveau_".$niv."=1";

        $result = DB::select($_sQl);
        return $result;
    }

    public static function getNote($classe,$niv){
        $matiers = Coefficient::getMatiereCoef($classe,$niv);
        $_sQl = "SELECT n1.id,el.nom as nom_eleve,el.prenoms as prenom_eleve,el.date_nais as nais_eleve,el.lieu_nais as lieu_eleve,cl.nom_classe as classe_eleve,el.sexe as sexe_eleve,el.id as im_eleve";
        foreach ($matiers as $key) {
            $_sQl .= ",n1.".$key->cles." as ".$key->cles."_1, n2.".$key->cles." as ".$key->cles."_2,((n1.".$key->cles."+n2.".$key->cles.")/2) as moyenne_".$key->cles.",(((n1.".$key->cles."+n2.".$key->cles.")/2)*".$key->coef.") as total_note_".$key->cles.",0";
        }
        foreach ($matiers as $key) {
            $_sQl .= "+".$key->coef."";
        }
        $_sQl .= " as total_coef,0+";
        foreach ($matiers as $key) {
            $_sQl .= "+(((n1.".$key->cles."+n2.".$key->cles.")/2)*".$key->coef.")";
        }
        $_sQl .= "as grand_total FROM note1s n1 
                    INNER JOIN note2s n2 ON n1.id = n2.id
                    INNER JOIN eleves el ON el.id = n1.id
                    INNER JOIN classes cl ON el.id_classe = cl.id_classe
                    WHERE cl.nom_classe='".$classe."'
                    ORDER BY grand_total DESC";

        $result = DB::select($_sQl);
        return $result;
    }
}


