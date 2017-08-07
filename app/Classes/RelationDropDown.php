<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\Relation;

Class RelationDropDown {
	public function RelationDropDown($selectId=null) {
		$obj = new Relation;
		$data = $obj->get();
		$optionData = '<option>Select Relation</option>';
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