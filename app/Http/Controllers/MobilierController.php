<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mobilier;
use App\Etablissement;
use PDF;
use Illuminate\Support\Facades\Session;

class MobilierController extends Controller
{
    public function index(){
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $data = array();
        $session = Session::All();
        $data['mobilier'] = Mobilier::getMobilier();

        return view('blocks/mobilier',$data);
    }

    public function formMobilier(Request $request){
        $session = new Session();
        $data = array();
        $_mob = $request->get('__mob');

        if ($_mob > 0) {
            $data['mobilier'] = DB::table('mobiliers')->where('id','=',$_mob)->first();
        }

        return view('ajaxs/a-mobilier',$data);
    }

    public function saveMobilier(Request $request){
        $datas = isset($_GET['_datas']) ? $_GET['_datas'] : "";
        $__mob = isset($_GET['_mob']) ? $_GET['_mob'] : "";
        $mobs = DB::table('mobiliers')->where('id','=',$__mob)->get();

        if (count($mobs) > 0) {
            $mobilier = Mobilier::find($__mob)->first();
            $data = array();

            for ($i=0; $i < count($datas); $i++) {
                $data[$datas[$i]['name']] = $datas[$i]['value'];
            }

            DB::table('mobiliers')->where('id','=',$__mob)->update($data);
            $request->session()->flash('success','Modification terminée!');
        }else{
            $mobilier = new Mobilier();

            for ($i=0; $i < count($datas); $i++) { 
                $mobilier->{$datas[$i]['name']} = $datas[$i]['value'];
            }

            $mobilier->save();
            $request->session()->flash('success','Ajout terminé!');            

        }   

    }

    public function imprimerMobilier(){
        $session = new Session();
        $data = array();
        $data['mobilier'] = Mobilier::getMobilier();
        $data['etablissements'] = Etablissement::getEtablissement();
        view()->share('mobilier',$data);
        $pdf = PDF::loadView('print/imprimerMobilier',$data);

        return $pdf->download('listeMobilierScolaire.pdf');
    }

    public function remove(Request $request){
        $ids = $request->get('__ids',0);

        if ($ids > 0) {
            DB::table('mobiliers')->where('id','=',$ids)->delete();
            $request->session()->flash('success','Suppression terminée!');
        }
    }
}
