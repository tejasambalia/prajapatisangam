<?php
namespace App\Classes;

Class MarriedStatusDropDown {
	public function MarriedStatusDropDown($selectId=null) {
		
		$list = array(
				'0' => 'Unmarried',
				'1' => 'Married'
			);


		$optionData = '<option value="">Select Married Status</option>';
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