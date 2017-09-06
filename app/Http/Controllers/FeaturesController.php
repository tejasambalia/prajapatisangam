<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Storage;
use Validator;
use Response;
use App\Classes\SearchLogic;
use App\Classes\ViewCounter;

class FeaturesController extends Controller{
	public function video($title, $id){
		$viewCounter = new ViewCounter;
		$viewCounter->videoViewCounter($id);
		return view('content.video', compact('id'));
	}
}