<?php

namespace App\Http\Controllers;

class StaticpageController extends Controller{
	
	public function terms(){
		return view('static.terms');
	}
}