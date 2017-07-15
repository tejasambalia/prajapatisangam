<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\State;

Class StateDropDown {
	public function StateDropDown($selectId=null) {
		$obj = new State;
		$data = $obj->get();
		$optionData = '<option>Select Surname</option>';
		if($selectId!=null){
			foreach ($data as $d) {
				$optionData .= '<option value="'.$d->id.'" ('.$d->id==$selectId.')?"selected":"">'.$d->name.'</option>';
			}
		}
		else{
			foreach ($data as $d) {
				$optionData .= '<option value="'.$d->id.'">'.$d->name.'</option>';
			}
		}
		return $optionData;
	}
}