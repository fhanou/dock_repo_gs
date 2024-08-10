<?php

use Illuminate\Http\Request;

class BaseController extends Controller {

	public function affiche($_r, $data = array()){
		$data['view'] = $_r;
		return view ('layout',$data);
	}
}

?>