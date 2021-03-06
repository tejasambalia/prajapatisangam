<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Storage;
use Validator;
use Response;
use App\UserData;

class TreeController extends Controller{
	public function familyTree(){
		if(\Auth::user()->familytree_created){
			return view('tree.familyTree');
		}
		else{
			return redirect()->route('addFamilyTree');
		}
	}

	public function addFamilyTree(){
		return view('tree.addFamilyTree');
	}

	public function editFamilyTree(){
		return view('tree.editFamilyTree');
	}

	public function handleAddFamilyTree(Request $request){
		$validator = $this->validate($request, UserData::$validateTreeData);
		$personData = $request->only('firstName', 'middleName', 'surnameId', 'birthDate', 'gender', 'married', 'phone', 'email', 'website', 'homeTown', 'education', 'occupation', 'about', 'thoughts', 'address', 'state', 'city', 'Pincode', 'relationSelect');

		//change key
		foreach ($personData as $outerKey => $postData) {
			$count = count($postData);
			for ($i=0; $i < $count; $i++) { 
				$newData[$i][$outerKey] = $postData[$i];
			}
		}

		foreach ($newData as $data) {
			$data['user_id'] = \Auth::user()->id;
			$data['relationCreated'] = '0';

			$obj = UserData::getSingleColumnData($data['user_id'], 'addressId');

    		$data['addressId'] = $obj->addressId;
			$userObj = UserData::addProfile($data);
		}

		//set flag tree created
	    DB::table('users')
	      ->where('id', \Auth::user()->id)
	      ->update(['familytree_created' => '1']);

	    //insert in relation_create
      	DB::table('relation_created')->insert([
			'family_id' => \Auth::user()->id,
			'inserted_relationship_table' => '0'
		]);

	    return redirect()->route('familyTree');
	}

	public function handleEditFamilyTree(Request $request){
		$validator = $this->validate($request, UserData::$validateTreeData);
		$personData = $request->only('id', 'firstName', 'middleName', 'surnameId', 'birthDate', 'gender', 'married', 'phone', 'email', 'website', 'homeTown', 'education', 'occupation', 'about', 'thoughts', 'address', 'state', 'city', 'Pincode', 'relationSelect');

		//change key
		foreach ($personData as $outerKey => $postData) {
			$count = count($postData);
			for ($i=0; $i < $count; $i++) { 
				$newData[$i][$outerKey] = $postData[$i];
			}
		}

		foreach ($newData as $data) {
			$data['user_id'] = \Auth::user()->id;
			$data['relationCreated'] = '0';

			$userObj = UserData::updateTreeProfile($data);
		}

		return redirect()->route('familyTree');
	}
}