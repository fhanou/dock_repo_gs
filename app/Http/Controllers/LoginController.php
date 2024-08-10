<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class LoginController extends Controller
{
    public function index(){

        return view('login/login_utilisateur');
    }

    public function save(Request $request){
        $datas = $request->except(['_token']);
        $utilisateur = new Utilisateur();
        foreach($datas as $key =>$v){
            $utilisateur->{$key} = $v;
        }

        $utilisateur->save();
        return view('login/etablissement');
    }

    public function authentifier(){
        return view ('accueil');
    }
}
