<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Parents;
use App\Etablissement;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Session;

class EtudiantController extends Controller
{
    public function index(){
    	if (Session::get("login_flag") == null) { return redirect()->route('login'); }
    	$data = array();
    	$session = Session::All();
    	$data['eleve'] = Eleve::getEleve();
    	$niv = Etablissement::getNiveau();
    	$data['class'] = DB::table('classes')->where('niveau_'.$niv,'=',1)->get();

    	return view('blocks/etudiant',$data);
    }

    public function formEleve(Request $request){
    	$session = new Session();
    	$data = array();
    	$_ims = $request->except(['_token']);
    	$niv = Etablissement::getNiveau();
    	$data['class'] = DB::table('classes')->where('niveau_'.$niv,'=',1)->get();
    	if ($_ims > 0) {
    		$data['eleve'] = DB::table('eleves')->where('id','=',$_ims)->first();
    		
    	}
    	
    	return view('ajaxs/a-etudiant',$data); 
    }

    public function formSuivantEleve(Request $request){
    	$session = new Session();
    	$data = array();
    	$_im = $request->except(['_token']);

        if ($_im > 0) {
            $data['parent'] = DB::table('parents')->where('id','=',$_im)->first();
        }
    	return view('ajaxs/s-etudiant',$data);
    }

    public function saveEleve(Request $request){
    	$datas = isset($_GET['_datas']) ? $_GET['_datas'] : "";
    	$__ims = isset($_GET['_ims']) ? $_GET['_ims'] : "";
    	$etpes = isset($_GET['_etapes']) ? $_GET['_etapes'] : 0;

    	if ($etpes > 0 && $etpes == 1) {
	    	$elvs = DB::table('eleves')->where('id','=',$__ims)->get();

	    	if (count($elvs) > 0) {
		    	$data = array();
		    	for ($i=0; $i < count($datas); $i++) { 
		    		$data[$datas[$i]['name']] = $datas[$i]['value'];
		    	}

		    	DB::table('eleves')->where('id','=',$__ims)->update($data);
		    	 
	    	}
	    	else{
		    	$eleve = new Eleve();

		    	for ($i=0; $i < count($datas); $i++) { 
		    		$eleve->{$datas[$i]['name']} = $datas[$i]['value'];
		    	}

		    	$eleve->save();
		    	
		    }

	    	return json_encode(["_im"=>$__ims]);
	    }else if ($etpes > 0 && $etpes == 2) {
	    	$elvs = DB::table('parents')->where('id','=',$__ims)->get();

	    	if (count($elvs) > 0) {
		    	$data = array();
		    	$data['id'] = $__ims;
		    	for ($i=0; $i < count($datas); $i++) { 
		    		$data[$datas[$i]['name']] = $datas[$i]['value'];
		    	}
		    	DB::table('parents')->where('id','=',$__ims)->update($data);
		    	$request->session()->flash('success','Modification terminée!');
	    	}
	    	else{
		    	$eleve = new Parents();
		    	
		    	$eleve->id = $__ims;
		    	for ($i=0; $i < count($datas); $i++) { 
		    		$eleve->{$datas[$i]['name']} = $datas[$i]['value'];
		    	}

		    	$eleve->save();
		    	$request->session()->flash('success','Ajout terminé!'); 
		    }
	    }
    }

    public function remove(Request $request){
        $__ims = $request->get('__ims',0);

        if ($__ims > 0) {
            DB::table('eleves')->where('id','=',$__ims)->delete();
            DB::table('parents')->where('id','=',$__ims)->delete();
            $request->session()->flash('success','Suppression terminée!'); 

        }
    }

    public function imprimerEleve(){
    	$session = new Session();
    	$niv = Etablissement::getNiveau();
        $classe = isset($_GET['classe']) ? $_GET['classe'] :0;
        //print_r($classe);die;
        $data = array();
        $data['eleve'] = Eleve::getListeParClasse($classe);
        $data['etablissements'] = Etablissement::getEtablissement();
        view()->share('eleve',$data);
        $pdf = PDF::loadView('print/imprimerEleve',$data);

        return $pdf->download('listeEleveScolaire.pdf');
    }
}
