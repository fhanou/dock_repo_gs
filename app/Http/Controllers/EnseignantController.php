<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enseignant;
use App\Etablissement;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Session;

class EnseignantController extends Controller
{
    public function index(){
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $data = array();
        $session = Session::All();
        $data['enseignant'] = Enseignant::getEnseignant();

        return view('blocks/enseignant',$data);
    }

    public function formEnseignant(Request $request){
        $session = new Session();
        $data = array();
        $niv = Etablissement::getNiveau();
        $_ens = $request->except(['_token']);
        $data['fonct'] = DB::table('t_fonction')->where ('niveau_'.$niv,'=',1)->get();
        $data['stat'] = DB::table('t_statut')->get();
        $data['mat'] = DB::table('matieres')->where('niveau_'.$niv,'=',1)->get();
        $data['dipac'] = DB::table('t_liste_diplome_ac')->get();
        $data['dippd'] = DB::table('t_liste_diplome_pd')->get();

        if ($_ens > 0) {
            $data['enseignant'] = DB::table('enseignants')->where('id','=',$_ens)->first();
        }

        return view('ajaxs/a-enseignant',$data);
    }

    public function saveEnseignant(Request $request){
        $datas = isset($_GET['_datas']) ? $_GET['_datas'] : "";
        $__ens = isset($_GET['_ens']) ? $_GET['_ens'] : "";
        
        $enseign = DB::table('enseignants')->where('id','=',$__ens)->get();

        if (count($enseign) > 0) {
            $enseignant = Enseignant::find($__ens)->first();
            $data = array();
            for ($i=0; $i < count($datas); $i++) {
                $data[$datas[$i]['name']] = $datas[$i]['value'];
            }
            DB::table('enseignants')->where('id','=',$__ens)->update($data);
            $request->session()->flash('success','Modification terminée!');
        }
        else{
           $enseignant = new Enseignant();

            for ($i=0; $i < count($datas); $i++) { 
                $enseignant->{$datas[$i]['name']} = $datas[$i]['value'];
            }

            $enseignant->save();
            $request->session()->flash('success','Ajout terminé!');
        }
    }

    public function imprimerEnseignant(){
        $session = new Session();
        $data = array();
        $data['enseignant'] = Enseignant::getTous();
        $data['etablissements'] = Etablissement::getEtablissement();
        view()->share('enseignant',$data);
        $pdf = PDF::loadView('print/imprimerEnseignant',$data);

        return $pdf->download('listeEnseignant.pdf');
    }

    public function remove(Request $request){
        $ids = $request->get('__ids',0);

        if ($ids > 0) {
            DB::table('enseignants')->where('id','=',$ids)->delete();
            $request->session()->flash('success','Suppression terminée!');
        }
    }
}
