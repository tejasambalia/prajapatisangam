<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\Classes\SurnameList;
use App\Surname;

Class SurnameDropDown {
	public function SurnameDropDown($selectId=null) {
		$surnameObj = new Surname;
		$surnameData = $surnameObj->get();
		$optionData = '<option value="">Select Surname</option>';
		if($selectId!=null){
			foreach ($surnameData as $data) {
				$optionData .= '<option value="'.$data->id.'" ';
				if($data->id==$selectId){$optionData .= 'selected';}
				$optionData .= '>'.$data->name.'</option>';
			}
		}
		else{
			foreach ($surnameData as $data) {
				$optionData .= '<option value="'.$data->id.'">'.$data->name.'</option>';
			}
		}
		return $optionData;
	}
}