<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//authentification
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('auth/login');
});


Route::get('/etablissement.html', [
	"as" => "etablissement",
	"uses" => 'EtablissementController@index'
]);

Route::get('/r_etablissement.html', [
	"as" => "etablissement_recherche",
	"uses" => 'EtablissementController@recherche'
]);

Route::get('/save_etablissement.html', [
	"as" => "etablissement_save",
	"uses" => 'EtablissementController@save'
]);

//eleve

Route::get('/etudiant.html', [
	"as" => "etudiant",
	"uses" => 'EtudiantController@index'
]);

Route::get('/load-form-eleve.html', [
	"as" => "load_form_eleve",
	"uses" => 'EtudiantController@formEleve'
]);

Route::get('/load-form-suivant-eleve.html', [
	"as" => "load_form_suivant_eleve",
	"uses" => 'EtudiantController@formSuivantEleve'
]);

Route::get('/save-eleve.html', [
	"as" => "save_eleve",
	"uses" => 'EtudiantController@saveEleve'
]);

Route::get('/remove-eleve.html',[
	"as" => "remove_eleve",
	"uses" => 'EtudiantController@remove'
]);

Route::get('/imprimer-eleve.html',[
	"as" => "imprimer_eleve",
	"uses" => 'EtudiantController@imprimerEleve'
]);


//mobilier
Route::get('/mobilier.html', [
	"as" => "mobilier",
	"uses" => 'MobilierController@index'
]);

Route::get('/load-form-mobilier.html', [
	"as" => "load_form_mobilier",
	"uses" => 'MobilierController@formMobilier'
]);

Route::get('/save-mobilier.html', [
	"as" => "save_mobilier",
	"uses" => 'MobilierController@saveMobilier'
]);

Route::get('/remove-mobilier.html',[
	"as" => "remove_mobilier",
	"uses" => 'MobilierController@remove'
]);

Route::get('/imprimer-mobilier.html',[
	"as" => "imprimer_mobilier",
	"uses" => 'MobilierController@imprimerMobilier'
]);

//immobilier

Route::get('/immobilier.html', [
	"as" => "immobilier",
	"uses" => 'ImmobilierController@index'
]);

Route::get('/load-form-immobilier.html', [
	"as" => "load_form_immobilier",
	"uses" => 'ImmobilierController@formImmobilier'
]);

Route::get('/save-immobilier.html', [
	"as" => "save_immobilier",
	"uses" => 'ImmobilierController@saveImmobilier'
]);

Route::get('/remove-immobilier.html',[
	"as" => "remove_immobilier",
	"uses" => 'ImmobilierController@remove'
]);
Route::get('/imprimer-immobilier.html',[
	"as" => "imprimer_immobilier",
	"uses" => 'ImmobilierController@imprimerImmobilier'
]);

//enseignant

Route::get('/enseignant.html', [
	"as" => "enseignant",
	"uses" => 'EnseignantController@index'
]);

Route::get('/load-form-enseignant.html', [
	"as" => "load_form_enseignant",
	"uses" => 'EnseignantController@formEnseignant'
]);

Route::get('/save-enseignant.html', [
	"as" => "save_enseignant",
	"uses" => 'EnseignantController@saveEnseignant'
]);

Route::get('/remove-enseignant.html',[
	"as" => "remove_enseignant",
	"uses" => 'EnseignantController@remove'
]);

Route::get('/imprimer-enseignant.html',[
	"as" => "imprimer_enseignant",
	"uses" => 'EnseignantController@imprimerEnseignant'
]);

//utilisateur

Route::get('/utilisateur.html', [
	"as" => "utilisateur",
	"uses" => 'UtilisateurController@index'
]);
Route::get('/load-form-utilisateur.html', [
	"as" => "load_form_utilisateur",
	"uses" => 'UtilisateurController@formUtilisateur'
]);

Route::get('/save-utilisateur.html', [
	"as" => "save_utilisateur",
	"uses" => 'UtilisateurController@saveUtilisateur'
]);

Route::get('/remove-utilisateur.html',[
	"as" => "remove_utilisateur",
	"uses" => 'UtilisateurController@remove'
]);

//transcription

Route::get('/transcription.html', [
	"as" => "transcription",
	"uses" => 'TranscriptionController@index'
]);


//recherche et renvoie des données

Route::get('/transcription-note.html',[
	"as" => "transcription_note",
	"uses" => 'TranscriptionController@search'
]);

Route::get('/save-note.html', [
	"as" => "save_note",
	"uses" => 'TranscriptionController@saveNote'
]);

//bulletin

Route::get('/bulletin.html', [
	"as" => "bulletin",
	"uses" => 'BulletinController@index'
]);

Route::get('/imprimer-bulletin.html',[
	"as" => "imprimer_bulletin",
	"uses" => 'BulletinController@imprimerBulletin'
]);

Route::get('/imprimer-tous-bulletin.html',[
	"as" => "imprimer_tous_bulletin",
	"uses" => 'BulletinController@imprimerTousBulletin'
]);


//recherche et renvoie des données
Route::get('/bulletin-note.html',[
	"as" => "bulletin_note",
	"uses" => 'BulletinController@search'
]);


