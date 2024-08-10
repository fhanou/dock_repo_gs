<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etablissement;
use App\Dren;
use Illuminate\Support\Facades\DB;


class EtablissementController extends Controller
{
    public function index(){

        return view('login/a-etablissement');
    }

    public function recherche(){
        $code = isset($_GET['code']) ? $_GET['code'] :0;
        $data = array();
        $data['etablissement'] = Etablissement::getEtab($code);
        
        return view('login/a-etablissement',$data);
    }
    public function save(Request $request){
        $datas = $request->except(['_token']);
        //print_r($datas);die;
        $etablissement = new Etablissement();
        foreach($datas as $key =>$v){
            $etablissement->{$key} = $v;
            
        }

        $etablissement->save();
        return redirect('/home');
    }

    
}
