<?php

namespace App\Http\Controllers;

class StaticpageController extends Controller{

	public function terms(){
		return view('static.terms');
	}

	public function faqs(){
		return view('static.faqs');
	}

	public function welcome(){
		return view('welcome');
	}

	public function about(){
		return view('static.about');
	}

	public function team(){
		return view('static.team');
	}

	public function test(){
		return view('welcome__');
	}
}