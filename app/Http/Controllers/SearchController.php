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

class SearchController extends Controller{
	public function search(Request $request){
		$data = $request->only('search');
		if($data['search']!=null){
			$searchObj = new SearchLogic;
			$result = $searchObj->search($data['search']);
			return view('search.index', compact('result', 'data'));
		}
		else{
			return back();
		}
	}
}