<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Matiere;
use App\Note;
use App\Classe;
use App\Note1;
use App\Note2;
use App\Etablissement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TranscriptionController extends Controller
{
    public function index(){
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $session = Session::All();
        $data['_etape'] = Session::get('_etape');
        return view('blocks/transcription',$data);
    }

    public function search(Request $request){
        $session = new Session();
        $im = isset($_GET['im']) ? $_GET['im'] :0;
        $niv = Etablissement::getNiveau();
        Session::put('_etape',$request->get('_e',0));
        $data = array();
        $id = Eleve::where('id','=',$im)->first();
        $idn1 = Note1::where('id','=',$im)->first();
        $idn2 = Note2::where('id','=',$im)->first();
        if($id == null){
            $request->session()->flash('error',"Ce numéro matricule n'existe pas! ");
            return view('blocks/transcription',$request);

        }
        else if($idn1==null){
            $data['eleves'] = Eleve::where('id','=',$im)->get();
            $data['classe'] = Classe::where('niveau_'.$niv,'=',1)->get();
            $data['matier'] = Matiere::where('niveau_'.$niv,'=',1)->get();
            return view('ajaxs/a-transcription',$data);
        }
        else if($idn2==null){
            $data['eleves'] = Eleve::where('id','=',$im)->get();
            $data['classe'] = Classe::where('niveau_'.$niv,'=',1)->get();
            $data['matier'] = Matiere::where('niveau_'.$niv,'=',1)->get();
            return view('ajaxs/a-transcription',$data);
        }
        else{
            
            $request->session()->flash('error',"Ce numéro matricule est déjà transcrit! ");
            return view('blocks/transcription',$request);
        }
        
    }

    public function saveNote(Request $request){
        $datas = $request->except(['_token']);
        if (Session::get('_etape') and Session::get('_etape') == 1) {
            $note = new Note1();
        }else{
            $note = new Note2();
        }
        
        foreach($datas as $key =>$v){
            $note->{$key} = $v;
        }

        $note->save();
        return redirect()->route('transcription');
        $request->session()->flash('success','Ajout terminé!'); 
    }

}

