<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Immobilier;
use App\Etablissement;
use PDF;
use Illuminate\Support\Facades\Session;

class ImmobilierController extends Controller
{
    public function index(){
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $data = array();
         $session = Session::All();
        $data['immobilier'] = Immobilier::getImmobilier();

        return view('blocks/immobilier',$data);
    }

    public function formImmobilier(Request $request){
        $session = new Session();
        $data = array();
        $_mob = $request->except(['_token']);

        if ($_mob > 0) {
            $data['immobilier'] = DB::table('immobiliers')->where('id','=',$_mob)->first();
        }
        return view('ajaxs/a-immobilier',$data);
    }

    public function saveImmobilier(Request $request){
        $datas = isset($_GET['_datas']) ? $_GET['_datas'] : "";
        $__imob = isset($_GET['_imob']) ? $_GET['_imob'] : "";
        
        $imobs = DB::table('immobiliers')->where('id','=',$__imob)->get();


        if (count($imobs) > 0) {
            $immobilier = Immobilier::find($__imob)->first();
            $data = array();
            for ($i=0; $i < count($datas); $i++) {
                $data[$datas[$i]['name']] = $datas[$i]['value'];
            }
            DB::table('immobiliers')->where('id','=',$__imob)->update($data);
            $request->session()->flash('success','Modification terminée!');

        }
        else{
         $immobilier = new Immobilier();

         for ($i=0; $i < count($datas); $i++) { 
             $immobilier->{$datas[$i]['name']} = $datas[$i]['value'];
         }

         $immobilier->save();
         $request->session()->flash('success','Ajout terminé!');
        }
    }
    public function imprimerImmobilier(){
        $session = new Session();
        $data = array();
        $data['immobilier'] = Immobilier::getImmobilier();
        $data['etablissements'] = Etablissement::getEtablissement();
        view()->share('immobilier',$data);
        $pdf = PDF::loadView('print/imprimerImmobilier',$data);

        return $pdf->download('listeImmobilierScolaire.pdf');
    }

    public function remove(Request $request){
        $ids = $request->get('__ids',0);

        if ($ids > 0) {
            DB::table('immobiliers')->where('id','=',$ids)->delete();
            $request->session()->flash('success','Suppression terminée!');
        }
    }
}
