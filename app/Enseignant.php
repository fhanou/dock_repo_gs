<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enseignant extends Model
{
    public static function getEnseignant(){
       $_sQl = "SELECT 
                        ens.id,
                        ens.cin,
                        ens.nom,
                        ens.prenoms,
                        ens.date_nais,
                        ens.sexe,
                        ens.adresse,
                        fonct.nom_fonction,
                        stat.libelle_statu,
                        mat.libelle,
                        ens.date_prise_service,
                        ens.num_tel 
                FROM enseignants ens 
                INNER JOIN matieres mat ON ens.id_matiere=mat.id_matiere
                    JOIN t_fonction fonct ON ens.id_fonction=fonct.id_fonction
                    JOIN t_statut stat ON ens.id_statu=stat.id_statu";

        $result = DB::select($_sQl);
        return $result;
    }

    public static function getTous(){
       $_sQl = "SELECT 
                        ens.id,
                        ens.cin,
                        ens.nom,
                        ens.prenoms,
                        ens.date_nais,
                        ens.lieu_nais,
                        ens.sexe,
                        ens.adresse,
                        fonct.nom_fonction,
                        stat.libelle_statu,
                        mat.libelle,
                        ens.date_prise_service,
                        ac.diplome,
                        pd.diplome,
                        ens.num_tel 
                FROM enseignants ens 
                INNER JOIN matieres mat ON ens.id_matiere=mat.id_matiere
                    JOIN t_fonction fonct ON ens.id_fonction=fonct.id_fonction
                    JOIN t_statut stat ON ens.id_statu=stat.id_statu
                    JOIN t_liste_diplome_ac ac ON ens.codediplomeac=ac.codediplomeac
                    JOIN t_liste_diplome_pd pd ON ens.codediplomepd=pd.codediplomepd";

        $result = DB::select($_sQl);
        return $result;
    }

     public static function getCompte(){
        $_sQl = "SELECT COUNT(*) AS 'nbr' FROM `enseignants` ";
        $result = DB::select($_sQl);

        $nbr = 0;
        foreach($result as $results){
            $nbr = $results->nbr;
        }
        

        return $nbr; 
    }
}