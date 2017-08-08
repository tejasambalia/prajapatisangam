<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\City;

Class CityDropDown {
	public function CityDropDown($selectId=null) {
		$obj = new City;
		$data = $obj->get();
		$optionData = '<option value="">Select City</option>';
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