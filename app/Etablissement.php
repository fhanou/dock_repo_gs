<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Etablissement extends Model
{
    public static function getEtab($code_etab){
        $_sQl = "SELECT 
                        etab.code_etab,
                        etab.dir_dept,
                        etab.etab_tel,
                        etab.etab_email,
                        dren.dren,
                        dren.code_dren,
                        cisco.cisco,
                        cisco.code_cisco,
                        com.commune,
                        com.code_commune,
                        zap.zap,
                        zap.code_zap,
                        fkt.fokontany,
                        fkt.code_fokontany,
                        etab.etab_niveau2 as n2,
                        etab.etab_niveau3 as n3
                FROM t_etab etab 
                INNER JOIN t_dren dren ON etab.code_dren=dren.code_dren
                INNER JOIN t_cisco cisco ON etab.code_cisco=cisco.code_cisco
                INNER JOIN t_commune com ON etab.code_commune=com.code_commune
                INNER JOIN t_zap zap ON etab.code_zap=zap.code_zap
                INNER JOIN t_fokontany fkt ON etab.code_fokontany=fkt.code_fokontany 
                WHERE (etab.etab_niveau2 = 1 OR etab.etab_niveau3 = 1) AND etab.code_etab = $code_etab";
        $result = DB::select($_sQl);
        return $result;
    }

    public static function getNiveau(){
        $_sQl = "SELECT 
                    niveau as niveau
                 FROM etablissements LIMIT 1";
        $result = DB::select($_sQl);

        $niv = 0;
        if (count($result) > 0) {
            foreach ($result as $key) {
                $niv = (int)$key->niveau;
            }
        }

        return $niv;
    }

    public static function getEtablissement(){
        $_sQl = "SELECT 
                        etab.id_etab,
                        etab.code_etab,
                        etab.dir_dept,
                        etab.etab_tel,
                        etab.etab_email,
                        dren.dren,
                        cisco.cisco,
                        com.commune,
                        zap.zap,
                        fkt.fokontany,
                        etab.niveau
                FROM etablissements etab 
                INNER JOIN t_dren dren ON etab.code_dren=dren.code_dren
                INNER JOIN t_cisco cisco ON etab.code_cisco=cisco.code_cisco
                INNER JOIN t_commune com ON etab.code_commune=com.code_commune
                INNER JOIN t_zap zap ON etab.code_zap=zap.code_zap
                INNER JOIN t_fokontany fkt ON etab.code_fokontany=fkt.code_fokontany LIMIT 1 "; 
                
        $result = DB::select($_sQl);
        return $result;
    }



}
