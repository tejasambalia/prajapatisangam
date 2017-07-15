<?php
namespace App\Classes;

Class GenderDropDown {
	public function GenderDropDown($selectId=null) {
		$list = array(
				'0' => 'Female',
				'1' => 'Male'
			);
		$optionData = '<option>Select Gender</option>';
		if($selectId!=null){			
			foreach ($list as $key => $val) {
				$optionData .= '<option value="'.$key.'"'; 
					if($key==$selectId){
						$optionData.="selected";
					}
					$optionData.='>'.$val.'</option>';
			}
		}
		else{
			foreach ($list as $key => $val) {
				$optionData .= '<option value="'.$key.'">'.$val.'</option>';
			}
		}
		return $optionData;
	}
}