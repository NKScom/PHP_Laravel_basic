<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Input;

use App, Lang;

class LanguageController extends Controller
{
    /**
     *  @desc To change current language
     *  @request Ajax
     */
    
    public function changeLanguage(Request $request){

    	if($request->ajax()){
    		$request->session()->put('locate', $request->locate);
    	}

    }
}
