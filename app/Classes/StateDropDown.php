<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\State;

Class StateDropDown {
	public function StateDropDown($selectId=null) {
		$obj = new State;
		$data = $obj->get();
		$optionData = '<option>Select State</option>';
		if($selectId!=null){
			foreach ($data as $d) {
				$optionData .= '<option value="'.$d->id.'" ';
				if($d->id==$selectId){$optionData .= 'selected';}
				$optionData .= '>'.$d->name.'</option>';
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