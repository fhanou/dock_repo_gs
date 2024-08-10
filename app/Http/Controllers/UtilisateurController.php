<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utilisateur;
use PDF;
use Illuminate\Support\Facades\Session;

class UtilisateurController extends Controller
{
    public function index(){
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $data = array();
        $session = Session::All();
        $data['utilisateur'] = Utilisateur::getUtilisateur();
        return view('blocks/utilisateur',$data);
    }

    public function formUtilisateur(Request $request){

        $data = array();
        $_uti = $request->get('__uti');

        if ($_uti > 0) {
            $data['utilisateur'] = DB::table('users')->where('id','=',$_uti)->first();
        }

        return view('ajaxs/a-utilisateur',$data);
    }

    public function saveUtilisateur(Request $request){
        $datas = isset($_GET['_datas']) ? $_GET['_datas'] : "";
        $__uti = isset($_GET['_uti']) ? $_GET['_uti'] : "";
        $utis = DB::table('users')->where('id','=',$__uti)->get();

        
            $utilisateur = Utilisateur::find($__uti)->first();
            $data = array();

            for ($i=0; $i < count($datas); $i++) {
                $data[$datas[$i]['name']] = $datas[$i]['value'];
            }

            DB::table('users')->where('id','=',$__uti)->update($data);
        
    }

    public function remove(Request $request){
        $ids = $request->get('__ids',0);

        if ($ids > 0) {
            DB::table('users')->where('id','=',$ids)->delete();
        }
    }
}
