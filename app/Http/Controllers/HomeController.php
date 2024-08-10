<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Enseignant;
use App\Etablissement;
use App\Mobilier;
use App\Immobilier;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Session::get("login_flag") == null) { return redirect()->route('login'); }
        $session = Session::All();
      
        $data['eleve'] = Eleve::getCompte();
        $data['enseignant']= Enseignant::getCompte();
        $data['mobilier'] = Mobilier::getCompte();
        $data['immobilier']= Immobilier::getCompte();
        //$data=array();
        $data['etablissements'] = Etablissement::getEtablissement();


        return view('home',$data);
    }
}
