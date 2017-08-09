<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;

Class SearchLogic {
	public function search($searchText) {
		//set default value
		$searchText = '%'.$searchText.'%';

		//check search text in user information
		$resultAddress = DB::table('userData')
			->where('firstName', 'like', $searchText)
			->orWhere('website', 'like', $searchText)
			->orWhere('homeTown', 'like', $searchText)
			->orWhere('education', 'like', $searchText)
			->orWhere('occupation', 'like', $searchText)
			->orWhere('about', 'like', $searchText)
			->orWhere('thoughts', 'like', $searchText)
			->select('id')
			->get();

		return $resultAddress;
	}
}