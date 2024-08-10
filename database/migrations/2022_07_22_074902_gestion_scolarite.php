<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GestionScolarite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiliers', function (Blueprint $table) {
            $table->increments("id");
            $table->string("libelle_mobilier");
            $table->integer("total_mobilier");
            $table->integer("bon_mobilier");
            $table->integer("mauvais_mobilier");
            $table->timestamps();
        });

        Schema::create('immobiliers', function (Blueprint $table) {
            $table->increments("id");
            $table->string("libelle_immobilier");
            $table->integer("total_immobilier");
            $table->integer("bon_immobilier");
            $table->integer("mauvais_immobilier");
            $table->timestamps();
        });

        Schema::create('etablissements', function (Blueprint $table) {
            $table->increments("id_etab");
            $table->integer("code_etab")->index();
            $table->integer("code_dren")->index();
            $table->integer("code_cisco")->index();
            $table->integer("code_commune")->index();
            $table->integer("code_zap")->index();
            $table->integer("code_fokontany")->index();
            $table->string("dir_dep");
            $table->string("etab_tel");
            $table->string("etab_email");
            $table->string("niveau");
            $table->timestamps();
        });

    

        Schema::create('parents', function (Blueprint $table) {
            $table->increments("id_parent");
            $table->integer("id")->index();
            $table->string("nom_pere");
            $table->string("profession_pere");
            $table->string("nom_mere");
            $table->string("profession_mere");
            $table->string("nom_tuteur");
            $table->string("profession_tuteur");

            $table->timestamps();
        });

        /*Schema::create('matieres', function (Blueprint $table) {
            $table->increments("id_matiere");
            $table->string("libelle");
            $table->string("name");
            $table->string("niveau 2");
            $table->string("niveau 3");
            $table->timestamps();
        });*/

        Schema::create('classes', function (Blueprint $table) {
            $table->increments("id_classe");
            $table->string("nom_classe");
            $table->string("niveau_2");
            $table->string("niveau_3");
            $table->timestamps();
        });

        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_matiere")->index();
            $table->integer("id_fonction")->index();
            $table->integer("id_statu")->index();
            $table->integer("codediplomeac")->index();
            $table->integer("codediplomepd")->index();
            $table->integer("immatriculation");
            $table->integer("cin");
            $table->string("nom");
            $table->string("prenoms");
            $table->date("date_nais");
            $table->string("lieu_nais");
            $table->string("sexe");
            $table->string("adresse");
            $table->date("date_prise_service");
            $table->string("num_tel");

            $table->timestamps();
        });

        Schema::create('eleves', function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->integer("id_classe")->index();
            $table->string("nom");
            $table->string("prenoms");
            $table->date("date_nais");
            $table->string("lieu_nais");
            $table->string("adresse");
            $table->string("sexe");
            $table->string("status");
            $table->date("date_entree");


            $table->timestamps();
        });


         Schema::create('note1s', function (Blueprint $table) {
            $table->increments("id_note");
            $table->integer("id")->index();
            $table->float("malagasy")->nullable();
            $table->float("francais")->nullable();
            $table->float("anglais")->nullable();
            $table->float("histo_geo")->nullable();
            $table->float("mathematique")->nullable();
            $table->float("pc")->nullable();
            $table->float("spc")->nullable();
            $table->float("svt")->nullable();
            $table->float("eps")->nullable();
            $table->float("langue")->nullable();
            $table->float("eac")->nullable();
            $table->float("lv2")->nullable();
            $table->float("philo")->nullable();
            $table->float("ses")->nullable();
            $table->float("ec")->nullable();
            $table->float("tic")->nullable();


            $table->timestamps();
        });

         Schema::create('note2s', function (Blueprint $table) {
            $table->increments("id_note");
            $table->integer("id")->index();
            $table->float("malagasy")->nullable();
            $table->float("francais")->nullable();
            $table->float("anglais")->nullable();
            $table->float("histo_geo")->nullable();
            $table->float("mathematique")->nullable();
            $table->float("pc")->nullable();
            $table->float("spc")->nullable();
            $table->float("svt")->nullable();
            $table->float("eps")->nullable();
            $table->float("langue")->nullable();
            $table->float("eac")->nullable();
            $table->float("lv2")->nullable();
            $table->float("philo")->nullable();
            $table->float("ses")->nullable();
            $table->float("ec")->nullable();
            $table->float("tic")->nullable();


            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobiliers');
        Schema::dropIfExists('immobiliers');
        Schema::dropIfExists('etablissements');
        Schema::dropIfExists('eleves');
        Schema::dropIfExists('parents');
        Schema::dropIfExists('note1s');
        Schema::dropIfExists('note2s');
        Schema::dropIfExists('enseignants');
        Schema::dropIfExists('classes');
        /*Schema::dropIfExists('matieres');*/
        
    }
}
