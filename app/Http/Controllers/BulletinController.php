<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Classe;
use App\Matiere;
use App\Note1;
use App\Note2;
use Illuminate\Support\Facades\DB;
use App\Etablissement;
use PDF;
use App\Coefficient;
use Illuminate\Support\Facades\Session;

class BulletinController extends Controller
{
    public function index(){
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $session = Session::All();
        $data = array();
        $niv = Etablissement::getNiveau();
        $data['class'] = DB::table('classes')->where('niveau_'.$niv,'=',1)->get();
        return view('blocks/bulletin',$data);
    }

    public function search(Request $request){

        $datas = isset($_GET['_datas']) ? $_GET['_datas'] : "";
        $session = new Session();
        $im = isset($_GET['im']) ? $_GET['im'] :0;
        $data = array();
        $niv = Etablissement::getNiveau();
        
        $id = Eleve::where('id','=',$im)->first();
        if($id == null){
            $request->session()->flash('error',"Ce numéro matricule n'existe pas! ");
            return view('blocks/bulletin',$request);

        }else{
            $id = Eleve::getId($im);
            $data['eleves'] = Eleve::where('id','=',$im)->get();
            $data['classe'] = Classe::where('niveau_'.$niv,'=',1)->get();
            $data['etablissements'] = Etablissement::getEtablissement();
            $data ['pnote'] = Note1::where('id','=',$im)->get();
            $data ['dnote'] = Note2::where('id','=',$im)->get();
            $data['im'] = $im;
            $classe = Eleve::getClasse($im);
            $data['matier'] = Coefficient::getMatiereCoef($classe,$niv);

        return view('ajaxs/e-bulletin',$data);
        }
       
            
    }

    
    public function imprimerBulletin(){
        $session = new Session();
        $im = isset($_GET['im']) ? $_GET['im'] :0;
        $niv = Etablissement::getNiveau();
        $id = Eleve::where('id','=',$im)->first();
        $data = array();
        if($id == null){
            $request->session()->flash('error',"Ce numéro matricule n'existe pas! ");
            return view('blocks/bulletin',$request);

        }
        else{
            $data['eleves'] = Eleve::where('id','=',$im)->get();
            $data['classe'] = Classe::where('niveau_'.$niv,'=',1)->get();
            $data['etablissements'] = Etablissement::getEtablissement();
            $data['matier'] = Matiere::where('niveau_'.$niv,'=',1)->get();
            $note1=$data ['pnote'] = Note1::where('id','=',$im)->get();
            $note2=$data ['dnote'] = Note2::where('id','=',$im)->get();
        
       
        $pdf = PDF::loadView('print/imprimerBulletin',$data);

        return $pdf->download('BulletinDeNote.pdf');
        }
         
            
    }

    public function imprimerTousBulletin(){
        
        $niv = Etablissement::getNiveau();
        $classe = isset($_GET['id_classe']) ? $_GET['id_classe'] :0;
        $data = array();
        
        $data['note'] = Coefficient::getNote($classe,$niv);
        $data['etablissements'] = Etablissement::getEtablissement();
        $data['matier'] = Coefficient::getMatiereCoef($classe,$niv);
        
        $pdf = PDF::loadView('print/imprimerBulletin',$data);

        return $pdf->download('Bulletin_de_note_'.$classe.'.pdf');
            
    }
}
